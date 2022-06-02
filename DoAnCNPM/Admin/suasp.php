<?php
session_start();
?>
<?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassWord="";
$dbName="bandongho";
$conn =new mysqli($dbServerName,$dbUserName,$dbPassWord,$dbName);
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM tbsanpham WHERE masp=".$_GET['edit_id'];
	$result_set=mysqli_query($conn, $sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{ 
    $masp=$_POST['masanpham'];
	$ten=$_POST['tensp'];
	$anh = $_POST['anh'];
	$gia=$_POST['gia'];
	$so_luong=$_POST['soluong'];
	$mo_ta=$_POST['mota'];
	$phan_loai=$_POST['maloai'];
	$sql_query = "UPDATE tbsanpham SET gia='$gia',anh='$anh',phanloai='$phan_loai', mota='$mo_ta', soluong='$so_luong', tensp='$ten' WHERE masp=".$_GET['edit_id'];
	if(mysqli_query($conn, $sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='xuatsp.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating data');
		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: xuatsp.php");
}
?>
<html>
<head>
	 <style>
	 @charset "utf-8";
/* CSS Document */
/* and last but not the least stylesheet file that makes pretty view of  */
*
{
	margin:0;
	padding:0;
}
body
{
	background:#f9f9f9;
	font-family:"Courier New", Courier, monospace;
}
#header
{
	width:100%;
	height:50px;
	background:#00a2d1;
	color:#f9f9f9;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size:35px;
	text-align:center;
}
#header a
{
	color:#fff;
	text-decoration:blink;
}
#body
{
	margin-top:50px;
}
table
{
	width:80%;
	font-family:Tahoma, Geneva, sans-serif;
	font-weight:bolder;
	color:#999;
	margin-bottom:80px;
}
table a
{
	text-decoration:none;
	color:#00a2d1;
}
table,td,th
{
	border-collapse:collapse;
	border:solid #d0d0d0 1px;
	padding:20px;
}
table td input
{
	width:97%;
	height:35px;
	border:dashed #00a2d1 1px;
	padding-left:15px;
	font-family:Verdana, Geneva, sans-serif;
	box-shadow:0px 0px 0px rgba(1,0,0,0.2);
	outline:none;
}
table td input:focus
{
	box-shadow:inset 1px 1px 1px rgba(1,0,0,0.2);
	outline:none;
}
table td button
{
	border:solid #f9f9f9 0px;
	box-shadow:1px 1px 1px rgba(1,0,0,0.2);
	outline:none;
	background:#00a2d1;
	padding:9px 15px 9px 15px;
	color:#f9f9f9;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bolder;
	border-radius:3px;
	width:49.5%;
}
table td button:active
{
	position:relative;
	top:1px;
}

	 </style>
</head>
<body>
<center>
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="tensp" placeholder="tên sản phẩm" value="<?php echo $fetched_row['tensp']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="anh" placeholder="link" value="<?php echo $fetched_row['anh']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="maloai"  placeholder="maloai"  value="<?php echo $fetched_row['phanloai']; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="masanpham"  placeholder="masanpham"  value="<?php echo $fetched_row['masp']; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="gia"  placeholder="đơn giá"  value="<?php echo $fetched_row['gia']; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="mota"   placeholder="mô tả" value="<?php echo $fetched_row['mota']; ?>" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="soluong"  placeholder="số lượng" value="<?php echo $fetched_row['soluong']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>