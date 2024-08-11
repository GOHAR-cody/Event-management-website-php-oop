
 <?php
 $id=$_GET['upid'];
 include('db.php');
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
            <h2>Category</h2>
          </div>
          <div class="box-body">
                 <?php
                 $sql="SELECT * FROM `categories` WHERE `cat_id`='$id'";
                 $result = mysqli_query($conn, $sql);
                 $data= mysqli_fetch_assoc($result);
                 
                 ?>
    
              <div class="form-group">
                <label>Category name</label>
                <input type="text" value="<?php echo $data['cat_name']  ?>" name="cat_name" required class="form-control" placeholder="Add name here">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control"  name="cat_desc" rows="6" data-minwords="6" required placeholder="Add description here"><?php echo $data['cat_description']  ?></textarea>
              </div>
          </div>
          <div>
          <input type="text" name="id" style="display:none" value="<?php echo $data['cat_id']  ?>" >
</div>
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
           url: "ajax/edit_category.php",
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
               console.log(data);
           }
           
       });
   });
});



</script>