<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignOut extends MY_Controller {

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

        

	$u_session_data = array('user_id' => '', 'full_name' => '', 'email_id' => '', 'profile_image' => '','logged_in' => FALSE);
	
	$this->session->set_userdata($u_session_data);
	redirect(base_url());


		
    }
    

    public function authenticate()
    {

        $data['user_email'] = $_POST['user_email'];
        $data['password'] = md5($_POST['password']);
                    

		$user_details = $this->login_m->login_authentication($data);
		
	

										if($user_details)
										{

										//	echo "test";

											foreach($user_details as $auth_user)
											{
										$session_data = array(	'user_id'  =>$auth_user['Id'],
																'full_name'  => $auth_user['FullName'],
																'email_id'  => $auth_user['EmailId'],
																'profile_image'  => $auth_user['ProfileImageUrl'],
																'logged_in' => TRUE
														);

										$this->session->set_userdata($session_data);
									//	redirect('dashboard');
										echo 1;
											}
										}else{

									//	$this->session->set_flashdata('login_fail', 'Mail Id or Password Incorrect Please Try Again!...');
									//	redirect('login');
									echo 0;
										}
    }

   

    
	
}
