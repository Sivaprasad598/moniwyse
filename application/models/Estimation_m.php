<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estimation_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetCategoryBasedEstimations($category_id)
{
    $user_id = 1;


        $this->db->select('estimations.Id,sub_categories.Name,sub_categories.Icon,estimations.USD,estimations.EUR,estimations.GBP,estimations.NGN,estimations.RenewDays');
        $this->db->distinct('CategoryId');
        $this->db->from('estimations');
        $this->db->join('sub_categories', 'sub_categories.Id = estimations.SubCategoryId','left');
        $this->db->where('estimations.UserId',$user_id);
        $this->db->where('estimations.CategoryId',$category_id);
        $query = $this->db->get();
        $transactions = $query->result_array();

        return $transactions;
}

}?>
