
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
                                
              
              <div class="form-group">
                <label>Add Venue</label>
                <input type="text" name="ven_name" required class="form-control" placeholder="Add name here">
              </div>
              <div class="form-group">
                <label>Add Description</label>
                <textarea class="form-control" name="ven_desc" rows="6" data-minwords="6" required placeholder="Add description here"></textarea>
              </div>
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
    $(document).ready(function() {
    $("#fields").on("submit", function(e) {
    e.preventDefault();
    var mydata = new FormData(this);
    console.log(mydata);
    $.ajax({
            url: "ajax/upload_venue.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if(data == 0) {
                   
                    alert("Error uploading data");
                }
                
                else{
                    alert("data inserted successfully");
                }
            
                
            }
        });
    });
});
  });
  </script>