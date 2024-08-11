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
                                <h2>Add User</h2>
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
                                <div class="select_option form-group" style="padding-bottom:2em">
                               
                               <label>Role</label>
                               <select class="form-select city form-control" name="role" id="city" required>
                                   <option value="" selected>Select Role</option>
                                   <?php
                                $city_query = "SELECT * FROM roles ";
                                $city_result=$city_result = mysqli_query($conn, $city_query);
                                while ($city = mysqli_fetch_assoc($city_result)) {
                                 echo "<option value='{$city['role_id']}'>{$city['role_name']}</option>";
                             }
                             ?>
                               </select>
                           </div>
                              
                            </div>
                          
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
    $("#fields").on("submit", function(e) {
    e.preventDefault();
    var mydata = new FormData(this);
    console.log(mydata);
    $.ajax({
            url: "ajax/upload_user.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if(data == 0) {
                   
                    alert("Error uploading data");
                }
               
                else{
                    alert("data inserted successfully");
                }
            
                
            }
        });
    });
});
    </script>