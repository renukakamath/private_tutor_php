<?php include 'userheader.php' ;
$sid=$_SESSION['student_id'];
extract($_GET);
if (isset($_POST['booking'])) {
	extract($_POST);

	$q="insert into booking values(null,'$tsb','$sid',now(),'pending')";
	insert($q);
	alert(' Successfully');
	
}






?>

<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Book Tutor</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>Tutor Subject</th>
				<td><select name="tsb" required="" class="form-control">
					<option>Select</option>
					<?php 

                  $q="select * from tutor_subject inner join subjects using(subject_id)";
                  $res=select($q);
                  foreach ($res as $row) {
                  	?>
                  <option value="<?php echo $row['tutor_subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                 <?php
                  }


					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Date & Time</th>
				<td><input type="datetime-local" required="" class="form-control" name="date"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="booking" value="submit"></td>
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
	<h1>View Bookings</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			<th>Students</th>
			<th>Date Time</th>
			<th>Status</th>
		
		</tr>
		<?php 
       $q="SELECT * FROM Booking INNER JOIN tutor_subject USING(tutor_subject_id) INNER JOIN subjects USING (subject_id) INNER JOIN students USING (student_id)";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['date_time'] ?></td>
     	<td><?php echo $row['status'] ?></td>
      <td><a  class="btn btn-success" href="user_makepayment.php?bid=<?php echo $row['booking_id'] ?>&aid=<?php echo $aid ?>">Make Payment</a></td> 
   
       
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>