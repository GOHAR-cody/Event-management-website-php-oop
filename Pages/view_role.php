<?php  
include('../include/header.php'); 

 ?> 
 </head>
 <body>
  <div class="app" id="app">
  <?php
 
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
            <th  style="width:25%">Role Title</th>
            <th  style="width:25%">Access</th>
            <th  style="width:25%">Category</th>
            <th  style="width:25%">Planner</th>
            <th  style="width:25%">Designer</th>
            <th  style="width:25%">Volunteer</th>
            <th  style="width:25%">Venue</th>
            <th  style="width:25%">Booking</th>
            <th  style="width:25%">News</th>
            <th  style="width:25%">Events</th>
            <th  style="width:25%">Client</th>
            <th  style="width:25%">Payment</th>
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
        url: "ajax/show_role.php",
        type: "POST",
        processData: false, 
        contentType: false, 
        success: function(data) {
            $("#tablediv").html(data);
        }
    });
}
loaddata();

      
        // Handle update button click
       
  


</script>