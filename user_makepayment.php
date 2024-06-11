<?php include 'userheader.php';
$sid=$_SESSION['student_id'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);

	echo$q="insert into payment values(null,'$bid','$amo',curdate())";
	insert($q);
	alert('successfully');
	return redirct('user_makepayment.php');
}


 ?>

<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Make Payment</h1>
	<form method="post">
		<table  class="table" style="width: 500px;">
			<tr>
				<th>Card number</th>
				<td><input type="text" class="form-control" name="Card"></td>
			</tr>
			<tr>
				<th>C V V</th>
				<td><input type="text" class="form-control" name="cvv"></td>
			</tr>
			<tr>
				<th>Amount</th>
				<td><input type="text" class="form-control"  value="<?php echo $aid ?>" name="amo"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="payment"  class="btn btn-success" value="submit"></td>
			</tr>
		</table>
	</form>
</center>

        
      </div>
    </div>
  </div>
</div>
</div>
<br><br><br><br><br><br><br><br><br>
<center>
	<h1>View payment</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			
      <th>Student</th>
      <th>Subject</th>
     
			<th>Amount</th>
			<th>date time</th>
			
		
		</tr>
		<?php 
       $q="SELECT * FROM payment INNER JOIN booking USING (booking_id) INNER JOIN students USING (student_id) INNER JOIN tutor_subject USING(tutor_subject_id) inner join subjects using (subject_id) where booking_id='$bid' and student_id='$sid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['amount'] ?></td>
     	<td><?php echo $row['date_time'] ?></td>
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>