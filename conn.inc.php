<?php
//require('/home/jlmarks/connectiondata.php');
if (@include '/home/jlmarks/connectiondata.php'){
// great!
} else {
    include 'connectiondata.php';
}
//creating the connection to the database
$connect = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die ("It appears the server settings are incorrect.". mysql_error());
 
mysql_select_db("valetdatabase")
    or die("could not select the database 'valetdatabase' " . mysql_error());
/*******************************************************************************

This will provide a very simple interface to view the customer list

*******************************************************************************/

?>
