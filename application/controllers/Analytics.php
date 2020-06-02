<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends MY_Controller {

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



	public function getNetBudget()
	{
        $user_id = $_SESSION['user_id'];
        $date = $_POST['date'];

        if(!empty($date))
        {   

            $date = explode('-',$date);
            $date1 = trim($date[0]);
            $date2 = trim($date[1]);
            $start_date = explode('/',$date1);
            $end_date = explode('/',$date2);

            $start_time = $start_date[2]."-".$start_date[0]."-".$start_date[1]." "."00:00:00";
            $end_time = $end_date[2]."-".$end_date[0]."-".$end_date[1]." "."00:00:00";

        }else{            

            $start_time = date('Y')."-".date('m')."-1 00:00:00";
            $start_date = date('Y-m-d H:i:s');
            $end_time = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($start_date)));
        }

        $in_usd = 0;
        $in_gbp = 0;
        $in_eur = 0;
        $in_ngn = 0;
        $ex_usd = 0;
        $ex_gbp = 0;
        $ex_eur = 0;
        $ex_ngn = 0;
        $est_in_usd = 0;
        $est_ex_usd = 0;

        $transactions = $this->db->where('UserId',$user_id)->where('CrDate >=',$start_time)->where('CrDate <=',$end_time)->get('transactions')->result_array();
        if($transactions)
        {
        foreach($transactions as $transaction)
        {
            if($transaction['Type'] = 'cr')
            {   
                $in_usd += $transaction['USD'];
                $in_gbp += $transaction['GBP'];
                $in_eur += $transaction['EUR'];
                $in_ngn += $transaction['NGN'];

            }else{

                $ex_usd += $transaction['USD'];
                $ex_gbp += $transaction['GBP'];
                $ex_eur += $transaction['EUR'];
                $ex_ngn += $transaction['NGN'];
            }

        }
        }


        $estimations = $this->db->where('UserId',$user_id)->where('CrDate >=',$start_time)->where('CrDate <=',$end_time)->get('transactions')->result_array();
        if($estimations)
        {
        foreach($estimations as $estimation)
        {
            if($estimation['Type'] = 'cr')
            {   
                $est_in_usd += $transaction['USD'];
                // $in_gbp += $transaction['GBP'];
                // $in_eur += $transaction['EUR'];
                // $in_ngn += $transaction['NGN'];

            }else{

                $est_ex_usd += $transaction['USD'];
                // $ex_gbp += $transaction['GBP'];
                // $ex_eur += $transaction['EUR'];
                // $ex_ngn += $transaction['NGN'];
            }

        }
        }
        

        $data['Ex_USD'] = $ex_usd; 
        $data['Ex_GBP'] = $ex_gbp; 
        $data['Ex_EUR'] = $ex_eur;
        $data['Ex_NGN'] = $ex_ngn; 
        $data['In_USD'] = $in_usd; 
        $data['In_GBP'] = $in_gbp; 
        $data['In_EUR'] = $in_eur;
        $data['In_NGN'] = $in_ngn; 
        $data['Savings_USD'] = $in_usd - $ex_usd; 
        $data['Savings_GBP'] = $in_gbp - $ex_gbp; 
        $data['Savings_EUR'] = $in_eur - $ex_eur;
        $data['Savings_NGN'] = $in_ngn - $ex_ngn; 

        echo $this->load->view('net_budget_block',$data,TRUE);
        
	}
    
    
    public function lineGraph()
    {

        $year = date('Y');
        $user_id = $_SESSION['user_id'];

        
        $current_month = date('M');

        

        $all_months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        foreach($all_months as $s_month)
        {   
            $graph_months[] = $s_month;
            if($s_month == $current_month)
            {
            break;
            }
            
        }
       
      
        $final_data['months'] = $graph_months;
        $final_data['income'] = $this->getGraphIncome($user_id,$year);
	    $final_data['expense'] = $this->getGrpahExpense($user_id,$year);;


         echo json_encode($final_data);

        

    }


