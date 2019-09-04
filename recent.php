<?php
session_start();
$category=$_GET['category'];
$pName=$_GET['product'];
if(array_key_exists('recentview', $_SESSION))
{
    $recentview = $_SESSION['recentview'];
}
else
{
    $recentview = array();
}
storerecent($category, $recentview, $pName);
function storerecent($category, $recentview, $pName){
     if(array_key_exists($category, $recentview))
     {
  	$store = $recentview[$category];
  	$store = explode(',',$store);
     }
  else
    {
  	$store = array();
    }
    if(in_array($pName,$store)){
      unset($store[array_search($pName,$store)]);
      $store=array_values($store);
    }
  array_push($store, $pName);
  //combine the array back
  $store = implode(',',$store);
  // save the cookie
  $recentview[$category]=$store;
  $_SESSION["recentview"]=$recentview;
}
// remove all session variables
//session_unset();
// destroy the session
//session_destroy();
?>