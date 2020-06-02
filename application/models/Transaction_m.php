<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetCategoryBasedTransactions($category_id,$month)
{
    $user_id = 1;
    
   
    //$this->db->where('MONTH(transactions.CrDate)',$month);

//         $this->db->select('sub_categories.Id,sub_categories.Name,sub_categories.Icon,transactions.USD,transactions.EUR,transactions.GBP,transactions.NGN');
//         $this->db->distinct('CategoryId');
//         $this->db->from('transactions');
//         $this->db->join('sub_categories', 'sub_categories.Id = transactions.SubCategoryId','left');
//         $this->db->where('transactions.UserId',$user_id);
//         $this->db->where('transactions.CategoryId',$category_id);
//         $query = $this->db->get();
//         $transactions = $query->result_array();

//         return $transactions;


        $this->db->select('transactions.SubCategoryId');
        $this->db->distinct('SubCategoryId');
        $this->db->from('transactions');
        $this->db->where('MONTH(transactions.CrDate)',$month);
        $this->db->where('transactions.UserId',$user_id);
        $this->db->where('transactions.CategoryId',$category_id);
        
        $query = $this->db->get();
        $txn_sub = $query->result_array();

        //print_r($txn_sub);

        $this->db->select('estimations.SubCategoryId');
        $this->db->distinct('SubCategoryId');
        $this->db->from('estimations');
        $this->db->where('MONTH(estimations.CrDate)',$month);
        $this->db->where('estimations.UserId',$user_id);
        $this->db->where('estimations.CategoryId',$category_id);
        
        $query = $this->db->get();
        $est_sub = $query->result_array();
        
        //print_r($est_sub);

        $result = array_merge($txn_sub, $est_sub);

        

        if(!empty($result))
        {
            foreach($result as $result)
            {
                $sub_categories[] = $result['SubCategoryId'];
            }
        }

        $sub_categories = array_unique($sub_categories);

        //print_r($sub_categories);
       
        $data1 = array();
        foreach($sub_categories as $sub_category)
        {
            
            $data = array();
           
            

            $sub_category_details = $this->db->where('Id',$sub_category)->get('sub_categories')->result_array();

            $this->db->select('Type,USD,EUR,GBP,NGN');            
            $this->db->from('transactions');
            $this->db->where('UserId',$user_id);
            $this->db->where('CategoryId',$category_id);
            $this->db->where('SubCategoryId',$sub_category);
            $this->db->where('MONTH(CrDate)',$month);
            $query = $this->db->get();

            $transactions = $query->result_array();

            $tcr_usd = 0;
            $tcr_eur = 0;
            $tcr_gbp = 0;
            $tcr_ngn = 0;
            $tdr_usd = 0;
            $tdr_eur = 0;
            $tdr_gbp = 0;
            $tdr_ngn = 0;

            
            
            if(!empty($transactions))
            {

                foreach($transactions as $transaction)
                {
                    if($transaction['Type'] = 'cr')
                    {
                        $tcr_usd += $transaction['USD'];
                        $tcr_eur += $transaction['EUR'];
                        $tcr_gbp += $transaction['GBP'];
                        $tcr_ngn += $transaction['NGN'];
                        
                    }else{
                        $tdr_usd += $transaction['USD'];
                        $tdr_eur += $transaction['EUR'];
                        $tdr_gbp += $transaction['GBP'];
                        $tdr_ngn += $transaction['NGN'];
                    }
                }
            }

            
            $this->db->select('Type,USD,EUR,GBP,NGN');            
            $this->db->from('estimations');
            $this->db->where('UserId',$user_id);
            $this->db->where('CategoryId',$category_id);
            $this->db->where('SubCategoryId',$sub_category);
            $this->db->where('MONTH(CrDate)',$month);
            $query = $this->db->get();

            $estimations = $query->result_array();

            $ecr_usd = 0;
            $ecr_eur = 0;
            $ecr_gbp = 0;
            $ecr_ngn = 0;
            $edr_usd = 0;
            $edr_eur = 0;
            $edr_gbp = 0;
            $edr_ngn = 0;


            if(!empty($estimations))
            {
                foreach($estimations as $estimation)
                {
                    if($estimation['Type'] = 'cr')
                    {
                        $ecr_usd += $estimation['USD'];
                        $ecr_eur += $estimation['EUR'];
                        $ecr_gbp += $estimation['GBP'];
                        $ecr_ngn += $estimation['NGN'];
                        
                    }else{
                        $edr_usd += $estimation['USD'];
                        $edr_eur += $estimation['EUR'];
                        $edr_gbp += $estimation['GBP'];
                        $edr_ngn += $estimation['NGN'];
                    }
                }
            }


            $data['USD_Est'] = ($ecr_usd + $edr_usd);
            $data['EUR_Est'] = ($ecr_eur + $edr_eur);
            $data['GBP_Est'] = ($ecr_gbp + $edr_gbp);
            $data['NGN_Est'] = ($ecr_ngn + $edr_ngn);

            $data['USD_Txn'] = ($tcr_usd + $tdr_usd);
            $data['EUR_Txn'] = ($tcr_eur + $tdr_eur);
            $data['GBP_Txn'] = ($tcr_gbp + $tdr_gbp);
            $data['NGN_Txn'] = ($tcr_ngn + $tdr_ngn);

            $data['USD_Rem'] = ($data['USD_Est'] - $data['USD_Txn']);
            $data['EUR_Rem'] = ($data['EUR_Est'] - $data['EUR_Txn']);
            $data['GBP_Rem'] = ($data['GBP_Est'] - $data['GBP_Txn']);
            $data['NGN_Rem'] = ($data['NGN_Est'] - $data['NGN_Txn']);

            $data['Name'] = $sub_category_details[0]['Name'];
            $data['Icon'] = $sub_category_details[0]['Icon'];

            
          
            $data1[] = $data;
           
        }



        //echo "<pre>"; print_r($data1); echo "</pre>";
        return $data1;


 }


 public function GetTransactions($start_time,$end_time,$user_id,$type)
 {
    $this->db->select('sub_categories.Id,sub_categories.Name,sub_categories.Icon,transactions.USD,transactions.EUR,transactions.GBP,transactions.NGN,transactions.CrDate');
    
    $this->db->from('transactions');
    $this->db->join('sub_categories', 'sub_categories.Id = transactions.SubCategoryId','left');
    $this->db->where('transactions.UserId',$user_id);
    $this->db->where('transactions.Type',$type);
    $this->db->where('transactions.CrDate >=',$start_time);
    $this->db->where('transactions.CrDate <=',$end_time);
    $transactions = $this->db->limit(5)->get()->result_array();
      
    return $transactions;
 }


 public function GetTransactionsTotal($start_time,$end_time,$user_id,$type)
 {
    $this->db->select('SUM(USD) as USD,SUM(EUR) as EUR,SUM(EUR) as EUR,SUM(NGN) as NGN');
    
    $this->db->from('transactions');
 
    $this->db->where('UserId',$user_id);
    $this->db->where('Type',$type);
    $this->db->where('CrDate >=',$start_time);
    $this->db->where('CrDate <=',$end_time);
    $transactions = $this->db->get()->result_array();
      
    return $transactions;
 }

}?>
