<?php include 'tutorheader.php';
$tid=$_SESSION['tutor_id'];
extract($_GET);
if (isset($_GET['aid'])) {
      extract($_GET);

      $q="update booking set status='accept' where booking_id='$aid'";
      update($q);

}
if (isset($_GET['did'])) {
     extract($_GET);
     $q="update booking set status='reject' where booking_id='$did'";
     update($q);
}





 ?>
 <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
           
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<center>
	<h1>View Bookings</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			<th>Students</th>
			<th>Date Time</th>
			<th>Status</th>
		
		</tr>
		<?php 
       $q="SELECT * FROM Booking INNER JOIN tutor_subject USING(tutor_subject_id) INNER JOIN subjects USING (subject_id) INNER JOIN students USING (student_id) WHERE tutor_id='$tid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['date_time'] ?></td>
      <?php 

          if ($row['status']=="pending") {
            ?>
         <td><a class="btn btn-success" href="?aid=<?php echo $row['booking_id'] ?>">Accept</a></td>  
         <td><a class="btn btn-success" href="?did=<?php echo $row['booking_id'] ?>">Reject</a></td>
      <?php
          }else{




       ?>
     
      <td><a  class="btn btn-success" href="tutor_viewpayment.php?bid=<?php echo $row['booking_id'] ?>">View Payments</a></td>
      <td><a  class="btn btn-success" href="tutor_viewstudents.php?sid=<?php echo $row['student_id'] ?>">View Students</a></td>
      <td><a  class="btn btn-success" href="tutor_scheduleclass.php?bid=<?php echo $row['booking_id'] ?>">Schedule Class</a></td>
      <td><a  class="btn btn-success" href="tutor_uploadebook.php?tsid=<?php echo $row['tutor_subject_id'] ?>">Upload E-Book</a></td>
      <td><a  class="btn btn-success" href="tutor_uploadvideoclass.php?tsid=<?php echo $row['tutor_subject_id'] ?>">Upload Video Class</a></td>
   
       
     	

     	
     </tr>
    <?php 
       }
}

		 ?>
	</table>
</center>
<?php include 'footer.php' ?>