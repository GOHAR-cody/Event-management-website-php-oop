<?php
include('db.php'); 
$id = $_GET['id'];
$sql = "SELECT * FROM `messages` WHERE `msg_id`='$id'";
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
        <div class="app-header white box-shadow">
            <div class="navbar navbar-toggleable-sm flex-row align-items-center">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                    <i class="material-icons">&#xe5d2;</i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar collapse -->
                <div class="collapse navbar-collapse" id="collapse">
                    <!-- link and dropdown -->
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href data-toggle="dropdown">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>New</span>
                            </a>
                            <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                        </li>
                    </ul>

                    <div ui-include="'../views/blocks/navbar.form.html'"></div>
                    <!-- / -->
                </div>
                <!-- / navbar collapse -->

                <!-- navbar right -->
                <ul class="nav navbar-nav ml-auto flex-row">
                    <li class="nav-item dropdown pos-stc-xs">
                        <a class="nav-link mr-2" href data-toggle="dropdown">
                            <i class="material-icons">&#xe7f5;</i>
                            <span class="label label-sm up warn">3</span>
                        </a>
                        <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                            <span class="avatar w-32">
                                <img src="../assets/images/a0.jpg" alt="...">
                                <i class="on b-white bottom"></i>
                            </span>
                        </a>
                        <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                            <i class="material-icons">&#xe5d4;</i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->
            </div>
        </div>

        <div class="app-footer">
            <div class="p-2 text-xs">
                <div class="pull-right text-muted py-1">
                    &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love
                        v1.1.3</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    <a class="nav-link" href="../">About</a>
                    <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
                </div>
            </div>
        </div>
        <div ui-view class="app-body" id="view">
            <div class="padding">
                <div class="row " style="margin-left:40em">
                    <div class="col-sm-6">

                        <form method="POST" id="fields">
                            <div class="box">
                                <div class="box-header">
                                    <h2>Mail</h2>
                                </div>
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="<?php echo $event['msg_name']; ?>" name="name" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" value="<?php echo $event['msg_phone']; ?>" name="phone" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail</label>
                                        <input type="text" value="<?php echo $event['msg_mail']; ?>" name="mail" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>  
                                    <div class="form-group">
                                        <label> Message</label>
                                        <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                            placeholder="Add description here"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="dker p-a text-right">
                                    <button type="submit" name="submit" class="btn info">Send</button>
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
           url: "ajax/send_mail.php",
           method: "POST",
           data: mydata,
           processData: false, 
       contentType: false,
           success: function(data) {
               if (data == 1) {
                   alert("Mail sent successfully");        
               } else if (data == 0) {
                   alert("Fill all the fields");
               }
               else{
                alert("Error sending the mail")
               }

              
           }
           
       });
   });
});



</script>