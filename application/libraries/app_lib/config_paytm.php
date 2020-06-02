<?php
//Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
//define('PAYTM_MERCHANT_KEY', 'XXXXXXXXXXXXXXX');
define('PAYTM_MERCHANT_KEY', '1FRmab6MWnim7V#V');
define('PAYTM_MERCHANT_MID', 'Intelm32864963007918');


/*
define('PAYTM_REFUND_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND');
define('PAYTM_STATUS_QUERY_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS');
define('PAYTM_STATUS_QUERY_NEW_URL', 'https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/getTxnStatus');
define('PAYTM_TXN_URL', 'https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction');*/

//$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
//$PAYTM_STATUS_QUERY_NEW_URL='https://pguat.paytm.com/oltp/HANDLER_INTERNAL/getTxnStatus';

//$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
//$PAYTM_TXN_URL='https://pguat.paytm.com/oltp-web/processTransaction';
//if (PAYTM_ENVIRONMENT == 'PROD') {
//staGING ENVIRONMENT URL BELOW
//	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus?JsonData=';
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus?JsonData=';
//	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
//}
//define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
//define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
//define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

?>
