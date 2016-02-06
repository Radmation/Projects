
<?php

include_once 'apicaller.php';
session_start();


$apicaller = new ApiCaller('APP001', '28e336ac6c9423d946ba02d19c6a2632', 'http://radmation.com/budget/');


//$bill->is_gain = $this->_params['is_gain']; // bill name/type todo add me
//$bill->bill_name = $this->_params['bill_name']; // bill name/type todo change me from bill type
//$bill->frequency = $this->_params['frequency']; // how often todo SINGLE WEEKLY BI-WEEKLY MONTHLY
//$bill->due_period = $this->_params['due_period']; // how often todo enum('eom','bom')
//$bill->every_x_days = $this->_params['every_x_days']; // how often todo int add me
//$bill->on_the_x = $this->_params['on_the_x']; // how often todo int add me
//$bill->amount = $this->_params['amount']; // dollar amount

$added_bill = $apicaller->sendRequest(array(
    'controller' => 'bill', // this is used in the index as the controller
    'action' => 'create', //this is used in the index params as action
    'username' => $_SESSION['username'],
    'userpass' => $_SESSION['userpass'],

    'is_gain' => '1',
    'bill_name' => 'Amandas Bill',
    'frequency' => 'weekly',
    'due_period' => '',
    'every_x_days' => '10',
    'amount' => '500.50'
));

//echo '';
$added_bill;




//echo  $enc_request = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, '28e336ac6c9423d946ba02d19c6a2632', json_encode($added_bill), MCRYPT_MODE_ECB));