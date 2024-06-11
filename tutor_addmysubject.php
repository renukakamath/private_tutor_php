<?php include 'tutorheader.php';
$tid=$_SESSION['tutor_id'];
extract($_GET);
if (isset($_POST['subject'])) {
	extract($_POST);

	$q="insert into tutor_subject values(null,'$tid','$sub','$amount')";
	insert($q);
	alert('insert successfully');
	return redirect('tutor_addmysubject.php');
}


 ?>
 <div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Add My Subject</h1>
<form method="post">
	<table  class="table" style="width: 500px;">
			<tr>
				<th>Subject Name</th>
				<td><select name="sub" required="" class="form-control">
					<option>Select</option>
					<?php 

                   $q="select * from subjects";
                   $res=select($q);
                   foreach ($res as $row) {
                   	?>
                 <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                 <?php 
                  }


					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Amount</th>
				<td><input type="text" required="" class="form-control" name="amount"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" name="subject" class="btn btn-success" value="submit"></td>
			</tr>
		</table>
	
	</form>
</center>
    
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br>
<center>
	<h1>View  tutor subject</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>Tutor Name</th>
			<th>Subject Name </th>
			<th>Amount</th>
			
		
		</tr>
		<?php 
       $q="select * from tutor_subject inner join tutor using (tutor_id) inner join subjects using(subject_id)where tutor_id='$tid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['amount'] ?></td>
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>