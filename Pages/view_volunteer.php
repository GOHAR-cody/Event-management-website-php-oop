<?php
// Include necessary files for header and footer
include('../include/header.php');
include('../include/sidebar.php');
?>

<!-- Main content -->
<div id="content" class="app-content box-shadow-z0" role="main">
<?php  include('../include/navbar.php') ?>

    <!-- Main content body -->
    <div class="app-body" id="view">
        <!-- Padding -->
        <div class="padding">
            <!-- Box -->
            <div class="box">
                <!-- Box header -->
                <div class="box-header">
                    <h2>Volunteer DataTable</h2>
                </div>
                <!-- / Box header -->

                <!-- Table responsive -->
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b">
                        <thead>
                            <tr>
                                <th style="width:5%">Id</th>
                                <th style="width:20%">Name</th>
                                <th style="width:15%">Date of Birth</th>
                                <th style="width:15%">Phone</th>
                                <th style="width:20%">Description</th>
                                <th style="width:15%">City</th>
                                <th style="width:15%">Experience</th>
                                <th style="width:15%">Occasions</th>
                                <th style="width:15%">Achievements</th>
                                <th style="width:15%">Skills</th>
                                <th style="width:15%">Password</th>
                                <th style="width:15%">Address</th>
                                <th style="width:15%">Image</th>
                                <th style="width:15%">Gender</th>
                                <th style="width:15%">Status</th>
                                <th style="width:15%">Email</th>
                                <th style="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tablediv">
                          
                        </tbody>
                    </table>
                </div>
                <!-- / Table responsive -->
            </div>
            <!-- / Box -->
        </div>
        <!-- / Padding -->
    </div>
    <!-- / Main content body -->
</div>
<!-- / Main content -->

<?php
// Include footer
include $_SERVER['DOCUMENT_ROOT'] . "/flatkit/include/footer.php";
?>
<script>
 function loaddata() {
    $.ajax({
        url: "ajax/show_volunteer.php",
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
            url: "ajax/delete_volunteer.php",
            method: "POST",
            data: { id: id },
            success: function(data) {
                if (data == 1) {
                  alert("Volunteer has been deleted");
                    loaddata();
                } else {
                    alert("Error deleting the volunteer");
                }
            }
        });
      });
        // Handle update button click
       
  


</script>