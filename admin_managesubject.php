<?php include 'adminheader.php' ;

if (isset($_POST['subject'])) {
	extract($_POST);

	$q="insert into subjects values(null,'$sub','$des')";
	insert($q);
	alert('successfully');
	return redirect('admin_managesubject.php');

}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from subjects where subject_id='$did'";
	delete($q);
	alert('successfully');
	return redirect('admin_managesubject.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from subjects where subject_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update subjects set subject_name='$sub',description='$des'  where subject_id='$uid'";
        update($q);
        alert('successfully');
	return redirect('admin_managesubject.php');
}




?>


<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          
<center>
	<h1>Manage Subject</h1>
	<form method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table  class="table" style="width: 500px;">
			<tr>
				<th>Subject Name</th>
				<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['subject_name'] ?>" name="sub"></td>
			</tr>
			<tr>
				<th>Desciption</th>
				<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['description'] ?>" name="des"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="update" value="submit"></td>
			</tr>
		</table>
	<?php }else{ ?>
		<table  class="table" style="width: 500px;">
			<tr>
				<th>Subject Name</th>
				<td><input type="text" required="" class="form-control" name="sub"></td>
			</tr>
			<tr>
				<th>Desciption</th>
				<td><input type="text" required="" class="form-control" name="des"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="subject" value="submit"></td>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
  
        
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br>

<center>
	<h1>View Subject</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>Subject Name</th>
			<th>Description</th>
		</tr>
		<?php 
       $q="select * from subjects";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['description'] ?></td>
     	<td><a  class="btn btn-success" href="?did=<?php echo $row['subject_id'] ?>">delete</a></td>
     	<td><a  class="btn btn-success" href="?uid=<?php echo $row['subject_id'] ?>">update</a></td>
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>