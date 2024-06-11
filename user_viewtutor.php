<?php include 'userheader.php';
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
	<h1>View Tutor</h1>
	<table  class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Place</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Qualification</th>
		</tr>
		<?php 
       $q="select * from tutor where tutor_id='$tid'";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
     <tr>
     	<td><?php echo $slno++; ?></td>
     	<td><?php echo $row['first_name'] ?></td>
     	<td><?php echo $row['last_name'] ?></td>
     	<td><?php echo $row['place'] ?></td>
     	<td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['email'] ?></td>
     	<td><?php echo $row['qualification'] ?></td>
       <td><a  class="btn btn-success" href="user_chatwithtutor.php?tid=<?php echo $row['login_id'] ?>">Chat With Tutor</a></td>

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>