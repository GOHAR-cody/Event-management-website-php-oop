<?php
include('db.php'); 
$id = $_GET['id'];
$sql = "SELECT * FROM `events` WHERE `event_id`='$id'";
$res = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($res);


include('../include/header.php'); ?>
<style>
.tags-input-container {
    display: flex;
    flex-wrap: wrap;
    border: 1px solid #ccc;
    padding: 5px;

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
                                    <h2>Add Event</h2>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Event Category</label><br>
                                        <select name="cat" class="form-select input_text form-control" required>
                                           
                                            <?php
                                            $city_query = "SELECT * FROM categories";
                                            $city_result = mysqli_query($conn, $city_query);
                                            while ($city = mysqli_fetch_assoc($city_result)) { ?>
                                            <option value="<?php echo $city['cat_name']; ?>"
                                                <?php echo ($event['event_cat'] == $city['cat_name']) ? 'selected' : ''; ?>>
                                                <?php echo $city['cat_name']; ?></option>
                                            <?php } ?>
                                  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Event Title</label>
                                        <input type="text" value="<?php echo $event['event_title']; ?>" name="name" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imageFile" class="form-label">
                                            Featured Images
                                        </label>
                                        <input type="file" class="form-control" id="imageFile"
                                            name="imageFile[]" accept=".jpg,.jpeg,.png,.gif" multiple >
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" value="<?php echo $event['event_date']; ?>" name="date" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label> Description</label>
                                        <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                            placeholder="Add description here"><?php echo $event['event_desc']; ?></textarea>
                                    </div>


                                    <input type="text" style="display:none" value="<?php echo $event['event_id']; ?>" name="id" >
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
       var mydata = new FormData(fields);
       console.log(mydata);
       $.ajax({
           url: "ajax/edit_event.php",
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