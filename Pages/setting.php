
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
            <h2>Setting</h2>
          </div>
          <div class="box-body">
                                
              
              <div class="form-group">
                <label>Change Profile Picture</label>
                <input type="file" name="img_prof" class="form-control" placeholder="Add name here">
              </div>
              <div class="form-group">
                <label>Change Logo</label>
                <input type="file" name="img_logo"  class="form-control" placeholder="Add name here">
              </div>
          </div>
          <div class="dker p-a text-right">
            <button type="submit" name="submit" id="submit" class="btn info">Submit</button>
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
    var mydata = new FormData(this);
    console.log(mydata);
    $.ajax({
            url: "ajax/upload_setting.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if (data == 1) {
                    alert("Images Uploaded successfully");
                    $("#fields").trigger("reset");
                } else {
                   alert("Error uploading images");
                }
               
                
            }
        });
    });

  });


 </script>