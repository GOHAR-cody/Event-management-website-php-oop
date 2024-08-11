<?php include('./include/header.php'); ?>
<style>
.tags-input-container {
    display: flex;
    flex-wrap: wrap;

    cursor: text;

}

.tags-input-container input {
    border: none;
    outline: none;
    padding: 5px;
    flex-grow: 1;
}

.tag {
    display: inline-block;
    background-color: #e1e1e1;
    padding: 5px;
    margin: 2px;
    border-radius: 3px;
    font-size: 14px;
}

.tag .remove-tag {
    margin-left: 5px;
    cursor: pointer;
}
</style>

<body>

   
    <!-- Navbar & Hero Start -->
    <?php include('./include/navbar.php'); ?>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Designer</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Applications</a></li>
                    <li class="breadcrumb-item active text-white">Designer</li>
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
                    <h1 class="text-white mb-3">Add Designer</h1>

                    <form method="POST" id="fields">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" name="name" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0" name="mail" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="date" class="form-control bg-white border-0" name="dob" id="datetime"
                                        placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                    <label for="datetime">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="number" class="form-control bg-white border-0" name="phone"
                                        id="datetime" placeholder="Date & Time" data-target="#date3"
                                        data-toggle="datetimepicker" />
                                    <label for="datetime">Phone</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" name="city" id="city" required>
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
                                    <select class="form-select bg-white border-0" name="experience" id="select1">
                                        <option value="null">Select experience</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                        <option value="Third">Third</option>
                                    </select>
                                    <label for="select1">Experience</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" name="ordered" id="city" required>

                                        <option value="null">Select design</option>
                                        <?php
                                     $city_query = "SELECT * FROM categories ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {?>
                                        <option value="<?php echo $city['cat_name']?>"><?php echo $city['cat_name']?>
                                        </option>";
                                        <?php      }
                                  ?>
                                    </select>
                                    <label>Ordered Design Of</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" name="company" class="form-control bg-white border-0" />
                                    <label for="datetime">Company</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="color" name="color" class="form-control bg-white border-0" />
                                    <label for="datetime">Prefer Color</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">

                                    <div class="tags-input-container" id="achievements-tags-input-container">
                                        <input type="text" class="form-control" id="achievements-tags-input"
                                            placeholder="Type a tag and press Enter " style="height:60px">
                                        <label style="color:white" for="achievements">Tools worked on</label>
                                    </div>
                                    <input type="hidden" name="tools" id="achievements-hidden-tags">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" name="number" class="form-control bg-white border-0" />
                                    <label for="datetime">No. of designs</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" name="content" class="form-control bg-white border-0" />
                                    <label for="datetime">Written content to be added</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" name="pwd" class="form-control bg-white border-0" id="datetime"
                                        placeholder="Select City" data-target="#date3" />
                                    <label for="datetime">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <input type="text" name="pwd2" class="form-control bg-white border-0" id="datetime"
                                        placeholder="Select City" data-target="#date3" />
                                    <label for="datetime">Confirm Password</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <textarea class="form-control bg-white border-0" name="address" style="height:80px"
                                        id="datetime" placeholder="Address" data-target="#date3"></textarea>
                                    <label for="datetime">Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control bg-white border-0" name="desc" style="height:80px"
                                        id="datetime" placeholder="Description" data-target="#date3"></textarea>
                                    <label for="datetime">Description</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="color:white">Gender</label>
                                    <div style="display: flex; margin-left: 0.5em; margin-top:1em">
                                        <div class="form-check ">
                                            <input class="form-check-input  " type="radio" name="gender"
                                                id="exampleRadios1" value="male" checked>
                                            <label class="form-check-label  " style="color:white" for="exampleRadios1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check" style=" margin-left: 0.5em;">
                                            <input class="form-check-input  " type="radio" name="gender"
                                                id="exampleRadios2" value="female">
                                            <label class="form-check-label   " style="color:white" for="exampleRadios2">
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

                            <div class="col-6">
                                <div class="form-floating ">
                                    <input type="file" class="form-control bg-white border-0" name="img" required>
                                </div>
                            </div>


                            <div class="col-6 mt-4 " style="margin-left:17em">
                                <button class="btn btn-primary text-white w-100 py-3" name="submit"
                                    type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Booking End -->
    <?php  include('./include/footer.php')?>
    <script>
    $(document).ready(function() {
        $("#fields").on("submit", function(e) {
            e.preventDefault();
            var mydata = new FormData(fields);
            console.log(mydata);
            $.ajax({
                url: "./ajax/upload_designer.php",
                method: "POST",
                data: mydata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == 0) {

                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Error inserting the data",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    } else if (data == 2) {
                        Swal.fire({
                            position: "top-end",
                            icon: "warning",
                            title: " password donot match",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    } else if (data == 3) {
                        Swal.fire({
                            position: "top-end",
                            icon: "warning",
                            title: "Use a different mail",
                            showConfirmButton: false,
                            showCloseButton: true,

                            timer: 5000
                        });
                    } else if (data == 4) {
                        Swal.fire({
                            position: "top-end",
                            icon: "warning",
                            title: "Fill all the fields",
                            showConfirmButton: false,
                            showCloseButton: true,

                            timer: 5000
                        });
                    } else if (data == 1) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "data inserted sucessfully",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Error!!",
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 5000
                        });
                    }

                }
            });
        });
        // Function to handle tags input
        function handleTagsInput(inputFieldId, containerId, hiddenInputId) {
            const tagsInput = $('#' + inputFieldId);
            const tagsInputContainer = $('#' + containerId);
            const hiddenTagsInput = $('#' + hiddenInputId);
            let tags = [];

            // Function to update hidden input value
            function updateHiddenTagsInput() {
                hiddenTagsInput.val(tags.join(','));
            }

            // Function to create tag element
            function createTagElement(tag) {
                const tagElement = $('<span class="tag">' + tag + '</span>');
                const removeTagElement = $('<span class="remove-tag">x</span>');
                removeTagElement.click(function() {
                    tags = tags.filter(t => t !== tag);
                    tagElement.remove();
                    updateHiddenTagsInput();
                });
                tagElement.append(removeTagElement);
                return tagElement;
            }

            // Event listener for input field
            tagsInput.keydown(function(event) {
                if (event.key === 'Enter' || event.key === ',') {
                    event.preventDefault();
                    const tag = tagsInput.val().trim().replace(',', '');
                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        tagsInputContainer.append(createTagElement(tag));
                        tagsInput.val('');
                        updateHiddenTagsInput();
                    }
                }
            });
        }

        // Call handleTagsInput for each input field
        handleTagsInput('achievements-tags-input', 'achievements-tags-input-container',
            'achievements-hidden-tags');



    });
    </script>