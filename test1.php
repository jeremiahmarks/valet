<?php
require('/home/jlmarks/connectiondata.php');
//creating the connection to the database

$connect = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die ("It appears the server settings are incorrect.");

//this will check if the main database is created and, if it is not
//it will create it 
$create = mysql_query("CREATE DATABASE IF NOT EXISTS valetdatabase")
 or die (mysql_error());
 
//select the database we intend to work with
mysql_select_db("valetdatabase");

$dropping=mysql_query("DROP TABLE IF EXISTS customers");
//create the table for the customer information table
//
$customers = "CREATE TABLE customers (
  customer_id int(11) NOT NULL auto_increment,
  customer_fname varchar(255),
  customer_lname varchar(255) NOT NULL,
  customer_phone varchar(15) NOT NULL,
  customer_email varchar(255) NOT NULL UNIQUE,
  customer_address text,
  customer_emer_contact_name varchar(255) NOT NULL,
  customer_emer_contact_numb varchar(255) NOT NULL,
  customer_history smallint(5) unsigned
  
 
//?>
