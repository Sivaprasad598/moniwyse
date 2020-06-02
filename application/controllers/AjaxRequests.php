<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxRequests extends MY_Controller {

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


	public function getSubCategories()
	{
		$category_id = $_POST['category_id'];


		$query_array['Id'] = $category_id;
		$sub_categories = $this->category_m->GetSubCategories($query_array);

		$data = '';
		$data .='<option>Sub Category</option>';
		if(!empty($sub_categories)){
			foreach($sub_categories as $sub_category)
			{
				$data .='<option value='.$sub_category['Id'].'>'.$sub_category['Name'].'</option>';
			}
		}

		echo $data;
	}

	public function addTxnIncome()
	{

		parse_str($_POST['formdata'],$txn_data);

	

		$data['USD'] = $txn_data['txn_in_amount'];
		$data['NGN'] = $txn_data['txn_in_amount'];
		$data['GBP'] = $txn_data['txn_in_amount'];
		$data['EUR'] = $txn_data['txn_in_amount'];
		$data['CurrencyType'] = $txn_data['txn_in_currency'];
		$data['Amount'] = $txn_data['txn_in_amount'];
		$data['Type'] = $txn_data['txn_in_type'];
		$data['SubCategoryId'] = $txn_data['txn_in_sub_category'];
		$data['CategoryId'] = $txn_data['txn_in_category'];

		if($this->db->insert('transactions',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}
	

	public function addTxnExpense()
	{
		parse_str($_POST['formdata'],$txn_data);

		$data['USD'] = $txn_data['txn_ex_amount'];
		$data['NGN'] = $txn_data['txn_ex_amount'];
		$data['GBP'] = $txn_data['txn_ex_amount'];
		$data['EUR'] = $txn_data['txn_ex_amount'];
		$data['CurrencyType'] = $txn_data['txn_ex_currency'];
		$data['Amount'] = $txn_data['txn_ex_amount'];
		$data['Type'] = $txn_data['txn_ex_type'];
		$data['SubCategoryId'] = $txn_data['txn_ex_sub_category'];
		$data['CategoryId'] = $txn_data['txn_ex_category'];

		if($this->db->insert('transactions',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}
	public function currency_test()
	{
		$this->currency_m->get_currency_values();
	}
}
