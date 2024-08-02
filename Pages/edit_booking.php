<?php
include('db.php'); 
$id= $_GET['id'];
$sql="SELECT * FROM `booking` WHERE `book_id`='$id'";
$res = mysqli_query($conn, $sql);
$booking= mysqli_fetch_assoc($res);

include('../include/header.php'); ?>
<style>   
.tags-input-container{
    display:flex;
    flex-wrap:wrap;
    border:1px solid #ccc;
    padding:5px;
 
    cursor:text;

}
.tags-input-container input{
    border:none;
    outline:none;
    padding:5px;
    flex-grow:1;
}
.tag{
    display:inline-block;
    background-color:#e1e1e1;
    padding:5px;
    margin:2px;
    border-radius:3px;
    font-size:14px;
}
.tag .remove-tag{
    margin-left:5px;
    cursor:pointer;
}

</style>

</head>
<body>
<?php
include('../include/sidebar.php'); 

?>

<div class="app" id="app">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->

            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

            <!-- navbar collapse -->
            <div class="collapse navbar-collapse" id="collapse">
                <!-- link and dropdown -->
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href data-toggle="dropdown">
                            <i class="fa fa-fw fa-plus text-muted"></i>
                            <span>New</span>
                        </a>
                        <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                    </li>
                </ul>

                <div ui-include="'../views/blocks/navbar.form.html'"></div>
                <!-- / -->
            </div>
            <!-- / navbar collapse -->

            <!-- navbar right -->
            <ul class="nav navbar-nav ml-auto flex-row">
                <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link mr-2" href data-toggle="dropdown">
                        <i class="material-icons">&#xe7f5;</i>
                        <span class="label label-sm up warn">3</span>
                    </a>
                    <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                        <span class="avatar w-32">
                            <img src="../assets/images/a0.jpg" alt="...">
                            <i class="on b-white bottom"></i>
                        </span>
                    </a>
                    <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                </li>
                <li class="nav-item hidden-md-up">
                    <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                        <i class="material-icons">&#xe5d4;</i>
                    </a>
                </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>

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
    <div ui-view class="app-body" id="view">

        <div class="padding">
            <div class="row " style="margin-left:40em">
                <div class="col-sm-6">

                    <form method="POST" id="fields">
                        <div class="box">
                            <div class="box-header">
                                <h2>Booking</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Event Category</label><br>
                                    <select name="cat" class="form-select input_text form-control" required>
                                    >
                                        <?php
                                     $city_query = "SELECT * FROM categories ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {
                                        $selected = ($booking['book_cat'] == $city['cat_name']) ? 'selected' : '';
                                        echo "<option value='{$city['cat_name']}' {$selected}>{$city['cat_name']}</option>";
                                          }     ?>
                                
                                   
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" value="<?php echo $booking['book_name']; ?>" name="name" class="form-control" placeholder="e.g. john"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Enter Email Address</label>
                                    <input type="email" value="<?php echo $booking['book_mail']; ?>" name="mail" class="form-control" placeholder="example@gmail.com"
                                        required>
                                </div>
                              
                                
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $booking['book_phone']; ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Title</label>
                                    <input type="text" name="occ" class="form-control" 
                                    value="<?php echo $booking['book_occ']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Start Date</label>
                                    <input type="date" value="<?php echo $booking['book_date']; ?>" name="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Start Time</label>
                                    <input type="time" name="time" class="form-control" value="<?php echo $booking['book_time']; ?>" required>
                                </div>
                                <div class="select_option form-group">
                                    <label>City</label>
                                    <select class="form-select city form-control" name="city" id="city" required>
                                        <option value="" selected>Select City</option>
                                        <?php
                                     $city_query = "SELECT * FROM cities ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {
                                        $selected = ($booking['book_city'] == $city['city_name']) ? 'selected' : '';
                                        echo "<option value='{$city['city_name']}' {$selected}>{$city['city_name']}</option>";
                                  }
                                  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No of Seats</label>
                                    <input type="number" name="seats" value="<?php echo $booking['book_seats']; ?>" class="form-control" 
                                        required>
                                </div>
                              
                                <div class="form-group">
                                    <label>Select Venue</label><br>
                                    <select name="ven" class="form-select input_text form-control" required>
                                       
                                        <?php
                                     $ven_query = "SELECT * FROM venue ";
                                     $ven_result= mysqli_query($conn, $ven_query);
                                     while ($ven = mysqli_fetch_assoc($ven_result)) {
                                        $selected = ($booking['book_ven'] == $ven['venue_name']) ? 'selected' : '';
                                        echo "<option value='{$ven['venue_name']}' {$selected}>{$ven['venue_name']}</option>";
                                     };
                                   ?>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Occasion Description</label>
                                    <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                        placeholder="Add description here"><?php echo $booking['book_desc']; ?></textarea>
                                </div>
                               
                              
                                <div class="form-group" style=" padding-bottom: 3em;">
                                <label>Status</label>
                                <div style="display: flex; margin-left: 2em;">
                                    <div class="form-check ">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="public" <?php echo ($booking['book_status'] == 'public') ? 'checked' : ''; ?> checked>
                                        <label class="form-check-label  " for="exampleRadios1">
                                            Public
                                        </label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 4em;">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="private" <?php echo ($booking['book_status'] == 'private') ? 'checked' : ''; ?>>
                                        <label class="form-check-label  " for="exampleRadios2">
                                            Private</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input style="display:none" type="text" name="id" value="<?php echo $booking['book_id'] ?>">
                        <div class="dker p-a text-right">
                            <button type="submit" name="submit" class="btn info">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
           url: "ajax/edit_booking.php",
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