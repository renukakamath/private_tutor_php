<?php include 'tutorheader.php';
extract($_GET);
if (isset($_POST['video'])) {
	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	 $q="insert into video_class values(null,'$tsub','$target')";
        insert($q);
	alert('successfully');
	

	
	}
		else
		{
			echo "file uploading error occured";
		}

	
}


 ?>
 <div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Upload Video Class</h1>
<form method="post" enctype="multipart/form-data">
	<table  class="table" style="width: 500px;color: white">
			<tr>
				<th> Tutor Subject</th>
				<td><select name="tsub" required="" class="form-control">
					<option>Select</option>
					<?php 

                   $q="select * from tutor_subject inner join subjects using (subject_id)";
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
				<th>Video</th>
				<td><input type="file" required="" class="form-control" name="imgg"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="video" value="submit"></td>
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
	<h1>View Video Class</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>Tutor Subject</th>
			
			<th>Video</th>
			
		
		</tr>
		<?php 
       $q="select * from video_class inner join tutor_subject using(tutor_subject_id) inner join subjects using(subject_id) where tutor_subject_id='$tsid'";
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