<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }

    public function login_authentication($data)
	{


		$query = $this->db->select('*')->from('users')->where('EmailId',$data['user_email'])->where('Password',$data['password'])->get();

		if($query->num_rows() == 1)
		{
			$user_data =  $query->result_array();

			return $user_data;
		}else{

			return false;
		}
	}


}?>
