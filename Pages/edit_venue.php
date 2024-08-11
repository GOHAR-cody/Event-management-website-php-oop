<?php  
 include('db.php'); 
 $id = $_GET['upid'];
 

 ?> 
 <?php
 include('../include/header.php'); 
 include('../include/sidebar.php'); 
?>
  <div class="app" id="app">
  <?php  include('../include/navbar.php') ?>
    <div ui-view class="app-body" id="view">

<div class="padding">
  <div class="row " style="margin-left:40em">
    <div class="col-sm-6 " >
      <form  Method="POST" id="fields">
        <div class="box">
          <div class="box-header">
            <h2>Venue</h2>
          </div>
          <div class="box-body">
          <?php
                 $sql="SELECT * FROM `venue` WHERE `venue_id`='$id'";
                 $result = mysqli_query($conn, $sql);
                 $data= mysqli_fetch_assoc($result);
                 
                 ?>               
              
              <div class="form-group">
                <label>Add Venue</label>
                <input type="text" name="ven_name" value="<?php echo $data['venue_name']  ?>" required class="form-control" placeholder="Add name here">
              </div>
              <div class="form-group">
                <label>Add Description</label>
                <textarea class="form-control" name="ven_desc"  rows="6" data-minwords="6" required placeholder="Add description here"><?php echo $data['venue_desc']  ?></textarea>
              </div>
          </div>
          <input style="display:none" type="text" name="id" value="<?php echo $data['venue_id'] ?>">
          <div class="dker p-a text-right">
            <button type="submit" name="submit" class="btn info">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
 
</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

 

<!-- ############ LAYOUT END-->

  </div>
  <?php  
include('../include/footer.php'); 

 ?> 
 <script> 
 $(document).ready(function() {
   
   $("#fields").on("submit", function(e) {
       e.preventDefault();    
       var mydata = new FormData(fields);
       console.log(mydata);
       $.ajax({
           url: "ajax/edit_venue.php",
           method: "POST",
           data: mydata,
           processData: false, 
       contentType: false,
           success: function(data) {
               if (data == 1) {
                   alert("Record updated successfully");        
               } else {
                   alert("Error updating the record");
               }
              
           }
           
       });
   });
});



</script>