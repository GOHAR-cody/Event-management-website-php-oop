<?php
// Include necessary files for header and footer
include('../include/header.php');
include('../include/sidebar.php');
?>
 <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-container img {
            width: 40px;
            height: 40px;
            border-radius:50%
        }
    </style>
<!-- Main content -->
<div id="content" class="app-content box-shadow-z0" role="main">
    <!-- App header -->
    <div class="app-header white box-shadow">
        <!-- Navbar -->
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Page title -->
            <div class="mb-0 h5 no-wrap">
            <i class="fa fa-fw fa-plus text-muted"></i>
            <span>News data</span>
            </div>
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
                    <h2>DataTable</h2>
                </div>
                <!-- / Box header -->

                <!-- Table responsive -->
                <div class="table-responsive">
                    <table ui-jp="dataTable" class="table table-striped b-t b-b">
                        <thead>
                            <tr>
                                <th style="width:5%">Id</th>
                                <th style="width:20%">News Title</th>
                                <th style="width:15%">Category</th>
                                <th style="width:40%">Featured Images</th>
                                <th style="width:20%">Description</th>
                                <th style="width:20%">Status</th>
                                <th style="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Include database connection
                            include('db.php');
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM news";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i = 1;
                                    $images = $row['news_pics'];
                                    $new_arr = unserialize($images);
                                    ?>
                                
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['news_title']; ?></td>
                                    <td><?php echo $row['news_cat']; ?></td>
                                    <td>  <div class="image-container">
                                    <?php foreach ($new_arr as $arr) { ?>
                                        <img src="../uploads/<?php echo $arr ?>" alt="<?php echo $arr ?>">
                                    <?php } ?>
                                </div></td>
                                    <td><?php echo substr($row['news_desc'], 0, 100) . '...'; ?></td>
                                   
                                    <td><?php echo $row['news_status']; ?></td>
                                    <td style="display:flex">
                                        <a class="btn btn-danger" href="delete_news.php?id=<?php echo $row['news_id']; ?>">Delete</a>
                                        <a class="btn btn-success" href="edit_news.php?id=<?php echo $row['news_id']; ?>">Update</a>
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
