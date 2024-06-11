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
  <h1>View payment</h1>
  <table  class="table" style="width: 500px;color: black">
    <tr>
      <th>Slno</th>
      
      <th>Student</th>
      <th>Subject</th>
     
      <th>Amount</th>
      <th>date time</th>
      
    
    </tr>
    <?php 
       $q="SELECT * FROM payment INNER JOIN booking USING (booking_id) INNER JOIN students USING (student_id) INNER JOIN tutor_subject USING(tutor_subject_id) inner join subjects using (subject_id) ";
       $res=select($q);
       $slno=1;
       foreach ($res as $row) {
        ?>
     <tr>
      <td><?php echo $slno++; ?></td>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo $row['subject_name'] ?></td>
      <td><?php echo $row['amount'] ?></td>
      <td><?php echo $row['date_time'] ?></td>
 
      

      
     </tr>
    <?php 
       }


     ?>
  </table>
</center>
<?php include 'footer.php' ?>