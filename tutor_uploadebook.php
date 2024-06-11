<?php include 'tutorheader.php';
echo$tid=$_SESSION['tutor_id'];
extract($_GET);
if (isset($_POST['books'])) {
	extract($_POST);

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	 $q="insert into e_books values(null,'$tid','$tsub','$title','$target')";
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
	<h1>Upload E-Books</h1>
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
				<th> Title</th>
				<td><input type="text" required="" class="form-control" name="title"></td>
			</tr>
			<tr>
				<th>Book File</th>
				<td><input type="file" required="" class="form-control" name="imgg"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit"  class="btn btn-success" name="books" value="submit"></td>
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
	<h1>View E-Books</h1>
	<table  class="table" style="width: 500px;color: white">
		<tr>
			<th>Slno</th>
			<th>First Name</th>
			<th>Subject Name</th>
			<th>Class title</th>
			<th>Book File</th>
			
			
		
		</tr>
		<?php 
       $q="SELECT * FROM e_books INNER JOIN tutor USING (tutor_id) INNER JOIN tutor_subject USING(tutor_subject_id) INNER JOIN subjects USING (subject_id) WHERE tutor_subject_id='$tsid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
        <td><?php echo $row['first_name'] ?></td>
     
     	<td><?php echo $row['subject_name'] ?></td>
        <td><?php echo $row['title'] ?></td>
            <td><a  class="btn btn-success" href="<?php echo $row['book_file'] ?>" width='100' height='100' >Book File</a></td>
     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>