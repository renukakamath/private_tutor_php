<?php include 'tutorheader.php';
$tid=$_SESSION['login_id'];
extract($_GET);
if (isset($_POST['message'])) {
	extract($_POST);

	$q="insert into chat values(null,'$tid','$sid','$msg',curdate())";
	insert($q);


}

 ?>
<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
<center>
	<h1>Chat with User</h1>
	<form method="post">
	<table class="table" style="width: 500px">
		<tr>
			<th>Message</th>
			<td  style="color: black"><input type="text"  required="" class="form-control" name="msg"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="message" value="submit"></td>
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
    <h1>MESSAGE</h1>
	<form>
		<table class="table" style="width: 400px;color: white">
			
			<?php 
       $q="SELECT * FROM chat WHERE (`sender_id`='$tid' AND `receiver_id`='$sid') OR (`sender_id`='$sid' AND `receiver_id`='$tid')";
       $res=select($q);

      foreach ($res as $row) {
      	?>

      	<tr>
		<?php 
      	if($row['sender_id']==$tid)
      	{
      	 ?>      		
      	
      	<td align="right"><?php echo $row['msg'] ?></td>
      	<?php 
      }
      	else
      		{
      			?>

      	<td align="left"><?php echo $row['msg'] ?></td>

      	<?php
      	 }
      	 ?>      	</tr>
      <?php }


			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>