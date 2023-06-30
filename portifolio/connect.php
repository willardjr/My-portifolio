<?php
//connecting to mysql database//
  $connect= mysqli_connect('localhost','root','','my portifolio');
  if(!$connect){
    die("Connection Error");
  }
  ?>