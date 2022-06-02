<?php
        session_start();
        $dbServername="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbName="bantrangsuc";
        $conn= new mysqli($dbServername,$dbUsername, $dbPassword,$dbName);
		$query="UPDATE hang_hoa,login SET trang_thai=1 WHERE user='".$_GET['vl']."'";
        $rs= mysqli_query($conn,$query);
		echo"
		<script>
		  alert('Thanh toán thành công!');
		  var src='giohang.php';
		  window.location.href=src;		
		</script>";
?>