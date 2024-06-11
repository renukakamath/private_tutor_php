<?php include 'publicheader.php';


if (isset($_POST['user'])) {
	extract($_POST);
  $q="select * from login where username='$uname' and password='$pwd'";
    $r=select($q);
    if (sizeof($r)>0) {
    	alert('alredy exist');
    }else{
echo$q="insert into login values(null,'$uname','$password','pending')";
$id=insert($q);
echo$q2="insert into students values(null,'$id','$fname','$lname','$place','$phone','$email')";
insert($q2);
alert('  successfully');
return redirect('user_registration.php');



}

}




 ?>

<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Student Registration</h1>
	<form method="post">
	<table  class="table" style="width: 500px;">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" name="lname"></td>
		</tr>
		<tr>
			<th>Place</th>
			<td><input type="text" required="" class="form-control" name="place"></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="phone"></td>
		</tr>
		<tr>
			<th>email</th>
			<td><input type="text" required="" class="form-control" name="email"></td>
		</tr>
		<tr>
			<th>User Name</th>
			<td><input type="text" required="" class="form-control" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="password"></td>
		</tr>
		<tr>
			<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="user" value="submit" ></td>
		</tr>
	</table>
	</form>
</center>
</div></div></div></div></div>
<?php include 'footer.php' ?>