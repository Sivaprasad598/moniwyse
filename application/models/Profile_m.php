<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetPofile($user_id)
{

        $this->db->select('FullName,EmailId,ProfileImageUrl');
        $this->db->where('Id',$user_id);
        $user_details = $this->db->get('users')->result_array();
        return $user_details;
}

}?>
