<?php
session_start();
ob_start();
include "conn.inc.php";
?>
<html>
<head>
<title>AMAValet Registration</title>
</head>
<body>
<?php
if (isset($_POST['submit']) && $_POST['submit'] == "Register") {
  if ($_POST['username'] != "" && 
      $_POST['password'] != "" && 
      $_POST['email'] != "") {
          
    $query = "SELECT username FROM admin " .
             "WHERE username = '" . $_POST['username'] . "';";
    $result = mysql_query($query) 
      or die(mysql_error());

    if (mysql_num_rows($result) != 0) {
?>
<p>
  <font color="#FF0000"><b>The Username, 
  <?php echo $_POST['username']; ?>, is already in use, please choose
  another!</b></font>
  <form action="register.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password" 
                value="<?php echo $_POST['password']; ?>"><br>
    Email: <input type="text" name="email" 
             alue="<?php echo $_POST['email']; ?>"><br>
    
    <input type="submit" name="submit" value="Register"> &nbsp; 
    <input type="reset" value="Clear">
  </form>
</p>
<?php
    } else {
      $query = "INSERT INTO user_info (username, password, email) " .
               "VALUES ('" . $_POST['username'] . "', " .
               "(PASSWORD('" . $_POST['password'] . "')), '" . 
               $_POST['email'] . "');";
      $result = mysql_query($query) 
        or die(mysql_error());
      $_SESSION['user_logged'] = $_POST['username'];
      $_SESSION['user_password'] = $_POST['password'];
?>
<p>
  Thank you, <?php echo $_POST['username']; ?> for registering!<br>
<?php
      header("Refresh: 5; URL=index.php");
      echo "Your registration is complete! " .
           "You are being sent to the page you requested!<br>";
      echo "(If your browser doesn't support this, " .
           "<a href=\"index.php\">click here</a>)";
      die();
    }
  } else {
?>
<p>
  <font color="#FF0000"><b>The Username, Password, and Email fields are required!</b></font>
  <form action="register.php" method="post">
    Username: <input type="text" name="username" 
                value="<?php echo $_POST['username']; ?>"><br>
    Password: <input type="password" name="password" 
                value="<?php echo $_POST['password']; ?>"><br>
    Email: <input type="text" name="email" 
             value="<?php echo $_POST['email']; ?>"><br>
    <br><br>
    <input type="submit" name="submit" value="Register"> &nbsp; 
    <input type="reset" value="Clear">
  </form>
</p>
<?php
  }
} else {
?>
<p>
  Welcome to the registration page!<br>
  The Username, Password, and Email fields 
  are required!
  <form action="register.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Email: <input type="text" name="email"><br>
    <br><br>
    <input type="submit" name="submit" value="Register"> &nbsp; 
    <input type="reset" value="Clear">
  </form>
</p>
<?php
}
?>
</body>
</html>
