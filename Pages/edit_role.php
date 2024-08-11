
<?php
include('db.php'); 
$id = $_GET['upid'];

include('../include/header.php'); 
include('../include/sidebar.php'); 
?>
<div class="app" id="app">
<?php  include('../include/navbar.php') ?>
    <div ui-view class="app-body" id="view">
        <div class="padding">
            <div class="row " style="margin-left:40em">
                <div class="col-sm-6 ">
                    <form Method="POST" id="fields">
                        <div class="box">
                            <?php
                                $sql = "SELECT * FROM `roles` WHERE `role_id`='$id'";
                                $result = mysqli_query($conn, $sql);
                                $data = mysqli_fetch_assoc($result);
                                $role_access = $data['role_access'];
                                $stored_roles = unserialize($data['role_roles']);
                                $new = array('category','planner','designer','volunteer','venue','booking','news','event');
                            ?>
                            <div class="box-header">
                                <h2>Edit Role</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" value="<?php echo $data['role_name']; ?>" name="role" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role Access</label>
                                    <select name="access" class="form-select input_text form-control" id="opt" onchange="toggleDiv()" required>
                                        <option value="all" <?php echo ($role_access == 'all') ? 'selected' : ''; ?>>All</option>
                                        <option value="custom" <?php echo ($role_access == 'custom') ? 'selected' : ''; ?>>Custom</option>
                                    </select>
                                </div>
                                <div style="display: <?php echo ($role_access == 'custom') ? 'block' : 'none'; ?>;" id="showdiv">
                                    <div class="form-group">
                                        <div style=" margin-left: 4em;">
                                            <?php foreach($new as $value) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if(!empty($stored_roles)){
                                                        echo (in_array($value, $stored_roles)) ? 'checked' : '';}
                                                        else{
                                                            echo 'checked';}?>>
                                                        
                                                    <label class="form-check-label" for="exampleRadios<?php echo $value; ?>"><?php echo ucfirst($value); ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <input style="display:none" type="text" name="id" value="<?php echo $data['role_id'] ?>">
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
function toggleDiv() {
    let val1 = document.getElementById("opt").value;
    let divShow = document.getElementById("showdiv");

    if (val1 === "custom") {
        divShow.style.display = "block";
    } else {
        divShow.style.display = "none";
    }
}

// Initial check for setting div display
document.addEventListener('DOMContentLoaded', function() {
    toggleDiv();
});

 $(document).ready(function() {
   
   $("#fields").on("submit", function(e) {
       e.preventDefault();    
       var mydata = new FormData(fields);
       console.log(mydata);
       $.ajax({
           url: "ajax/edit_role.php",
           method: "POST",
           data: mydata,
           processData: false, 
       contentType: false,
           success: function(data) {
               if (data == 1) {
                   alert("Record updated successfully");     
                   $("#fields").trigger("reset");   
               } else {
                   alert("Error updating the record");
               }
               
           }
           
       });
   });
});



</script>