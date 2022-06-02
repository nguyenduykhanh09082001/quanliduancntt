<?php
session_start();
require("../Database/KetNoi.php");
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="rename.css">
</head>
<body>
  <div id="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/440px-User_icon_2.svg.png"/>
	<form method="POST" action="" id="click">
	  <p>
	    <label>Mật khẩu:</label>
	    <input id="form_password" type="text" name="pw"/>
	  </p>
	  <p>
	    <label>Số điện thoại:</label>
	    <input id="sdt" type="text" name="sdt"/>
	  </p>
	  <p>
	    <input id="form_submit" type="submit" name="submit" value="Hoàn tất"/>
	  </p>
	</form>
<?php
  echo "
		<script>
                var src='".$_SESSION['password']."';
                document.getElementById('form_password').value=src;
                var src1='".$_SESSION['dt']."';
                document.getElementById('sdt').value=src1;	  				
        </script>
		";
  if(isset($_POST['submit']))
  {
  $uname=$_POST['user'];
  $pword=$_POST['pass'];
  $_SESSION['password']=$_POST['pw'];
  $_SESSION['dt']=$_POST['sdt'];
  $query="UPDATE login SET pass='".$_POST['pw']."',sdt='".$_POST['sdt']."' WHERE user='".$_SESSION['username']."';";
  $rs= mysqli_query($conn,$query);
  echo"
    <script>
	  alert('Thay đổi thành công!');
      var src='../vidu.php';
	  window.location.href=src;		
    </script>";
  }
?>
  </div>
</body>
</html>