public function getGrpahExpense($user_id,$year)
{


    
        $months = ['1','2','3','4','5','6','7','8','9','10','11','12'];
        $sql = "SELECT  MONTH(CrDate) as month, SUM(USD) as expense FROM transactions where UserId = '$user_id' AND Type = 'dr' AND YEAR(CrDate) = '$year' GROUP BY MONTH(CrDate)";


        $query = $this->db->query($sql);
        $data = $query->result_array();
        
        $n_data = array();
        $existed_months = array();
        
        $c_month = date('n');
        if(!empty($data))
        {
            //$i = 0;



            for($i=0; $i < $c_month; $i++ )
            {

                // $j = $i+1;

                if(isset($data[$i]['month']))
                {
                if(in_array($data[$i]['month'],$months))
                {
                    $n_data1[$data[$i]['month']] = $data[$i]['expense'];
                    $existed_months[] = $data[$i]['month'];
                }else{
                    $n_data[] = "0";
                    $n_data1[] = "0";
                }
            }


                $new_data['expense'] = $n_data1;
            
        }





    }else{
        for($i=0; $i < $c_month; $i++ )
        {

            $n_data1[] = "0";
                    

        }
        
        $new_data['expense'] = $n_data1;
    }
    

    $result=array_diff($months,$existed_months);
            // print_r($result);

            foreach($result as $result)
            {
                //$index = $result-1;
                // $arrayname[$result] = $value;
                $new_data['expense'][$result] = "0";
                
            }

            //foreach()

            for($k=1; $k <= $c_month; $k++)
            {
                $expense[] = $new_data['expense'][$k];
                
            }


            return $expense;


}


public function getGraphIncome($user_id,$year)
{
    
    $months = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    $sql = "SELECT  MONTH(CrDate) as month, SUM(USD) as income FROM transactions where UserId = '$user_id' AND Type = 'cr' AND YEAR(CrDate) = '$year' GROUP BY MONTH(CrDate)";


    $query = $this->db->query($sql);
    $data = $query->result_array();
    
    $n_data = array();
    $existed_months = array();
    
    $c_month = date('n');
    if(!empty($data))
    {
        //$i = 0;



        for($i=0; $i < $c_month; $i++ )
        {

            // $j = $i+1;

            if(isset($data[$i]['month']))
            {
            if(in_array($data[$i]['month'],$months))
            {
                $n_data1[$data[$i]['month']] = $data[$i]['income'];
                $existed_months[] = $data[$i]['month'];
            }else{
                $n_data[] = "0";
                $n_data1[] = "0";
            }
        }


            $new_data['income'] = $n_data1;
        
    }





}else{
    for($i=0; $i < $c_month; $i++ )
    {

        $n_data1[] = "0";
                

    }
    
    $new_data['income'] = $n_data1;
}


$result=array_diff($months,$existed_months);
        // print_r($result);

        foreach($result as $result)
        {
            //$index = $result-1;
            // $arrayname[$result] = $value;
            $new_data['income'][$result] = "0";
            
        }

        //foreach()

        for($k=1; $k <= $c_month; $k++)
        {
            $income[] = $new_data['income'][$k];
            
        }

        return $income;

}

public function getTransactions()
{
        $user_id = $_SESSION['user_id'];
        $date = $_POST['date'];
        $type = $_POST['type'];

        if(!empty($date))
        {   

            $date = explode('-',$date);
            $date1 = trim($date[0]);
            $date2 = trim($date[1]);
            $start_date = explode('/',$date1);
            $end_date = explode('/',$date2);

            $start_time = $start_date[2]."-".$start_date[0]."-".$start_date[1]." "."00:00:00";
            $end_time = $end_date[2]."-".$end_date[0]."-".$end_date[1]." "."00:00:00";

        }else{            

            $start_time = date('Y')."-".date('m')."-1 00:00:00";
            $start_date = date('Y-m-d H:i:s');
            $end_time = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($start_date)));
        }

        $data['transactions'] = $this->transaction_m->GetTransactions($start_time,$end_time,$user_id,$type);
        if($type == 'cr') { 
        $data['symbol'] = '+';
        $data['class'] ="income-amount";
        }else{
        $data['symbol'] = '-';
        $data['class'] ="expenses-amount";
        }

        echo $this->load->view('analytics_txn_block',$data,TRUE);
}

public function getTransactionsTotal()
{
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    if(!empty($date))
    {   

        $date = explode('-',$date);
        $date1 = trim($date[0]);
        $date2 = trim($date[1]);
        $start_date = explode('/',$date1);
        $end_date = explode('/',$date2);

        $start_time = $start_date[2]."-".$start_date[0]."-".$start_date[1]." "."00:00:00";
        $end_time = $end_date[2]."-".$end_date[0]."-".$end_date[1]." "."00:00:00";

    }else{            

        $start_time = date('Y')."-".date('m')."-1 00:00:00";
        $start_date = date('Y-m-d H:i:s');
        $end_time = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($start_date)));
    }

    $data['transactions'] = $this->transaction_m->GetTransactionsTotal($start_time,$end_time,$user_id,$type);
    
    
    echo $this->load->view('analytics_txn_total_block',$data,TRUE);

}
}
