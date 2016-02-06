<?php
header("Access-Control-Allow-Origin: *");

//TODO REMOVE ABOVE LINE SECURITY ISSUE
//
//// Define path to data folder todo NOT USING
//define('DATA_PATH', realpath(dirname(__FILE__).'/data'));
//
////Define our id-key pairs
//$applications = array(
//    'APP001' => '28e336ac6c9423d946ba02d19c6a2632', //randomly generated app key
//);
//
////include our models
//include_once 'models/BillItem.php';
//
////GET - Read == return OK(return HTTP status 200) or commonly 404(NOT FOUND) or 400(BAD REQUEST)
//
////PUT - Update == return SUCCESSFUL(return HTTP status 200) or 204(NOT RETURNING ANY CONTENT TO THE BODY)
//
////POST - Create == return SUCCESS(return HTTP status 201)
//
////DELETE - Delete == return SUCCESSFUL(return HTTP status 200) or 204(NO CONTENT) or 404 if NOT FOUNT
//
//
//
////wrap the whole thing in a try-catch block to catch any wayward exceptions!
//try {
//    //get the encrypted request
//    $enc_request = $_REQUEST['enc_request']; // todo urlDecode here
//
//    //get the provided app id
//    $app_id = $_REQUEST['app_id']; // todo working
//
//    //check first if the app id exists in the list of applications
//    if( !isset( $applications[$app_id] ) ) {
//        throw new Exception('Application does not exist!');
//    }
//
//    //decrypt the request
////    $params = json_decode(trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $applications[$app_id], base64_decode($enc_request), MCRYPT_MODE_ECB)));
//
//    $params = rawurldecode($enc_request);
//
//    //check if the request is valid by checking if it's an array and looking for the controller and action
//    if( $params == false || isset($params->controller) == false || isset($params->action) == false ) {
//        throw new Exception('Request is not valid');
//    }
//
//    //cast it into an array
//    $params = (array) $params;
//
//    //todo delete above here if not working, add in params from tutorial
//
//    //get the controller and format it correctly so the first
//    //letter is always capitalized
//    $controller = ucfirst(strtolower($params['controller']));
//
//    //get the action and format it correctly so all the
//    //letters are not capitalized, and append 'Action'
//    $action = strtolower($params['action']).'Action';
//
//    //check if the controller exists. if not, throw an exception
//    if( file_exists("controllers/{$controller}.php") ) {
//        include_once "controllers/{$controller}.php";
//    } else {
//        throw new Exception('Controller is invalid.');
//    }
//
//    //create a new instance of the controller, and pass
//    //it the parameters from the request
//    $controller = new $controller($params);
//
//    //check if the action exists in the controller. if not, throw an exception.
//    if( method_exists($controller, $action) === false ) {
//        throw new Exception('Action is invalid.');
//    }
//
//    //execute the action
//    $result['data'] = $controller->$action();
//    $result['success'] = true;
//
//} catch( Exception $e ) {
//    //catch any exceptions and report the problem
//    $result = array();
//    $result['success'] = false;
//    $result['errormsg'] = $e->getMessage();
//}
//
////echo the result of the API call
//echo json_encode($result);
//exit();


////////////////// BACK UP ABOVE


// Define path to data folder todo NOT USING
define('DATA_PATH', realpath(dirname(__FILE__) . '/data'));

//Define our id-key pairs
$applications = array(
    'APP001' => '28e336ac6c9423d946ba02d19c6a2632', //randomly generated app key
);

// include connect db
require 'includes/connect.php';
//include our models
require 'models/BillItem.php';
require 'models/UserItem.php';

//GET - Read == return OK(return HTTP status 200) or commonly 404(NOT FOUND) or 400(BAD REQUEST)

//PUT - Update == return SUCCESSFUL(return HTTP status 200) or 204(NOT RETURNING ANY CONTENT TO THE BODY)

//POST - Create == return SUCCESS(return HTTP status 201)

//DELETE - Delete == return SUCCESSFUL(return HTTP status 200) or 204(NO CONTENT) or 404 if NOT FOUNT


//wrap the whole thing in a try-catch block to catch any wayward exceptions!
try {
    //get the encrypted request
//    $enc_request = $_REQUEST['enc_request']; // todo urlDecode here
    //TODO get all the params

    $params = $_REQUEST['enc_request'];

    //$_REQUEST['enc_request']='s associative array
    //$_REQUEST['app_id']='s value
    // $_REQUEST['enc_request']['action']


    $app_id = $_REQUEST['app_id'];
    $app_key = $_REQUEST['app_key'];

//    $params = $_REQUEST['enc_request'];//  controller action here and other shit
//
//
//
//    //check first if the app id exists in the list of applications
    if (!isset($applications[$app_id])) {
        throw new Exception('Application does not exist!');
    }

//
//
//    //check if the request is valid by checking if it's an array and looking for the controller and action
    if ($params == false || isset($params['controller']) == false || isset($params['action']) == false) {
        throw new Exception('Request is not valid');
    }
//
//

//    $params = (array)$params;

    //todo delete above here if not working, add in params from tutorial

    //get the controller and format it correctly so the first
    //letter is always capitalized
    $controller = ucfirst(strtolower($params['controller']));

    //get the action and format it correctly so all the
    //letters are not capitalized, and append 'Action'
    $action = strtolower($params['action']) . 'Action';

    //check if the controller exists. if not, throw an exception
    if (file_exists("controllers/{$controller}.php")) {
        include_once "controllers/{$controller}.php";
    } else {
        throw new Exception('Controller is invalid.');
    }

    //create a new instance of the controller, and pass
    //it the parameters from the request
    $controller = new $controller($params);

    //check if the action exists in the controller. if not, throw an exception.
    if (method_exists($controller, $action) === false) {
        throw new Exception('Action is invalid.');
    }

    //execute the action
    $result['data'] = $controller->$action();
    $result['success'] = true;

} catch (Exception $e) {
    //catch any exceptions and report the problem
    $result = array();
    $result['success'] = false;
    $result['errormsg'] = $e->getMessage();
}

//echo the result of the API call
echo json_encode($result); // returns JSON object
exit();









