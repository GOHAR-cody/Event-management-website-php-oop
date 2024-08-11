<?php
$id = $_GET['upid'];
include('db.php'); 
$que = "SELECT * FROM `designer` WHERE `designer_id`='$id'";
$res = mysqli_query($conn, $que);
$designer = mysqli_fetch_assoc($res);
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
                                <h2>Designer</h2>
                            </div>
                            <div class="box-body">
                                <p class="text-muted">Please fill the information to continue</p>
                                <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="e.g. john" required value="<?php echo $designer['designer_name']; ?>">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="mail" class="form-control" placeholder="example@gmail.com" required value="<?php echo $designer['designer_mail']; ?>">
</div>
<div class="form-group">
    <label>Date of Birth</label>
    <input type="date" name="dob" class="form-control" required value="<?php echo $designer['designer_dob']; ?>">
</div>
<div class="form-group" >
    <label>Gender</label>
    <div style="display: flex; margin-left: 2em;">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" <?php echo ($designer['designer_gender'] == 'male') ? 'checked' : ''; ?>>
            <label class="form-check-label" style="margin-left: -1em;" for="exampleRadios1">Male</label>
        </div>
        <div class="form-check" style="margin-left: 2.5em;">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female" <?php echo ($designer['designer_gender'] == 'female') ? 'checked' : ''; ?>>
            <label class="form-check-label" style="margin-left: -1em;" for="exampleRadios2">Female</label>
        </div>
        <div class="form-check" style="margin-left: 2.5em;">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="other" <?php echo ($designer['designer_gender'] == 'other') ? 'checked' : ''; ?>>
            <label class="form-check-label" style="margin-left: -1em;" for="exampleRadios3">Other</label>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="number" name="phone" class="form-control" placeholder="xxxx xxxx xxxx" required value="<?php echo $designer['designer_phone']; ?>">
</div>
<div class="select_option form-group">
    <label>City</label>
    <select class="form-select city form-control" name="city" id="city" required>
        <option value="" selected>Select City</option>
        <?php
            $city_query = "SELECT * FROM cities";
            $city_result = mysqli_query($conn, $city_query);
            while ($city = mysqli_fetch_assoc($city_result)) {
                $selected = ($designer['designer_city'] == $city['city_name']) ? 'selected' : '';
                echo "<option value='{$city['city_name']}' {$selected}>{$city['city_name']}</option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label>Experience</label><br>
    <select name="experience" class="form-select input_text form-control" required>
        <option value="null">Select experience</option>
        <option value="First" <?php echo ($designer['designer_experience'] == 'First') ? 'selected' : ''; ?>>First</option>
        <option value="Second" <?php echo ($designer['designer_experience'] == 'Second') ? 'selected' : ''; ?>>Second</option>
        <option value="Third" <?php echo ($designer['designer_experience'] == 'Third') ? 'selected' : ''; ?>>Third</option>
    </select>
</div>
<div class="form-group">
    <label>Ordered Design Of</label><br>
    <select name="ordered" class="form-select input_text form-control" required>
        <option value="null">Select design</option>
        <?php
            $cat_query = "SELECT * FROM categories";
            $cat_result = mysqli_query($conn, $cat_query);
            while ($cat = mysqli_fetch_assoc($cat_result)) {
                $selected = ($designer['designer_ordered'] == $cat['cat_name']) ? 'selected' : '';
                echo "<option value='{$cat['cat_name']}' {$selected}>{$cat['cat_name']}</option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="desc" rows="6" data-minwords="6" required placeholder="Add description here"><?php echo $designer['designer_desc']; ?></textarea>
</div>
<div class="form-group">
    <label>Company</label>
    <input type="text" name="company" class="form-control" required value="<?php echo $designer['designer_company']; ?>">
</div>
<div class="form-group">
    <label>Prefer Color</label>
    <input style="height:50px" type="color" name="color" class="form-control" required value="<?php echo $designer['designer_color']; ?>">
</div>
<div class="form-group">
    <label for="achievements">Tools Worked On</label>
    <div class="tags-input-container" id="achievements-tags-input-container">
        <input type="text" class="form-control" value="<?php echo $designer['designer_tools']; ?>" id="achievements-tags-input" placeholder="Type a tag and press Enter ">
    </div>
    <input type="hidden" name="tools" id="achievements-hidden-tags" value="<?php echo $designer['designer_tools']; ?>">
</div>
<div class="form-group">
    <label>Written content to be added</label>
    <input type="text" name="content" class="form-control" required value="<?php echo $designer['designer_content']; ?>">
</div>
<div class="form-group">
    <label>Number of Designs</label>
    <input type="number" name="number" class="form-control" required value="<?php echo $designer['designer_number']; ?>">
</div>
<div class="row m-b">
    <div class="col-sm-6">
        <label>Enter password</label>
        <input type="password" name="pwd" class="form-control" required id="pwd" value="<?php echo $designer['designer_pwd']; ?>">
    </div>
    <div class="col-sm-6">
        <label>Confirm password</label>
        <input type="password" class="form-control" name="pwd2" data-parsley-equalto="#pwd" value="<?php echo $designer['designer_pwd']; ?>" required>
    </div>
</div>
<div class="form-group">
    <label>Address</label>
    <textarea class="form-control" name="address2" rows="6" data-minwords="6" required placeholder="Add address here"><?php echo $designer['designer_address2']; ?></textarea>
</div>
<div class="form-group">
    <label>Picture</label>
    <input type="file" class="form-control" name="img">
</div>
<div class="form-group" style="margin-left: 1.5em;padding-bottom: 2em;">
    <label>Status</label>
    <div style="display: flex; margin-left: 2em;">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="pending" <?php echo ($designer['designer_exampleRadios'] == 'pending') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="exampleRadios1">Pending</label>
        </div>
        <div class="form-check" style="margin-left: 4em;">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="confirm" <?php echo ($designer['designer_exampleRadios'] == 'confirm') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="exampleRadios2">Confirm</label>
        </div>
    </div>
    <input type="text" style="display:none" value="<?php echo $designer['designer_id']; ?>" name="id">
</div>

                       
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
   
});

</script>
<script> 
 $(document).ready(function() {
   
   $("#fields").on("submit", function(e) {
       e.preventDefault();    
       var mydata = new FormData(fields);
       console.log(mydata);
       $.ajax({
           url: "ajax/edit_designer.php",
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
             
           }
           
       });
   });
});



</script>