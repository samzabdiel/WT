<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sql = "CREATE DATABASE my_db";
if (mysql_query($sql,$con))
  {
  echo "Database my_db created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
?>