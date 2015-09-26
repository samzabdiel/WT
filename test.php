<?php
$i=1;
for($i=1;$i<=2;$i++)?>
<form action="test.php" method="post">
type :<input type="text" name="just$i">
<input type="submit">
</form>
<?php
if(isset($_POST['just']) && isset($_POST['just'])) {
$x = $_POST['just'.$i.''];

echo $x;
}
?>