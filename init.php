<?php

$host='127.0.0.1';
$user='root';
$pass='1234';
$db='watch';

$watch='watch';
$wid='wid';
$wtype='wtype';
$btype='btype';
$itype='itype';
$stype='stype';
$wprice='wprice';
$wdes='wdes';
$search='search';

$con=mysqli_connect($host,$user,$pass,$db);
if(!$con){
    mysqli_connect_error();
} else {
    //echo "connected";
}

?>