<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currency_m extends CI_Model {

	function __construct()
    {
   		parent::__construct();

    }


public function GetCurrencies()
{
	//sql query for fetching all currencies
	
	$data = $this->db->query("CALL GetCurrencies()");
	$currencies = $data->result_array();
	$data->next_result(); 
    $data->free_result();
	return $currencies;

}

public function get_currency_values()
{
	
$fields = array (
	'beautify' => 'true',
	  'key' => '5c9b5763-592c-4635-bca4-618008ecec7f',
	  'from' => 'USD',
	  'to' => 'EUR,NGN,GBP,INR'
);
$fields = json_encode($fields);

$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://v2.api.forex/rates/latest.json",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $fields,
	  CURLOPT_HTTPHEADER => array(
		
	    "Cache-Control: no-cache",
	    "Content-Type: application/json",
	    
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
echo $response;
//	exit;
	curl_close($curl);
}
	


}?>
