<?php include 'userheader.php' ;
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
	<h1>View  tutor subject</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Tutor Name</th>
			<th>Subject Name </th>
			<th>Amount</th>
			
		
		</tr>
		<?php 
       $q="select * from tutor_subject inner join tutor using (tutor_id) inner join subjects using(subject_id) where subject_id='$sid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['amount'] ?></td>
       <td><a  class="btn btn-success" href="user_viewtutor.php?tid=<?php echo $row['tutor_id'] ?>">View Tutor</a></td>
       <td><a  class="btn btn-success" href="user_viewdemoclass.php?tsid=<?php echo $row['tutor_subject_id'] ?>">View Demo Class</a></td>
        <td><a  class="btn btn-success" href="user_booktutor.php?tsid=<?php echo $row['tutor_subject_id'] ?>&aid=<?php echo $row['amount'] ?>">Book Tutor</a></td>
       
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>