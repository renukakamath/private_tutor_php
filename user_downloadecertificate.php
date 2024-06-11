
<?php include 'userheader.php';
$sid=$_SESSION['student_id'];
extract($_GET);
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
	<h1>View Certificate</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Student</th>
			<th>Subject Name</th>
			<th>Certificate</th>
			<th>date & time</th>
			
			
		
		</tr>
		<?php 
       $q="SELECT * FROM certificate INNER JOIN students USING (student_id)INNER JOIN tutor_subject USING (tutor_subject_id) INNER JOIN subjects USING (subject_id) where student_id='$sid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
        <td><?php echo $row['first_name'] ?></td>
     
     	<td><?php echo $row['subject_name'] ?></td>
       
          <td><a  class="btn btn-success" href="<?php echo $row['certificate_file'] ?>" width='100' height='100' download >certificate</a></td>
     	 <td><?php echo $row['date_time'] ?></td>
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>