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
                    <h2> DataTable</h2>
                </div>
                <!-- / Box header -->

                <!-- Table responsive -->
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b">
                        <thead>
                            <tr>
                                <th style="width:5%">Id</th>
                                <th style="width:20%">Name</th>
                                <th style="width:15%">email</th>
                                <th style="width:15%">Date</th>
                                <th style="width:20%">Category</th>
                                <th style="width:15%">Phone</th>
                                <th style="width:15%">Description</th>
                                <th style="width:15%">City</th>
                                <th style="width:15%">Occasion</th>
                                <th style="width:15%">Time</th>
                                <th style="width:15%">Seats</th>
                                <th style="width:15%">Venue</th>
                                <th style="width:15%">Status</th>
                                <th style="width:20%">Action</th>
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
        url: "ajax/show_booking.php",
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
            url: "ajax/delete_booking.php",
            method: "POST",
            data: { id: id },
            success: function(data) {
                if (data == 1) {
                  alert("Booking has been deleted");
                    loaddata();
                } else {
                    alert("Error deleting the booking");
                }
            }
        });
      });
        // Handle update button click
       
  


</script>