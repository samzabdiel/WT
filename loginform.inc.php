<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $password_hash = md5($password);

  if(!empty($username)&&!empty($password)) {

    $query = "SELECT id FROM users WHERE username='".mysql_real_escape_string($username)."' AND password='".mysql_real_escape_string($password_hash)."'";

    if($query_run = mysql_query($query) or die(mysql_error())) {

      $query_num_rows = mysql_num_rows($query_run);

      if($query_num_rows==0) {
        echo 'Invalid username/password combination';
      }
      else if($query_num_rows==1){
        $user_id = mysql_result($query_run,0,'id');
        $_SESSION['user_id']=$user_id;
        header('Location: index.php');
      }
    }

  }
  else {
    echo 'You must supply a username and a password.';
  }
}
?>
<div id="loginform">
<form action="<?php echo $current_file; ?>" method="POST">
<table  align="center" cellpadding="20">
<tr>
 <td>Username : <input type="text" name="username"></td>
 <td>Password : <input type="password" name="password"></td>
</tr>
<tr>
 <td colspan="2"><input type="submit" value="Log in"></td>
</tr>
<tr>
 <td colspan="2"><a href="register.php">Register now</a></td>
</tr>
</table>
</form>
</div>