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


//clearing out prior runnings of this script, if they exist
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
  customer_history smallint(5) unsigned,
  PRIMARY KEY(customer_id)
  )";

$results = mysql_query($customers)
    or die(mysql_error());  
    
// after thinking about it a little further it seems to make sense to create a 
//table for the individual spaces

//clearing prior info, if it exists.
$dropping=mysql_query("DROP TABLE IF EXISTS parkingspaces");

//the scring that creates the table
$parkingspaces="CREATE TABLE parkingspaces (
    space_id int(5) NOT NULL auto_increment,
    is_covered bool NOT NULL default 0, 
    is_inuse bool NOT NULL default 0,
    customer_using int(11),
    PRIMARY KEY (space_id)
    )";
$results = mysql_query($parkingspaces)
    or die(mysql_error());

//reciepts database
//clearing prior database
$dropping=mysql_query("DROP TABLE IF EXISTS reciepts");

$reciepts="CREATE TABLE reciepts(
    reciept_number int(11) NOT NULL auto_increment,
    customer_id int(11) NOT NULL,
    checkin_time datetime NOT NULL,
    checkout_time datetime,
    pricing_schedule int(3) NOT NULL default 0,
    total dec(5,2),
    PRIMARY KEY (reciept_number)
    )";
    
$results = mysql_query($reciepts)
    or die(mysql_error());    
    
//now to set up the users tables

$dropping=mysql_query("DROP TABLE IF EXISTS admin");

$admin = "CREATE TABLE admin(
    username varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(50) NOT NULL,
    admin_level int(2) NOT NULL,
    id int(10) NOT NULL auto_increment,
    PRIMARY KEY(id)
    )";
$results = mysql_query ($admin)
    or die(mysql_error());
    
?>
