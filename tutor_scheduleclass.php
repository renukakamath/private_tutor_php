<?php include 'tutorheader.php';
$tid=$_SESSION['tutor_id'];
extract($_GET);
if (isset($_POST['class'])) {
	extract($_POST);

	$q="insert into schedule_class values(null,'$bid','$date','$time','pending')";
	insert($q);
	alert('insert successfully');

}


 ?>
 <div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Schedule Class</h1>
<form method="post">
	<table  class="table" style="width: 500px;">
			<tr>
				<th>Date</th>
				<td><input type="date" required="" class="form-control" name="date"></td>
			</tr>
			<tr>
				<th>Time</th>
				<td><input type="time" required="" class="form-control" name="time"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="class" value="submit"></td>
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
	<h1>View  Schedule Class</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			<th>Student</th>
			<th>Date </th>
			<th>Time</th>
			<th>Status</th>
			
		
		</tr>
		<?php 
       $q="SELECT * FROM schedule_class INNER JOIN booking USING(booking_id) INNER JOIN tutor_subject USING (tutor_subject_id) INNER JOIN subjects USING(subject_id) INNER JOIN students USING(student_id) where booking_id='$bid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['date'] ?></td>
     		<td><?php echo $row['time'] ?></td>
     			<td><?php echo $row['status'] ?></td>
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>