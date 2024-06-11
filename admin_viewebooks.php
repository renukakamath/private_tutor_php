
<?php include 'adminheader.php' ?>
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
	<h1>View E-Books</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>First Name</th>
			<th>Class title</th>
			<th>Video</th>
			
		
		</tr>
		<?php 
       $q="select * from e_books inner join tutor using (tutor_id) inner join tutor_subject using(tutor_subject_id) inner join subjects using(subject_id)";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
        <td><?php echo $row['first_name'] ?></td>
     
     	<td><?php echo $row['subject_name'] ?></td>
        <td><?php echo $row['title'] ?></td>
          <td><a href="<?php echo $row['book_file'] ?>" width='100' height='100' >Book File</a></td>
     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>