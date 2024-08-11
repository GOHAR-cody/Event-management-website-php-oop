<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Dashboard</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="../assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
  
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
   
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
      <br>
      <a style="margin-left:6em; color:#0cc2aa" href="../site/index.php"> Back to site </a>
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
                    setTimeout(() => {
                      window.location.replace("./dashboard.php");
                    }, 1000);                   
                }
                if (data == 2) {
                    alert("Please fill all the fields");
                } if(data == 0){
                   alert("Invalid Credentials");
                }
                if(data == 3){
                   alert("Email not eligible");
                }
               
            }
        });
    });
});


</script>