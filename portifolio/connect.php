<?php
//connecting to mysql database//
$servername = "localhost";
$username = "root";
$password = "";
$dbname="myportifolio";

  $connect= mysqli_connect('localhost','root','','my portifolio');
  if(!$connect){
    die("Connection Error");
  }
  ?>