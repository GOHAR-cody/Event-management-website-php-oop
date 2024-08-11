<?php  


 ?> 
  <div class="app" id="app">
  <?php
 include('../include/header.php'); 
 include('../include/sidebar.php');

?>
<!-- ############ LAYOUT START-->


  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
  <?php  include('../include/navbar.php') ?>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>DataTables</h2>
    </div>
    <div class="table-responsive">
      <table ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Id</th>
            <th  style="width:25%">Venue Name</th>
            <th  style="width:25%">Description</th>
          
            <th  style="width:15%">Action</th>
            
          </tr>
        </thead>

        <tbody id="tablediv">
       
        </tbody>
      </table>
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
 include $_SERVER['DOCUMENT_ROOT'] . "/flatkit/include/footer.php";

 ?> 
<script>
 function loaddata() {
    $.ajax({
        url: "ajax/show_venue.php",
        type: "POST",
        processData: false, 
        contentType: false, 
        success: function(data) {
            $("#tablediv").html(data);
        }
    });
}
loaddata();
$(document).on("click", ".delete", function(e) {
        e.preventDefault();
        var id = $(this).data("del");

        $.ajax({
            url: "ajax/delete_venue.php",
            method: "POST",
            data: { id: id },
            success: function(data) {
                if (data == 1) {
                  alert("Venue has been deleted");
                    loaddata();
                } else {
                    alert("Error deleting the venue");
                }
            }
        });
      });
        // Handle update button click
       
  


</script>