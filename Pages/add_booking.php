<?php
include('db.php');
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
   
   <?php  include('../include/navbar.php') ?>
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
                                        <option value="null">Select design</option>
                                        <?php
                                     $city_query = "SELECT * FROM categories ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {?>
                                   <option value="<?php echo $city['cat_name']?>"><?php echo $city['cat_name']?></option>";
                                   <?php      }
                                  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. john"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Enter Email Address</label>
                                    <input type="email" name="mail" class="form-control" placeholder="example@gmail.com"
                                        required>
                                </div>
                              
                                
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" name="phone" class="form-control" 
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Title</label>
                                    <input type="text" name="occ" class="form-control" 
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Start Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Occasion Start Time</label>
                                    <input type="time" name="time" class="form-control" required>
                                </div>
                                <div class="select_option form-group">
                                    <label>City</label>
                                    <select class="form-select city form-control" name="city" id="city" required>
                                        <option value="" selected>Select City</option>
                                        <?php
                                     $city_query = "SELECT * FROM cities ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {
                                      echo "<option value='{$city['city_name']}'>{$city['city_name']}</option>";
                                  }
                                  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No of Seats</label>
                                    <input type="number" name="seats" class="form-control" 
                                        required>
                                </div>
                              
                                <div class="form-group">
                                    <label>Select Venue</label><br>
                                    <select name="ven" class="form-select input_text form-control" required>
                                        <option value="null">Select Venue Host</option>
                                        <?php
                                     $ven_query = "SELECT * FROM venue ";
                                     $ven_result= mysqli_query($conn, $ven_query);
                                     while ($ven = mysqli_fetch_assoc($ven_result)) {?>
                                   <option value="<?php echo $ven['venue_name']?>"><?php echo $ven['venue_name']?></option>";
                                   <?php      }
                                  ?>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Occasion Description</label>
                                    <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                        placeholder="Add description here"></textarea>
                                </div>
                               
                              
                            <div class="form-group" style=" margin-left: em;padding-bottom: 2em;">
                                <label>Occasion Type</label>
                                <div style="display: flex; margin-left: 2em;">
                                    <div class="form-check ">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="public" checked>
                                        <label class="form-check-label  " for="exampleRadios1">
                                            Public
                                        </label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 4em;">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="private">
                                        <label class="form-check-label  " for="exampleRadios2">
                                            Private</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
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
    var mydata = new FormData(this);
    $.ajax({
            url: "ajax/upload_booking.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if (data == 1) {
                    alert("data inserted successfully");
                } else {
                   alert("Error uploading data");
                }
                
            }
        });
    });

  });

    </script>