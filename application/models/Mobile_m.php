<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetWishes()
{
	$data = $this->db->query("CALL AppGetWishes()");
	return $data->result_array();

}



public function GetWishesDetails($query_array)
{
    $procedure = "CALL AppGetWishesDetails(?)";
	$procedure_result = $this->db->query($procedure,$query_array);
    $wishes_details = $procedure_result->result_array();
    $procedure_result->next_result(); 
    $procedure_result->free_result();

    return $wishes_details;
}


public function GetOccupiedDates()
{
	$data = $this->db->query("CALL AppGetOccupiedDates()");
	return $data->result_array();

}




	}?>
