<html>
<LINK REL=StyleSheet HREF="index.php" TYPE="text/css">
<style>
h1{
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
body{
     text-align:center;
     background-image: url("Background.jpg");
}
div.no_comments{
  text-align:center;
padding-left: 50px;
     padding-right: 50px;
  background-color:#111;
  opacity : 0.7;
  border-style: solid;
      border-color:black;
    border-width: 1px;
        margin-right:500px;
    margin-left:500px;
    color:#FFF;
}


</style>







<head>
      <title>yaBB</title>
      <h1>yaBB</h1>
      <h2>Exuberate yourself</h2>
</head>

<body><div class="ervything">
<?php
require 'core.inc.php';
require 'connect.inc.php';
$post_id = $_REQUEST['postid'];
if(loggedin()) {
  $firstname=getuserfield('firstname');
  $lastname=getuserfield('lastname');
  echo '<div id="loggedin">You\'re logged in.<br> '.$firstname.' '.$lastname.'  <br><a href="logout.php">Log out</a><br><br><br><br></div>';
?>
 <a href="index.php">Homepage</a> <br><br><br> <?php
$query_posts = "SELECT * From posts WHERE post_id='".$post_id."'";
$query_comments =  "SELECT * From comments WHERE post_id='".$post_id."'";

$query_post_run=mysql_query($query_posts);

if(isset($_POST['postcomment']) && isset($_POST['postcomment'])){
$comment = $_POST['postcomment'];
$user_id = getuserfield('id');
$insert_comment = mysql_query("INSERT INTO comments VALUES('','.$post_id.','$user_id','".mysql_real_escape_string($comment)."',0)");

}




if($query_comments_run = mysql_query($query_comments)){

$numb = mysql_num_rows($query_comments_run);
$user_id = getuserfield('id');



$post_user_id =  mysql_result($query_post_run,0,'user_id');
$post_user = mysql_query("SELECT username,id FROM users WHERE id='".$post_user_id."'");
$post_username = mysql_result($post_user,0,'username');

?><div class="post"><?php
echo '<h2>'.mysql_result($query_post_run,0,'post').'</h2>';

echo "____by user <strong>@$post_username</strong>
<br><br>";?></div><br><?php

if($numb>0){
for($i=$numb-1;$i>=0;$i--) {
  $query_comment_user = mysql_result($query_comments_run,$i,'user_id');
  $q_comment_user = mysql_query("SELECT * FROM users WHERE id='".$query_comment_user."'");
  $comment_username = mysql_result($q_comment_user,0,'username');
  echo '<div class="comment"><h3><br>';
  echo mysql_result($query_comments_run,$i,'comment');
  echo "</h3>____by user @$comment_username<br>";

  ?>
  <br></div><br>  <?php
}
}
else {
  echo '<div class="no_comments"><h2>No comments yet.<br>Be the first to make one.</h2></div>';
}
}
}
else {
   header('Location: index.php');
}

?>

<form action="post.php?postid=<?php echo $post_id?>" method="POST">
<textarea rows="4" cols="50" name="postcomment"></textarea><br>
         <input type="submit" value="Post a comment"></form>
         

</body>
</html>
