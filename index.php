<html>
<style type="text/css">
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

div.form{
         text-align:center;


}

div.post{
  text-align:left;
padding-left: 50px;
     padding-right: 50px;
  background-color:#111;
  opacity : 0.7;
  border-style: solid;
      border-color:black;
    border-width: 1px;
        margin-right:300px;
    margin-left:300px;
    color:#FFF;
}

div.comment{
  text-align:left;
padding-left: 50px;
     padding-right: 50px;
  background-color:#111;
  opacity : 0.7;
  border-style: solid;
      border-color:black;
    border-width: 1px;
        margin-right:100px;
    margin-left:500px;
    color:#FFF;
}

#loggedin{
  text-align:right;
      margin-right:300px;
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




if(loggedin()) {
  $firstname=getuserfield('firstname');
  $lastname=getuserfield('lastname');
  echo '<div id="loggedin">You\'re logged in.<br> '.$firstname.' '.$lastname.'  <br><a href="logout.php">Log out</a><br></div>';
  $query = "SELECT post,post_id,user_id From posts";
  $query_comments = "SELECT comment, post_id, user_id FROM comments";

  $user_id = getuserfield('id');
  if(isset($_POST['post'])&&!empty($_POST['post'])) {
    $post = $_POST['post'];
    $query1 = "INSERT INTO `posts`(`post_id`, `user_id`, `post`, `upvotes`) VALUES ('','.$user_id.','".mysql_real_escape_string($post)."',0)";
    if($query_run1 = mysql_query($query1) or die(mysql_error())){
      echo 'Post successfully made';
    }
  }
  
  

  
  


  if($query_run=mysql_query($query)){

    $num=mysql_query("SELECT COUNT(*)  FROM posts");
    $totalposts = mysql_result($num,0);
    
    $num2=mysql_query("SELECT COUNT(*)  FROM comments");
    $totalcomments = mysql_result($num2,0);




  ?>


    <br><br><br>
    <div class="form">
    <form method="POST" action="index.php" >
      <textarea rows="5" cols="50" name="post"></textarea><br>
      <input type="submit" value="Make a post">
    </form> </div>




    <?php
    for($i=$totalposts-1;$i>=0;$i--)
    {
      if($post_run = mysql_result($query_run,$i,'post')){
        $post_user_id =  mysql_result($query_run,$i,'user_id');
        $post_id =  mysql_result($query_run,$i,'post_id');

        $post_user = mysql_query("SELECT username,id FROM users WHERE id='".$post_user_id."'");
        $post_username = mysql_result($post_user,0,'username');

        echo '<div class="post"><div class="postpost">
                  <h2><a href="post.php?postid='.$post_id.'">'.$post_run.'</a></h2>____by user <strong>@'.$post_username.'</strong>
                  <br><br>
             </div></div>';
        echo '<br>';
             ?>


        <!--

       <form method="POST" action="index.php">
         <textarea rows="4" cols="50" name="postcomment"></textarea><br>
         <input type="submit" value="Post a comment"></form>
         -->

<?php
          if(isset($_POST['postcomment'])&&!empty($_POST['postcomment'])){


                $postcomment = $_POST['postcomment'];
                $query2 = "INSERT INTO comments VALUES ('','.$post_id.','.$user_id.','".$postcomment."',0)";

                if($queryrun2 = mysql_query($query2) or die(mysql_error())){
                  echo 'Comment successfuly made';
                  }



         if($query_comment = mysql_query("SELECT post_id,user_id,comment from comments where post_id=".$i."") or die(mysql_error())){

           for($k=$totalcomments-1;$k>=0;$k--){

                }
                $comment_user_id = mysql_result($query_comment,$k,'user_id');
                $comment_user = mysql_query("SELECT username FROM users WHERE id='".$comment_user_id."'");
                $comment_username = mysql_result($comment_user,0,'username');
                $comment_run = mysql_result($query_comments,$k,'comment');
                for($t=0;$t<$k;$t++){echo '&nbsp|';}
                  echo '<div>
                        '.mysql_real_escape_string($comment_run).'<br>&nbsp;&nbsp;&nbsp;&nbsp____by user <strong>@'.$comment_username.'</strong>

                        <div>';


               } unset($_POST);
      }


    }
    }
  }
  else{echo 'ok1';}
}

else {
   include 'loginform.inc.php';
}




?>
</div>
</body>
</html>