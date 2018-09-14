<?php


/**
 * To clean raw string given by user
 *
 * @param val, Raw value
 * @return String Clean data, ready to  insert in database
 */
function clean($val){
	$val =  DB::getDBInstance()->escape_string($val);
	return $val;
}


/**
 * To echo the reponse in jSON format
 * This function will be used while replying to the API request
 *
 * @param $value. String, The text responded by the API
 * @param $error. bool, True/False
 * @param $other. bool/Array, Can be some custom data
 * @return void
 */
function response($value, $error = true, $other = false){
  //echo $value . "\n";
  
  if($error){
  	$status = 'error';
  }
  else{
  	$status = 'success';
  }
  
  $output = array('message' => $value, 'status' => $status);
  if($other){
  	$output['other'] = $other;
  }
  echo json_encode($output);
  
  exit;
  
}
