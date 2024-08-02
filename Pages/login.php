<?php  
 include $_SERVER['DOCUMENT_ROOT'] . "/flatkit/include/header.php";

 ?> 
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Sign in with your Account
      </div>
      <form  method="POST" id="fields">
        <div class="md-form-group float-label">
          <input type="email" class="md-input" name="mail"  required>
          <label>Email</label>
        </div>
        <div class="md-form-group float-label">
          <input type="password" class="md-input" name="password"  required>
          <label>Password</label>
        </div>      
        
        <button type="submit" name="submit" class="btn primary btn-block p-x-md">Sign in</button>
      </form>
    </div>

   
  </div>

<!-- ############ LAYOUT END-->

  </div>
  <?php  
 include $_SERVER['DOCUMENT_ROOT'] . "/flatkit/include/footer.php";

 ?> 
<script> 
$(document).ready(function(){
  $("#fields").on("submit", function(e) {
    e.preventDefault();
    var mydata = new FormData(fields);
    console.log(mydata);
    $.ajax({
            url: "ajax/login_ajax.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if (data == 1) {
                    alert("Logged In successfully");
                }
                if (data == 2) {
                    alert("Please fill all the fields");
                } if(data == 0){
                   alert("Invalid Credentials");
                }
                
            }
        });
    });
});




</script>