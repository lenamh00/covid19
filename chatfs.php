<?php


$host="localhost";
$user="root";
$pass="";
$dbname="patient_doctor";
$conn=new mysqli($host,$user,$pass,$dbname);



function formatData($data){
    return date('g:i a', strtotime($data));
}

?>
