<?php include 'adminheader.php' ;

if (isset($_GET['aid'])) {
 extract($_GET);

 $q="update login set usertype='tutor' where login_id='$aid' ";
 update($q);

}
if (isset($_GET['did'])) {
  extract($_GET);

  $q="update login set usertype='block' where login_id='$did'";
  update($q);
}




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
       $q="select * from tutor inner join login using(login_id) ";
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
      <?php 
       if ($row['usertype']=="pending") {
        ?>
          <td><a  class="btn btn-success" href="?aid=<?php echo $row['login_id'] ?>">accept</a></td>
      <td><a  class="btn btn-success" href="?did=<?php echo $row['login_id'] ?>">reject</a></td>
      <?php 
    }
       ?>

       <?php 

       if ($row['usertype']=="tutor") {
        ?>
        <td><a  class="btn btn-success" href="admin_viewdemoclass.php?tid=<?php echo $row['tutor_id'] ?>">View Demo Class</a></td>
        <td><a  class="btn btn-success" href="admin_viewebooks.php?tid=<?php echo $row['tutor_id'] ?>">View E-Books</a></td>
    <?php 
       }




        ?>
     

     	
     </tr>
    <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>