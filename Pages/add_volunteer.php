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
                                <h2>Volunteer</h2>
                            </div>
                            <div class="box-body">
                                <p class="text-muted">Please fill the information to continue</p>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="e.g. john"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="mail" class="form-control" placeholder="example@gmail.com"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" required>
                                </div>
                                <div class="form-group" >
                                <label>Gender</label>
                                <div style="display: flex; margin-left: 2em;">
                                    <div class="form-check ">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios1" value="male" checked>
                                        <label class="form-check-label  "  style=" margin-left: -1em;" for="exampleRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 2.5em;">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios2" value="female">
                                        <label class="form-check-label   " style=" margin-left: -1em;" for="exampleRadios2">
                                            Female</label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 2.5em;">
                                        <input class="form-check-input  " type="radio" name="gender"
                                            id="exampleRadios3" value="other">
                                        <label class="form-check-label  " style=" margin-left: -1em;" for="exampleRadios3">
                                            Other</label>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" placeholder="xxxx xxxx xxxx"
                                        required>
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
                                    <label>Experience</label><br>
                                    <select name="experience" class="form-select input_text form-control" required>
                                        <option value="null">Select experience</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                        <option value="Third">Third</option>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                        placeholder="Add description here"></textarea>
                                </div>
                               
                              
                                <div class="form-group">
                                    <label for="achievements">Type of Occasions(you want to volunteer)</label>
                                    <div class="tags-input-container" id="occasions-tags-input-container">
                                        <input type="text" class="form-control" id="occasions-tags-input"
                                            placeholder="Type a tag and press Enter ">
                                    </div>
                                    <input type="hidden" name="occasions"  id="occasions-hidden-tags">
                                </div>
                               
                                <div class="form-group">
                                    <label for="achievements">Achievements</label>
                                    <div class="tags-input-container" id="achievements-tags-input-container">
                                        <input type="text" class="form-control" id="achievements-tags-input"
                                            placeholder="Type a tag and press Enter ">
                                    </div>
                                    <input type="hidden" name="achievements"  id="achievements-hidden-tags">
                                </div>
                                <div class="form-group">
                                    <label for="skills">Personal Skills</label>
                                    <div class="tags-input-container" id="skills-tags-input-container">
                                        <input type="text" class="form-control" id="skills-tags-input"
                                            placeholder="Type a tag and press Enter ">
                                    </div>
                                    <input type="hidden" name="skills" id="skills-hidden-tags">
                                </div>
                               
                               

                                <div class="row m-b">
                                    <div class="col-sm-6">
                                        <label>Enter password</label>
                                        <input type="password" name="pwd" class="form-control" required id="pwd">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="pwd2"
                                            data-parsley-equalto="#pwd" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address2" rows="6" data-minwords="6" required
                                        placeholder="Add address here"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" class="form-control" name="img" required>
                                </div>
                            </div>
                            <div class="form-group" style=" margin-left: 1.5em;padding-bottom: 3em;">
                                <label>Status</label>
                                <div style="display: flex; margin-left: 4em;">
                                    <div class="form-check ">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="pending" >
                                        <label class="form-check-label  " for="exampleRadios1">
                                            Pending
                                        </label>
                                    </div>
                                    <div class="form-check" style=" margin-left: 4em;">
                                        <input class="form-check-input  " type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="confirm" checked>
                                        <label class="form-check-label  " for="exampleRadios2">
                                            Confirm</label>
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
    $(document).ready(function() {
    $("#fields").on("submit", function(e) {
    e.preventDefault();
    var mydata = new FormData(this);
    console.log(mydata);
    $.ajax({
            url: "ajax/upload_volunteer.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if(data == 0) {
                   
                    alert("Error uploading data");
                }
                if(data == 2){
                    alert("Passwords donot match");
                }
                if(data == 3){
                    alert("Email already exists");
                }
                else{
                    alert("data inserted successfully");
                }
            
            }
        });
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
    handleTagsInput('achievements-tags-input', 'achievements-tags-input-container', 'achievements-hidden-tags');
    handleTagsInput('skills-tags-input', 'skills-tags-input-container', 'skills-hidden-tags');
    handleTagsInput('occasions-tags-input', 'occasions-tags-input-container', 'occasions-hidden-tags');
   
});

</script>