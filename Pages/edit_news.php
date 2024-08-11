<?php
include('db.php'); 

$id = $_GET['id'];
$sql = "SELECT * FROM `news` WHERE `news_id`='$id'";
$res = mysqli_query($conn, $sql);
$news = mysqli_fetch_assoc($res);



include('../include/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your styles and scripts -->
</head>
<body>
    <?php include('../include/sidebar.php'); ?>
    <div class="app" id="app">
    <?php  include('../include/navbar.php') ?>
        <div ui-view class="app-body" id="view">
            <div class="padding">
                <div class="row " style="margin-left:40em">
                    <div class="col-sm-6">

                        <form method="POST" id="fields">
                            <div class="box">
                                <div class="box-header">
                                    <h2>News</h2>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>News Category</label><br>
                                        <select name="cat" class="form-select input_text form-control" required>
                                        
                                            <?php
                                            $city_query = "SELECT * FROM categories";
                                            $city_result = mysqli_query($conn, $city_query);
                                            while ($city = mysqli_fetch_assoc($city_result)) { ?>
                                            <option value="<?php echo $city['cat_name']; ?>"
                                                <?php echo ($news['news_cat'] == $city['cat_name']) ? 'selected' : ''; ?>>
                                                <?php echo $city['cat_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>News Title</label>
                                        <input type="text" value="<?php echo $news['news_title']; ?>" name="name" class="form-control" placeholder="e.g. john" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imageFile" class="form-label">Featured Images</label>
                                        <input type="file" class="form-control" id="imageFile" name="imageFile[]" accept=".jpg,.jpeg,.png,.gif" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="desc" rows="6" data-minwords="6" required placeholder="Add description here"><?php echo $news['news_desc']; ?></textarea>
                                    </div>

                                    <div class="form-group" style="margin-left: 1em; padding-bottom: 2em;">
                                        <label>Status</label>
                                        <div style="display: flex; margin-left: 2em;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="on" <?php echo ($news['news_status'] == 'on') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="exampleRadios1">ON</label>
                                            </div>
                                            <div class="form-check" style="margin-left: 4em;">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="off" <?php echo ($news['news_status'] == 'off') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="exampleRadios2">OFF</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="text" style="display:none" value="<?php echo $news['news_id']; ?>" name="id" >
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
    <?php include('../include/footer.php'); ?>
</body>
</html>
<script> 
 $(document).ready(function() {
   
   $("#fields").on("submit", function(e) {
       e.preventDefault();    
       var mydata = new FormData(fields);
       console.log(mydata);
       $.ajax({
           url: "ajax/edit_news.php",
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