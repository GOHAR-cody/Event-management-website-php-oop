<?php  
 include '../include/header.php';
 ?> 
  <style>
        body {
            font-family: Arial, sans-serif;
            
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .container {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        h1 {
            font-size: 3em;
            margin: 0;
            background: White;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 5s infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
        p {
            font-size: 1.2em;
            margin-top: 10px;
        }
    </style>
  <div class="app" id="app">
<!-- ############ LAYOUT START-->
<?php
 include('../include/navbar.php'); 
 include('../include/sidebar.php'); 
 $role=$_SESSION['role'];
 $sql="SELECT * FROM `roles` WHERE `role_id`='$role'";
 $res=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($res);
?>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
   
    <div ui-view class="app-body" id="view">

    <div class="container">
        <h1>Welcome, Dear <span id="username"><?php echo $row['role_name'] ?></span>!</h1>
        <p>We're glad to have you here. Explore the dashboard and make the most of it!</p>
    </div>

    </div>
  </div>
  <!-- / -->

  </div>

<!-- ############ LAYOUT END-->

<?php  
 include $_SERVER['DOCUMENT_ROOT'] . "/flatkit/include/footer.php";

 ?> 