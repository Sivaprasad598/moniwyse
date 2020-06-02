<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends MY_Controller {

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



	public function addTxnIncome()
	{

		parse_str($_POST['formdata'],$txn_data);

	
		$user_id = $_SESSION['user_id'];

		$data['CurrencyType'] = $txn_data['txn_in_currency'];

		$currencies = $this->db->where('Id',$txn_data['txn_in_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $txn_data['txn_in_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $txn_data['txn_in_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $txn_data['txn_in_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $txn_data['txn_in_amount'];
		
		$data['Amount'] = $txn_data['txn_in_amount'];
		$data['Type'] = $txn_data['txn_in_type'];
		$data['SubCategoryId'] = $txn_data['txn_in_sub_category'];
		$data['CategoryId'] = $txn_data['txn_in_category'];
		$data['UserId'] = $user_id;
				
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
		$user_id = 1;

		$data['CurrencyType'] = $txn_data['txn_ex_currency'];

		$currencies = $this->db->where('Id',$txn_data['txn_ex_currency'])->get('currencies')->result_array();
		$base_currencies = $this->db->where('Base',$currencies[0]['Code'])->get('base_currency_converions')->result_array();

		$data['USD'] = $base_currencies[0]['USD'] * $txn_data['txn_ex_amount'];
		$data['NGN'] = $base_currencies[0]['NGN'] * $txn_data['txn_ex_amount'];
		$data['GBP'] = $base_currencies[0]['GBP'] * $txn_data['txn_ex_amount'];
		$data['EUR'] = $base_currencies[0]['EUR'] * $txn_data['txn_ex_amount'];


	
		
		$data['Amount'] = $txn_data['txn_ex_amount'];
		$data['Type'] = $txn_data['txn_ex_type'];
		$data['SubCategoryId'] = $txn_data['txn_ex_sub_category'];
		$data['CategoryId'] = $txn_data['txn_ex_category'];
		$data['UserId'] = $user_id;

		if($this->db->insert('transactions',$data))
		{
			echo 1;
		}else{
			echo 0;
		}
	}
    public function loadTransactions()
    {
		$user_id = 1;
		if(!empty($_POST['month']))
		{
		$month = $_POST['month'];
		}else{
		$month = date('m');
		}
        $this->db->select('transactions.CategoryId,categories.Name,categories.Type');
        $this->db->distinct('CategoryId');
        $this->db->from('transactions');
        $this->db->join('categories', 'categories.Id = transactions.CategoryId','left');
		$this->db->where('transactions.UserId',$user_id);
		$this->db->where('MONTH(transactions.CrDate)',$month);
        $this->db->order_by('categories.SortingOrder');
        $query = $this->db->get();
        $categories = $query->result_array();

		//echo $this->db->last_query();
		$data['categories'] = $categories;
		$data['month'] = $month;
        echo $this->load->view('txn_block',$data,TRUE);
    }
	
}
