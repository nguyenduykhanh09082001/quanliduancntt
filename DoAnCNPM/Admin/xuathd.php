
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
function chi_tiet(giatri)
{
	
	{
		window.location.href='xemhoadon.php?value='+giatri;
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
<div style="text-align:right;margin:20px 200px 0 0;">
<form method="post">
  Từ ngày: <input type="date" id="tu_ngay" name="tu_ngay" required>
  </br>
  </br>
  Đến ngày: <input type="date" id="den_ngay" name="den_ngay" required>
  </br>
  </br>
  <input type="submit" name="btn-timkiem" value="Tìm kiếm">
</form>
</div>
<div id="header">
<div id="content">
    <label> danh sách hoá đơn </label>
    </div>
</div>

<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="6"></th>
    </tr>
    <th>Mã HD</th>
    <th>Tên</th>
    <th>SDT</th>
	<th>Ngày</th>
	<th>Giá</th>
    <th>Trạng Thái</th>
    </tr>
    <?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassWord="";
$dbName="bandongho";
$conn=new mysqli($dbServerName,$dbUserName,$dbPassWord,$dbName);
$query="select * from tbhoadon";
$rs=mysqli_query($conn,$query);
$query1="select sum(tongtien) from tbhoadon";
$rs1=mysqli_query($conn,$query1);
$giatien=0;
while($row1=mysqli_fetch_row($rs1))
  {
	 $giatien=$row1[0];
  }
$ten=array();
	if(mysqli_num_rows($rs)>0)
	{
        while($row=mysqli_fetch_row($rs))
		{
			$tp=$row[5];
			$id=$row[0];
		?>
            <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
			<td><?php echo $row[4]; ?></td>
			<td><?php echo "Đã hoàn thành"; ?></td>
			</tr>
        <?php
		}
		?><td colspan="9">Doanh thu: <?php
                                           if(isset($_POST['btn-timkiem']))
										   {
											    $query="SELECT sum(tongtien) FROM tbhoadon WHERE '".$_POST['tu_ngay']."'<=ngaymua<='".$_POST['den_ngay']."' AND trangthai='1'";
												$rs= mysqli_query($conn,$query);
												while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC))
												{
												  $tongtien=$row['sum(tongtien)'];
												}
                                              echo number_format($tongtien)." đ";           
										   }
										   else
										   {
                                     		   echo number_format($giatien)." đ"; 
										   }
									 ?></td>
		<?php
	}
	else
	{
		?>
        <tr>
        <td colspan="6">No Data Found !</td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
</div>
</center>
</body>
</html>