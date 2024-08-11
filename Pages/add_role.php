

<?php
include('../include/header.php'); 
 include('../include/sidebar.php'); 
?>
<div class="app" id="app">
   
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
