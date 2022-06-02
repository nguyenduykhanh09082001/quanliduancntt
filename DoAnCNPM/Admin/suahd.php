<?php
session_start();
?>
<?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassWord="";
$dbName="bandongho";
$conn =new mysqli($dbServerName,$dbUserName,$dbPassWord,$dbName);
if($_GET['trangthai']=='0')
{
	$sql_query="UPDATE tbhoadon SET trangthai='1' WHERE mahd='".$_GET['edit_id']."'";
	$result_set=mysqli_query($conn, $sql_query);
}
else
{
	$sql_query="UPDATE tbhoadon SET trangthai='0' WHERE mahd='".$_GET['edit_id']."'";
	$result_set=mysqli_query($conn, $sql_query);
}
echo"
		<script>
		  alert('Sửa thành công!');
		  var src='xuathd.php';
		  window.location.href=src;		
		</script>";
?>