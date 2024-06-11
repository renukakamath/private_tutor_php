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
	<h1>View subject</h1>
	<table  class="table" style="width: 500px;color: black">
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
      <td><a  class="btn btn-success" href="user_viewtutorsub.php?sid=<?php echo $row['subject_id'] ?>"> View Tutor Subject</a></td>
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>