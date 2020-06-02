<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetIncomeCategories()
{
	//sql query for fetching all currencies
	
	$data = $this->db->query("CALL GetIncomeCategories()");
	$categories = $data->result_array();
	$data->next_result(); 
    $data->free_result();
    return $categories;

}

public function GetExpenseCategories()
{
	//sql query for fetching all currencies
	
	$data = $this->db->query("CALL GetExpenseCategories()");
	$categories = $data->result_array();
	$data->next_result(); 
    $data->free_result();
    return $categories;

}

public function GetSubCategories($query_array)
{
    $procedure = "CALL GetSubCategories(?)";
	$procedure_result = $this->db->query($procedure,$query_array);
    $sub_categories = $procedure_result->result_array();
    $procedure_result->next_result(); 
    $procedure_result->free_result();

    return $sub_categories;
}


}?>
