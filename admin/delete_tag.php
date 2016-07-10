<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: login.php');
}
include('../config.php');
?>

<?php
if(!isset($_REQUEST['ID']))
{
	header("location:managetag.php");
}
else
{
		$id=$_REQUEST['ID'];
}

?>
<?php include_once("../config.php"); ?>
<?php

$statement1=$db->prepare('delete from tbl_tag where tag_id=?');
$statement1->execute(array($id));

header("location:managetag.php");
?>