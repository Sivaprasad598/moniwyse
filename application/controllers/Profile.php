<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

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

    public function updatePassword()
    {
        $user_id = 1;
        $password = $_POST['password'];
        $data['Password'] = md5($password);
        if($this->db->where('Id',$user_id)->update('users',$data))
        {
            echo 1;
        }else{
            echo 0;
        }
    }


    public function updateProfile()
    {
        $user_id = 1;

      
        $data['FullName'] = $_POST['name'];
        $data['EmailId'] = $_POST['email'];
        
        if(!empty($_FILES['profile_pic']['name']))
		{
		//	print_r($_FILES);
			$config['upload_path'] = './uploads/users';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['create_thumb'] = FALSE;

			$config['max_size']	= '';
			$config['max_width']  = '';
			$config['max_height']  = '';
			$file_name = explode('.',$_FILES['profile_pic']['name']);
			$media_type = $file_name[1];
			if(!empty($file_name))
			{
                
                    $config['file_name'] = preg_replace('/\s+/', '_', $file_name[0].strtotime("now").".".$file_name[1]);
			}


			$this->load->library('upload',$config);
			$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('profile_pic'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);

		}else{
			//$data = $this->upload->data();
			$name = preg_replace('/\s+/', '_', $file_name[0].strtotime("now").".".$file_name[1]);
			$data['ProfileImageUrl'] = base_url('uploads/users/').$name;
		}

    }
    
    if($this->db->where('Id',$user_id)->update('users',$data))
    {
        echo 1;

    }else{
        echo 0;
    }
}
    
	
}
