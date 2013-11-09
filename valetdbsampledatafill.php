<?php
require('/home/jlmarks/connectiondata.php');

//creating the connection to the database
$connect = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die ("It appears the server settings are incorrect.");
 
mysql_select_db("valetdatabase");
 
/*******************************************************************************

customers
  customer_id int(11) NOT NULL auto_increment,
  customer_fname varchar(255),
  customer_lname varchar(255) NOT NULL,
  customer_phone varchar(15) NOT NULL,
  customer_email varchar(255) NOT NULL UNIQUE,
  customer_address text,
  customer_emer_contact_name varchar(255) NOT NULL,
  customer_emer_contact_numb varchar(255) NOT NULL,
  customer_history smallint(5) unsigned,
  
parkingspaces
    space_id int(5) NOT NULL auto_increment,
    is_covered bool NOT NULL default 0, 
    is_inuse bool NOT NULL default 0,
    customer_using int(11),
    
reciepts
    reciept_number int(11) NOT NULL auto_increment,
    customer_id int(11) NOT NULL,
    checkin_time datetime NOT NULL,
    checkout_time datetime,
    pricing_schedule int(3) NOT NULL default 0,
    total dec(5,2),
*******************************************************************************/


$fillcustomers = "INSERT INTO customers (customer_fname, customer_lname,
                                        customer_phone, customer_email, customer_address,
                                        customer_emer_contact_name, customer_emer_contact_numb)
                                        VALUES ('joe','smith','2885067747','joesmith0@gmail.com','4495 main\nAmarillo, TX\n\t79589','jim brown','3411622881'), ('mary','brown','9388737638','marybrown1@gmail.com','6003 main\nAmarillo, TX\n\t79283','cat williams','8963355220'), ('bob','davis','4324014632','bobdavis2@yahoo.com','9627 2nd\nAmarillo, TX\n\t79769','mary smith','6866754956'), ('bob','jones','7660564691','bobjones3@yahoo.com','9523 main\nAmarillo, TX\n\t79492','mary davis','8448526936'), ('bob','brown','8147298327','bobbrown4@aol.com','7062 1st\nAmarillo, TX\n\t79605','ben jones','1756096630'), ('mary','davis','9009152405','marydavis5@yahoo.com','5290 main\nAmarillo, TX\n\t79270','cat smith','5826173420'), ('jenny','williams','9652450385','jennywilliams6@aol.com','7905 2nd\nAmarillo, TX\n\t79332','cat jones','7003643665'), ('jim','brown','1548402481','jimbrown7@yahoo.com','4730 2nd\nAmarillo, TX\n\t79445','jim davis','6541527646'), ('joe','williams','6650281556','joewilliams8@yahoo.com','4478 2nd\nAmarillo, TX\n\t79711','jim johnson','7526059334'), ('cat','smith','5961308834','catsmith9@gmail.com','965 main\nAmarillo, TX\n\t79495','mary jones','6962992250'), ('cat','brown','8046491582','catbrown10@yahoo.com','7844 1st\nAmarillo, TX\n\t79763','mary davis','2038856545'), ('ben','williams','2335974681','benwilliams11@gmail.com','9087 1st\nAmarillo, TX\n\t79321','mary jones','1466093739'), ('cat','williams','5501523059','catwilliams12@yahoo.com','9593 1st\nAmarillo, TX\n\t79914','jenny williams','8894908845'), ('bob','brown','7738595602','bobbrown13@aol.com','5601 1st\nAmarillo, TX\n\t79524','bob davis','5134092744'), ('mary','jones','7201613438','maryjones14@aol.com','6504 2nd\nAmarillo, TX\n\t79651','jenny smith','1634935539'), ('mary','davis','9282713258','marydavis15@yahoo.com','6423 main\nAmarillo, TX\n\t79710','jenny smith','4130420663'), ('jenny','johnson','7561056979','jennyjohnson16@aol.com','8167 1st\nAmarillo, TX\n\t79928','joe jones','4706015899'), ('jenny','williams','1899130399','jennywilliams17@aol.com','5312 1st\nAmarillo, TX\n\t79721','joe smith','9591047113'), ('mary','davis','6032434069','marydavis18@yahoo.com','110 main\nAmarillo, TX\n\t79920','bob smith','9044894043'), ('jenny','smith','6722332879','jennysmith19@yahoo.com','5166 1st\nAmarillo, TX\n\t79905','mary davis','7108813658'), ('joe','brown','9704869389','joebrown20@aol.com','9905 2nd\nAmarillo, TX\n\t79431','jenny jones','9693518378'), ('jim','davis','1896280800','jimdavis21@gmail.com','8801 main\nAmarillo, TX\n\t79523','joe johnson','9022874827'), ('joe','brown','3154765564','joebrown22@aol.com','1196 main\nAmarillo, TX\n\t79804','ben jones','6053908458'), ('bob','davis','4346468636','bobdavis23@yahoo.com','930 2nd\nAmarillo, TX\n\t79521','joe williams','3431804504'), ('mary','jones','8930091806','maryjones24@aol.com','9332 2nd\nAmarillo, TX\n\t79249','mary johnson','1287798365'), ('ben','williams','5051294127','benwilliams25@yahoo.com','730 1st\nAmarillo, TX\n\t79904','ben jones','8576902846'), ('jenny','davis','5435959851','jennydavis26@gmail.com','3891 main\nAmarillo, TX\n\t79903','ben williams','5901485577'), ('mary','johnson','2948348706','maryjohnson27@gmail.com','9956 1st\nAmarillo, TX\n\t79653','jim jones','5057756534'), ('cat','jones','6218643732','catjones28@yahoo.com','6934 1st\nAmarillo, TX\n\t79393','ben davis','1525108070'), ('bob','brown','8174939039','bobbrown29@gmail.com','4228 2nd\nAmarillo, TX\n\t79349','jim jones','9410986354'), ('jim','jones','7378400201','jimjones30@yahoo.com','8395 1st\nAmarillo, TX\n\t79269','ben johnson','4791519495'), ('bob','williams','1698193850','bobwilliams31@gmail.com','1443 1st\nAmarillo, TX\n\t79177','jenny johnson','1525111584'), ('bob','davis','2572565200','bobdavis32@aol.com','2145 2nd\nAmarillo, TX\n\t79697','ben davis','8803389999'), ('ben','davis','5299150635','bendavis33@aol.com','1778 main\nAmarillo, TX\n\t79774','bob williams','7627021955'), ('joe','johnson','3337183277','joejohnson34@yahoo.com','9944 1st\nAmarillo, TX\n\t79596','ben smith','6113446193'), ('cat','smith','8985827782','catsmith35@yahoo.com','5317 1st\nAmarillo, TX\n\t79225','joe johnson','6434703056'), ('bob','jones','1958062430','bobjones36@yahoo.com','1506 1st\nAmarillo, TX\n\t79715','cat brown','4273945795'), ('bob','jones','1746962074','bobjones37@aol.com','1004 1st\nAmarillo, TX\n\t79306','joe brown','6523126428'), ('jim','williams','4781385087','jimwilliams38@gmail.com','7796 1st\nAmarillo, TX\n\t79620','joe davis','6393678393'), ('mary','smith','5137651274','marysmith39@aol.com','3714 2nd\nAmarillo, TX\n\t79326','cat johnson','7182092184'), ('mary','jones','3979877243','maryjones40@gmail.com','537 1st\nAmarillo, TX\n\t79158','cat smith','8080146518'), ('cat','brown','9696569058','catbrown41@aol.com','7022 main\nAmarillo, TX\n\t79627','jenny jones','8622455772'), ('joe','smith','8718428233','joesmith42@yahoo.com','2299 main\nAmarillo, TX\n\t79547','joe jones','6982997856'), ('ben','johnson','4873265609','benjohnson43@yahoo.com','7313 2nd\nAmarillo, TX\n\t79866','mary davis','6626362404'), ('mary','smith','2605473208','marysmith44@aol.com','8731 2nd\nAmarillo, TX\n\t79301','jim brown','8556916046'), ('cat','jones','1959322231','catjones45@yahoo.com','2682 1st\nAmarillo, TX\n\t79280','joe davis','1229834513'), ('ben','brown','9628423889','benbrown46@aol.com','619 main\nAmarillo, TX\n\t79908','bob johnson','6962445081'), ('ben','williams','7171306886','benwilliams47@yahoo.com','1358 1st\nAmarillo, TX\n\t79789','jim jones','3100486053'), ('bob','jones','1390323982','bobjones48@yahoo.com','51 2nd\nAmarillo, TX\n\t79546','jenny smith','9524633315'), ('mary','davis','6225054814','marydavis49@aol.com','4377 1st\nAmarillo, TX\n\t79837','cat smith','2546185664')";
$results=mysql_query($fillcustomers)
    or die(mysql_error());
$fillspaces = "INSERT INTO parkingspaces (is_covered, is_inuse)
                    VALUES(1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (1,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0), (0,0)";
$results=mysql_query($fillspaces);

$addusers = "INSERT INTO admin (username, password, email, admin_level)
    VALUES ('amavalet', PASSWORD('4m4v4l37'), 'valet@til.la', '1')";
$results = mysql_query($addusers);
                                        
?>
