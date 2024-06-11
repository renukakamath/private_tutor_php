<?php include 'tutorheader.php';
$tid=$_SESSION['tutor_id'];
extract($_GET);

if (isset($_POST['class'])) {
	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{
		 	
	 echo$q="insert into demo_class values(null,'$tsub','$cla','$target')";
insert($q);
	alert('successfully');
	return redirect('tutor_uploaddemoclass.php');

	
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
	<h1>Upload Demo Class</h1>
<form method="post" enctype="multipart/form-data">
	<table  class="table" style="width: 500px;">
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
				<th>Class Title</th>
				<td><input type="text" required="" class="form-control" name="cla"></td>
			</tr>
			<tr>
				<th>Video</th>
				<td><input type="file" required="" class="form-control" name="img"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="class" value="submit"></td>
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
	<h1>View Upload Demo Class</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			
			<th>Subject Name </th>
			<th>Class Title</th>
			<th>Video</th>
			
		
		</tr>
		<?php 
       $q="SELECT * FROM demo_class INNER JOIN tutor_subject  USING (tutor_subject_id) INNER JOIN subjects USING(subject_id) WHERE tutor_id='$tid'";
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