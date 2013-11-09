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
<html>
    <head>
        <title>Valet System</title>
        <link rel="stylesheet" type="text/css" href="http://jlmarks.org/css/style.css" media="screen" />
    </head>
    
    <body>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Email</td>
            </tr>
            <?php
                $getdata = "SELECT * FROM customers";
                $result = mysql_query($getdata)
                    or die("Unable to process query: " . mysql_error());
                while ($row = mysql_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo implode(' ',array($row['customer_fname'], $row['customer_lname'])); ?></td>
                <td><?php echo $row['customer_phone']; ?></td>
                <td><?php echo $row['customer_email']; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </body>
</html>
                    

