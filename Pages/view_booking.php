<?php
// Include necessary files for header and footer
include('../include/header.php');
include('../include/sidebar.php');
?>

<!-- Main content -->
<div id="content" class="app-content box-shadow-z0" role="main">
    <!-- App header -->
    <div class="app-header white box-shadow">
        <!-- Navbar -->
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Page title -->
            <div class="mb-0 h5 no-wrap"><i class="fa fa-fw fa-plus text-muted"></i>
            <span>Booking Data</span></div>
            <!-- / Page title -->

            <!-- Navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
                <!-- User profile dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                        <span class="avatar w-32">
                            <img src="../assets/images/a0.jpg" alt="...">
                            <i class="on b-white bottom"></i>
                        </span>
                    </a>
                    <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                </li>
            </ul>
            <!-- / Navbar right -->
        </div>
        <!-- / Navbar -->
    </div>
    <!-- / App header -->

    <!-- App footer -->
    <div class="app-footer">
        <div class="p-2 text-xs">
            <div class="pull-right text-muted py-1">
                &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
                <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
            </div>
            <div class="nav">
                <a class="nav-link" href="../">About</a>
                <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
            </div>
        </div>
    </div>
    <!-- / App footer -->

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
                        <tbody>
                            <?php
                            // Include database connection
                            include('db.php');
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM booking";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['book_mail']; ?></td>
                                    <td><?php echo $row['book_date']; ?></td>
                                    <td><?php echo $row['book_cat']; ?></td>
                                    <td><?php echo $row['book_phone']; ?></td>
                                    <td><?php echo $row['book_desc']; ?></td>
                                    <td><?php echo $row['book_city']; ?></td>
                                    <td><?php echo $row['book_occ']; ?></td>
                                    <td><?php echo $row['book_time']; ?></td>
                                    <td><?php echo $row['book_seats']; ?></td>
                                    <td><?php echo $row['book_ven']; ?></td>
                                    <td><?php echo $row['book_status']; ?></td>
                                    <td style="display:flex">
                                        <a class="btn btn-danger" href="delete_booking.php?id=<?php echo $row['book_id']; ?>">Delete</a>
                                        <a class="btn btn-success" href="edit_booking.php?id=<?php echo $row['book_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>
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
