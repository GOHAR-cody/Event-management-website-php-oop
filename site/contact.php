
<?php
include('./include/header.php');
include('./include/navbar.php');
?>
        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Contact Us</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Applications</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Contact Us</h5>
                    <h1 class="mb-0">Contact For Any Query</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4">
                        <div class="bg-white rounded p-4">
                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                                <h4 class="text-primary"><Address></Address></h4>
                                <p class="mb-0">123 ranking Street, <br> New York, USA</p>
                            </div>
                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Mobile</h4>
                                <p class="mb-0">+012 345 67890</p>
                                <p class="mb-0">+012 345 67890</p>
                            </div>
                           
                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Email</h4>
                                <p class="mb-0">info@example.com</p>
                                <p class="mb-0">info@example.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3 class="mb-2">Send us a message</h3>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                        <form method="POST" id="fields">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" name="name" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" name="mail" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control border-0" name="phone" id="subject" placeholder="#### #### ###">
                                        <label for="subject">Contact</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" name="msg" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3"name="submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Contact End -->

  <?php
include('./include/footer.php');
  ?>
   <script>
    $(document).ready(function() {
        $("#fields").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(fields);
            console.log(mydata);
            $.ajax({
                url: "./ajax/upload_contact.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == 2) {

                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Fill all the fields",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    } 
                     else if (data == 1) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Message sent successfully",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                        $("#fields").trigger("reset");
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Error!! Try again",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    }

                }
            });
        });
    });
        </script>