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
	<h1>View Video Class</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			
			<th>Video</th>
			
		
		</tr>
		<?php 
       $q="SELECT * FROM video_class INNER JOIN `tutor_subject` USING(`tutor_subject_id`) INNER JOIN `subjects` USING(subject_id)";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['subject_name'] ?></td>
     
        <td><video width="320" height="240" controls><source src="<?php echo $row['class_videos'] ?>" type="video/mp4"></video></td>
     	
     
 
     	

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>