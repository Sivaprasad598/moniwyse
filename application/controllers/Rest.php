<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}

	public function GetWishes()
	{
		$wishes = $this->mobile_m->GetWishes();

		if(!empty($wishes))
            {
                $res_data['Status'] = '200';
                $res_data['Wishes'] = $wishes;
                $res_data['Message']  = 'Wishes Fetched Successfully';
            }else{
                $res_data['Status'] = '500';
                $res_data['Message']  = 'Wishes Not Added Yet';
			}
			
			echo json_encode($res_data);
	}


	public function GetWishesDetails()
	{
		$body = file_get_contents('php://input');
		$data = json_decode($body,true);

		
		$query_array['Id'] = $data['Id'];
		$wishes_details = $this->mobile_m->GetWishesDetails($query_array);

		if(!empty($wishes_details))
            {
                $res_data['Status'] = '200';
                $res_data['WishesDetails'] = $wishes_details;
                $res_data['Message']  = 'Wishes  Details Fetched Successfully';
            }else{
                $res_data['Status'] = '500';
                $res_data['Message']  = 'Wishes Details Fetching Failed';
			}

			echo json_encode($res_data);
	}


	public function GetWishesOccupiedDates()
	{
		
		$dates = $this->mobile_m->GetOccupiedDates();
		$occupied_dates = array();

		if(!empty($dates))
		{
			foreach($dates as $date)
			{
				$occupied_dates[] = $date['PostDate'];
			}
		}

		
		if(!empty($occupied_dates))
            {
                $res_data['Status'] = '200';
                $res_data['OccupiedDates'] = $occupied_dates;
                $res_data['Message']  = 'Occupied Dates Fetched Successfully';
            }else{
                $res_data['Status'] = '500';
                $res_data['Message']  = 'Occupied Dates Not Avaialbe';
			}
			
		echo json_encode($res_data);
	}



	public function PostWishes()
	{
		
        $data['Name'] = $_POST['Name'];
        $data['Message'] = $_POST['Message'];
        $data['PostDate'] = $_POST['PostDate'];
            
        if(!empty($_FILES['Media']['name']))
		{
		//	print_r($_FILES);
			$config['upload_path'] = './uploads/media';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|mov|avi|3gp';
			$config['create_thumb'] = FALSE;

			$config['max_size']	= '';
			$config['max_width']  = '';
			$config['max_height']  = '';
			$file_name = explode('.',$_FILES['Media']['name']);
			$media_type = $file_name[1];
			if(!empty($file_name))
			{
                
                    $config['file_name'] = preg_replace('/\s+/', '_', $file_name[0].strtotime("now").".".$file_name[1]);
			}


			$this->load->library('upload',$config);
			$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('Media'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);

		}else{
			//$data = $this->upload->data();
			$name = preg_replace('/\s+/', '_', $file_name[0].strtotime("now").".".$file_name[1]);
			$data['MediaUrl'] = base_url('uploads/media/').$name;
		}

		$img_types = ['gif','jpg','png','jpeg'];
		if(in_array($media_type,$img_types))
		{
			$data['MediaType'] = 'image';
		}else{
			$data['MediaType'] = 'vide';
		}
    }
    
		if(empty($error))
		{
    
        if($this->db->insert('wishes',$data))
        {
            $res_data['Status'] = '200';
            $res_data['Message'] = 'Post Uploaded Successfully';
           
        }else{

            $res_data['Status'] = '500';
            $res_data['Message'] = 'Post Uploaded Failed';
        }
    
		}else{
			$res_data['Status'] = '500';
			$res_data['Message'] = 'Media Upload Failed';
		}

       echo json_encode($res_data);
    
     
	}
}
