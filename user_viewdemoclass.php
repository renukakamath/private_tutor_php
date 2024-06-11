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
	<h1>View Demo Class</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			<th>Class title</th>
			<th>Video</th>
			
		
		</tr>
		<?php 
       $q="select * from demo_class inner join tutor_subject using(tutor_subject_id) inner join subjects using(subject_id) where tutor_subject_id='$tsid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     	<td><?php echo $row['class_title'] ?></td>
        <td><video width="320" height="240" controls><source src="<?php echo $row['video'] ?>" type="video/mp4"></video></td>
     	
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>