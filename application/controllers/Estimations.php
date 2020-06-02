<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estimations extends MY_Controller {

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



	public function addEstIncome()
	{

		parse_str($_POST['formdata'],$est_data);

        $user_id = $_SESSION['user_id'];


		$data['CurrencyType'] = $est_data['est_in_currency'];

		$currencies = $this->db->where('Id',$est_data['est_in_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $est_data['est_in_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $est_data['est_in_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $est_data['est_in_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $est_data['est_in_amount'];


		
		$data['Amount'] = $est_data['est_in_amount'];
		$data['Type'] = $est_data['est_in_type'];
		$data['SubCategoryId'] = $est_data['est_in_sub_category'];
        $data['CategoryId'] = $est_data['est_in_category'];
        $data['RenewDays'] = $est_data['est_in_renew_days'];

        if($est_data['est_in_renew_days'] == '30')
        {
            $renew_period = '1 month';
        }else if($est_data['est_in_renew_days'] == '90')
        {
            $renew_period = '3 months';
        }else if($est_data['est_in_renew_days'] == '180')
        {
            $renew_period = '6 months';
        }else{
            $renew_period = '1 year';
        }
        $data['RenewPeriod'] = $renew_period;

        
        $data['UserId'] = $user_id;

		if($this->db->insert('estimations',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}
	

	public function addEstExpense()
	{
		parse_str($_POST['formdata'],$est_data);

		
        $user_id = 1;


		$data['CurrencyType'] = $est_data['est_ex_currency'];

		$currencies = $this->db->where('Id',$est_data['est_in_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $est_data['est_ex_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $est_data['est_ex_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $est_data['est_ex_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $est_data['est_ex_amount'];



		$data['Amount'] = $est_data['est_ex_amount'];
		$data['Type'] = $est_data['est_ex_type'];
		$data['SubCategoryId'] = $est_data['est_ex_sub_category'];
        $data['CategoryId'] = $est_data['est_ex_category'];
        $data['RenewDays'] = $est_data['est_ex_renew_days'];

        if($est_data['est_ex_renew_days'] == '30')
        {
            $renew_period = '1 month';
        }else if($est_data['est_ex_renew_days'] == '90')
        {
            $renew_period = '3 months';
        }else if($est_data['est_ex_renew_days'] == '180')
        {
            $renew_period = '6 months';
        }else{
            $renew_period = '1 year';
        }
        $data['RenewPeriod'] = $renew_period;

        
        $data['UserId'] = $user_id;

		if($this->db->insert('estimations',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}




	
	public function editEstIncome()
	{

		parse_str($_POST['formdata'],$est_data);

        $user_id = $_SESSION['user_id'];


		$data['CurrencyType'] = $est_data['edit_est_in_currency'];

		$currencies = $this->db->where('Id',$est_data['edit_est_in_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $est_data['edit_est_in_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $est_data['edit_est_in_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $est_data['edit_est_in_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $est_data['edit_est_in_amount'];


		
		$data['Amount'] = $est_data['edit_est_in_amount'];
		$data['Type'] = $est_data['edit_est_in_type'];
		$data['SubCategoryId'] = $est_data['edit_est_in_sub_category'];
        $data['CategoryId'] = $est_data['edit_est_in_category'];
        $data['RenewDays'] = $est_data['edit_est_in_renew_days'];

        if($est_data['edit_est_in_renew_days'] == '30')
        {
            $renew_period = '1 month';
        }else if($est_data['edit_est_in_renew_days'] == '90')
        {
            $renew_period = '3 months';
        }else if($est_data['edit_est_in_renew_days'] == '180')
        {
            $renew_period = '6 months';
        }else{
            $renew_period = '1 year';
        }
        $data['RenewPeriod'] = $renew_period;

        
        $data['UserId'] = $user_id;
		$estimation_id = $est_data['edit_est_in_id'];
		if($this->db->where('Id',$estimation_id)->update('estimations',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}
	

	public function editEstExpense()
	{
		parse_str($_POST['formdata'],$est_data);

		
        $user_id = 1;


		$data['CurrencyType'] = $est_data['edit_est_ex_currency'];

		$currencies = $this->db->where('Id',$est_data['edit_est_ex_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $est_data['edit_est_ex_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $est_data['edit_est_ex_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $est_data['edit_est_ex_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $est_data['edit_est_ex_amount'];



		$data['Amount'] = $est_data['edit_est_ex_amount'];
		$data['Type'] = $est_data['edit_est_ex_type'];
		$data['SubCategoryId'] = $est_data['edit_est_ex_sub_category'];
        $data['CategoryId'] = $est_data['edit_est_ex_category'];
        $data['RenewDays'] = $est_data['edit_est_ex_renew_days'];

        if($est_data['edit_est_ex_renew_days'] == '30')
        {
            $renew_period = '1 month';
        }else if($est_data['edit_est_ex_renew_days'] == '90')
        {
            $renew_period = '3 months';
        }else if($est_data['edit_est_ex_renew_days'] == '180')
        {
            $renew_period = '6 months';
        }else{
            $renew_period = '1 year';
        }
        $data['RenewPeriod'] = $renew_period;

        
        $data['UserId'] = $user_id;
		$estimation_id = $est_data['edit_est_ex_id'];
		if($this->db->where('Id',$estimation_id)->update('estimations',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}



    public function loadEstimations()
    {
        $user_id = 1;


        $this->db->select('estimations.CategoryId,categories.Name,categories.Type');
        $this->db->distinct('CategoryId');
        $this->db->from('estimations');
        $this->db->join('categories', 'categories.Id = estimations.CategoryId','left');
        $this->db->where('estimations.UserId',$user_id);
        $this->db->order_by('categories.SortingOrder');
        $query = $this->db->get();
        $categories = $query->result_array();

        $data['categories'] = $categories;

       
        echo $this->load->view('est_block',$data,TRUE);
	}
	

	public function deleteEstimation()
	{
		$id = $_POST['id'];
		if($this->db->where('Id',$id)->delete('estimations'))
		{
			echo 1;
		}else{
			echo 0;
		}
	}

	public function GetEstimationDetails()
	{
		$id = $_POST['id'];
		$estimation_details = $this->db->where('Id',$id)->get('estimations')->result_array();
		$data['estimation_details'] = $estimation_details;
		$data['currencies'] = $this->currency_m->GetCurrencies();
		$data['income_categories'] = $this->category_m->GetIncomeCategories();
		$data['expense_categories'] = $this->category_m->GetExpenseCategories();
		$query_array['Id'] = $estimation_details[0]['CategoryId'];
		$data['sub_categories'] = $this->category_m->GetSubCategories($query_array);

		echo $this->load->view('est_edit_block',$data,TRUE);
		
	}
	
}
