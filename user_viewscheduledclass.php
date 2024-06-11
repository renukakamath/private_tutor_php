<?php include 'userheader.php' ?>
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
	<h1>View  Schedule Class</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			<th>Student</th>
			<th>Date </th>
			<th>Time</th>
			<th>Status</th>
			
		
		</tr>
		<?php 
       $q="SELECT * FROM schedule_class INNER JOIN booking USING(booking_id) INNER JOIN tutor_subject USING (tutor_subject_id) INNER JOIN subjects USING(subject_id) INNER JOIN students USING(student_id)";
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
  
   	 <td><a  class="btn btn-success" href="user_viewebook.php?tsid=<?php echo $row['tutor_subject_id'] ?>">View E-Book</a></td> 
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>