<?php include 'publicheader.php';

if (isset($_POST['login'])) {
	extract($_POST);

	echo$q="select * from login where username='$uname' and password='$password'";
	$res=select($q);
	
   if (sizeof($res)>0) {
   	$_SESSION['login_id']=$res[0]['login_id'];
   	$lid=$_SESSION['login_id'];
		if ($res[0]['usertype']=="admin") {
				return redirect('admin_home.php');

			}elseif ($res[0]['usertype']=="student") {
				echo$q="select * from students where login_id='$lid'";
				$r=select($q);
				if (sizeof($r)>0) {
					$_SESSION['student_id']=$r[0]['student_id'];
					echo$sid=$_SESSION['student_id'];
				}
				return redirect('user_home.php');
			}elseif ($res[0]['usertype']=="tutor") {
				echo$q="select * from tutor where login_id='$lid'";
				$r=select($q);
				if (sizeof($r)>0) {
					$_SESSION['tutor_id']=$r[0]['tutor_id'];
					echo$tid=$_SESSION['tutor_id'];
				}

				return redirect('tutor_home.php');
			}	
		
	}else{
		alert('invalid username and password');
	}

}






 ?>

<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Login</h1>
	<form method="post">
	<table  class="table" style="width: 500px;">
		<tr>
			<th>User Name</th>
			<td><input type="text" required="" class="form-control" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="password"></td>
		</tr>
		<tr>
			<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="login" value="submit"></td>
		</tr>
	</table>
</form>
</center>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>