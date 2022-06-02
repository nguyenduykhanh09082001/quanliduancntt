
<?php
session_start();
?>
<?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassWord="";
$dbName="bandongho";
$conn =new mysqli($dbServerName,$dbUserName,$dbPassWord,$dbName);
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="header_b.css">
		<script type="text/javascript">
function edt_id(id,trangthai)
{
	if(confirm('Sure to edit ?'))
	{
		window.location.href='suahd.php?edit_id='+id+'&trangthai='+trangthai;
	}
}

</script>
	 <style>
	 table
{
	width:80%;
	font-family:Tahoma, Geneva, sans-serif;
	font-weight:bolder;
	color:black;
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
table td a img .icon{
	width:
}
label{
	font-size:30px;
}

	 </style>
</head>
<body>
<div id="header">
	<div id="menu">
	  <ul>
	    <li>
		  <a href="xuatsp.php">Sản Phẩm</a> 
		</li>
		<li>
		  <a href="xuatkh.php">Khách Hàng</a> 
		</li>
		<li>
		  <a href="xuathd.php">Hoá Đơn</a> 
		</li>
	  </ul>
	</div>
  </div>
<center>
<div id="header">
<div id="content">
    <label> chi tiết hoá đơn </label>
    </div>
</div>

<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="5"></th>
    </tr>
    <th>Mã Chi Tiết Hoá Đơn</th>
    <th>Mã Hoá Đơn</th>
    <th>Mã Sản Phẩm</th>
	<th>Số Lượng</th>
	<th>Đơn Giá</th>
    </tr>
    <?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassWord="";
$dbName="bantrangsuc";
$conn=new mysqli($dbServerName,$dbUserName,$dbPassWord,$dbName);
$query="select * from tbchitiethoadon where mahd='".$_GET['value']."'";
$rs=mysqli_query($conn,$query);
	if(mysqli_num_rows($rs)>0)
	{
        while($row=mysqli_fetch_row($rs))
		{
		?>
            <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
			<td><?php echo number_format($row[4])." đ"; ?></td>	
			</tr>
        <?php
		}
		?>
		<?php
	}
	else
	{
		?>
        <?php
	}
	?>
    </table>
    </div>
</div>
</center>
</body>
</html>