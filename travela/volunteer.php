
<?php include('./include/header.php'); ?>
    <style>
    .tags-input-container{
    display:flex;
    flex-wrap:wrap;
 
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
    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <?php include('./include/navbar.php'); ?>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Volunteer</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Applications</a></li>
                    <li class="breadcrumb-item active text-white">Volunteer</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Tour Booking Start -->
        <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Add Volunteer</h1>
                        
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-white border-0" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" class="form-control bg-white border-0" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Date of Birth</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="number" class="form-control bg-white border-0" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Phone</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <select class="form-select bg-white border-0"  name="city" id="city" required>
                                        <option value="" selected>Select City</option>
                                        <?php
                                        include 'db.php';
                                     $city_query = "SELECT * FROM cities ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {
                                      echo "<option value='{$city['city_name']}'>{$city['city_name']}</option>";
                                  }
                                  ?>
                                    </select>
                                    <label>City</label>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-white border-0" id="select1">
                                        <option value="null">Select experience</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                        <option value="Third">Third</option>
                                        </select>
                                        <label for="select1">Experience</label>
                                    </div>
                                </div>
                              
                             
                               
                               
                               
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-white border-0" id="datetime" placeholder="Select City" data-target="#date3"  />
                                        <label for="datetime">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-white border-0" id="datetime" placeholder="Select City" data-target="#date3"  />
                                        <label for="datetime">Confirm Password</label>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-floating ">
                                        <textarea  class="form-control bg-white border-0" style="height:80px" id="datetime" placeholder="Address" data-target="#date3" ></textarea>
                                        <label for="datetime">Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating ">
                                    <input type="file" class="form-control bg-white border-0" name="img" required>
</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                <label style="color:white" >Gender</label>
                                <div style="display: flex; margin-left: 0.5em; margin-top:1em" >
                                    <div class="form-check ">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios1" value="male" checked>
                                        <label class="form-check-label  "  style="color:white" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 0.5em;">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios2" value="female">
                                        <label class="form-check-label   "  style="color:white" for="exampleRadios2">
                                            Female</label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 0.5em;">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios3" value="other">
                                        <label class="form-check-label  " style="color:white" for="exampleRadios3">
                                            Other</label>
                                    </div>
                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                   
                                    <div class="tags-input-container" id="achievements-tags-input-container">
                                        <input type="text" class="form-control" id="achievements-tags-input"
                                            placeholder="Type a tag and press Enter " style="height:60px">
                                            <label style="color:white" for="achievements">Achievements</label>
                                    </div>   
                                    <input type="hidden" name="achievements"  id="achievements-hidden-tags">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                   
                                    <div class="tags-input-container" id="achievements-tags-input-container">
                                        <input type="text" class="form-control" id="achievements-tags-input"
                                            placeholder="Type a tag and press Enter " style="height:60px">
                                            <label style="color:white" for="achievements">Type of Occasions(you want to volunteer)</label>
                                    </div>   
                                    <input type="hidden" name="achievements"  id="achievements-hidden-tags">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                  
                                    <div class="tags-input-container" id="partners-tags-input-container">
                                        <input type="text" class="form-control" id="partners-tags-input"
                                            placeholder="Type a tag and press Enter "  style="height:60px">
                                            <label style="color:white" for="partners">Partners</label>
                                    </div>
                                    <input type="hidden" name="partners" id="partners-hidden-tags">
                                    </div> 
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea  class="form-control bg-white border-0" style="height:80px" id="datetime" placeholder="Description" data-target="#date3" ></textarea>
                                        <label for="datetime">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4" style="margin-left:17em">
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tour Booking End -->
<?php  include('./include/footer.php')?>