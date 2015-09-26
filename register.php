<html>
<LINK REL=StyleSheet HREF="index.php" TYPE="text/css">
<style>h1{
       text-align:center;
      font-family:   sans-serif;
      color:#2898E2;

      border-top-style: solid;
      border-bottom-style: solid;
      border-color:black;
    border-width: 1px;
    margin-right:600px;
    margin-left:600px;
}
h2{
   opacity 0.4;
}

/* unvisited link */
a:link {
  text-decoration: none;
   color: #FFF;
}

/* visited link */
a:visited {
  text-decoration: none;
    color: #FFF;
}

/* mouse over link */
a:hover {
  text-decoration: none;
    color: #FFF;
}

/* selected link */
a:active {
  text-decoration: none;
    color: #FFF;
}
body{
     text-align:center;
     background-image: url("Background.jpg");
}

table{ color:white;
       background-color:Black;
       opacity:0.7;
      font-size:18px;
      text-align:center;
      border-style: solid;
      border-color:black;
      border-width: 1px;
      width:400px;
}
</style>

<?php
require 'core.inc.php';
require 'connect.inc.php';

if(!loggedin()) {

  if(
  isset($_POST['username'])&&
  isset($_POST['email_id'])&&
  isset($_POST['password'])&&
  isset($_POST['password_again'])&&
  isset($_POST['firstname'])&&
  isset($_POST['lastname'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email_id = $_POST['email_id'];
    $password_again = $_POST['password_again'];
    $password_hash = md5($password);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    if(
    !empty($username)&&
    !empty($password)&&
    !empty($password_again)&&
    !empty($firstname)&&
    !empty($email_id)&&
    !empty($lastname)){
      if($password!=$password_again) {
        echo 'Password doesnt match';
      }
      else {
    $query = "SELECT username FROM users WHERE username='".$username."'" ;
    $query_run = mysql_query($query) or die(mysql_error());

    if(mysql_num_rows($query_run)==1){
     echo 'The username '.$username.' already exists';
    }
    else {
      $query = "INSERT INTO users VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($email_id)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."')";
      
      if($query_run = mysql_query($query)){
        header('Location: register_success.php');
      }
      else{
        echo 'Sorry couldn\'t register';
      }
    }
    }
    }
    else {
      echo 'All fields are required';


    }
}
?>
<head>
      <title>yaBB</title>
      <h1>yaBB</h1>
      <h2>Exuberate yourself</h2>
</head>
<body><div>
    <form action="register.php" method="POST">
           <table align="center" cellpadding="10">
   <tr><td>Username:<br><input type="text" name="username"></td></tr><br><br>
   <tr><td>Email ID:<br><input type="text" name="email_id"></td></tr><br><br>
   <tr><td>Password:<br><input type="password" name="password"></td></tr><br><br>
   <tr><td>Confirm Password:<br><input type="password" name="password_again"></td></tr><br><br>
   <tr><td>Firstname:<br><input type="text" name="firstname"></td></tr><br><br>
   <tr><td>Lastname:<br><input type="text" name="lastname"></td></tr><br><br>
   <tr><td><input type="submit" value="Register">
   <a href="index.php"><br><br>Already have an account?<br>Sign in</a></td></tr></table>
   </form>
  <?php

} else if(loggedin()) {
  echo 'You\'re already registered and logged in';
}

?> </body></html>