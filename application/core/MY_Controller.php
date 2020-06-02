<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $is_logged =  $this->session->userdata('user_id');
		if(empty($is_logged)){
		 redirect(base_url());
		}
    }
}
