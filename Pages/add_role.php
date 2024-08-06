

<?php
include('../include/header.php'); 
 include('../include/sidebar.php'); 
?>
<div class="app" id="app">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                <i class="material-icons">&#xe5d2;</i>
            </a>
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
            <div class="collapse navbar-collapse" id="collapse">
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
            </div>
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
        </div>
    </div>
    <div class="app-footer">
        <div class="p-2 text-xs">
            <div class="pull-right text-muted py-1">
                &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
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
                <div class="col-sm-6 ">
                    <form Method="POST" id="fields">
                        <div class="box">
                       
                            <div class="box-header">
                                <h2>Add Role</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text"  name="role" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role Access</label>
                                    <select name="access" class="form-select input_text form-control" id="opt" onchange="toggleDiv()" required>
                                        <option value="null">Select</option>
                                        <option value="all">All</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                                <div style="display: none;" id="showdiv">
                                    <div class="form-group">
                                        <div style=" margin-left: 4em;">
                                            <div class="form-check ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios1" value="category" >
                                                <label class="form-check-label" for="exampleRadios1">Category</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios2" value="planner">
                                                <label class="form-check-label" for="exampleRadios2">Planner</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios3" value="designer">
                                                <label class="form-check-label" for="exampleRadios3">Designer</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios4" value="volunteer">
                                                <label class="form-check-label" for="exampleRadios4">Volunteer</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios5" value="venue">
                                                <label class="form-check-label" for="exampleRadios5">Venue</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios6" value="booking">
                                                <label class="form-check-label" for="exampleRadios6">Booking</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios7" value="news">
                                                <label class="form-check-label" for="exampleRadios7">News</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios8" value="event">
                                                <label class="form-check-label" for="exampleRadios8">Event</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios8" value="client">
                                                <label class="form-check-label" for="exampleRadios8">Client</label>
                                            </div>
                                            <div class="form-check" style=" ">
                                                <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios8" value="payment">
                                                <label class="form-check-label" for="exampleRadios8">Payment</label>
                                            </div>
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
            url: "ajax/upload_role.php",
            method: "POST",
            data: mydata,
            processData: false, 
        contentType: false, 
            success: function(data) {
                if(data == 1) {
                    alert("data inserted successfully");
                    $("#fields").trigger("reset");
                }
               
                else{
                    alert("Error uploading data");
                }
            
                
            }
        });
    });
});
function toggleDiv() {
    let val1 = document.getElementById("opt").value;
    let divShow = document.getElementById("showdiv");

    if (val1 === "custom") {
        divShow.style.display = "block";
    } else {
        divShow.style.display = "none";
    }
}
</script>
