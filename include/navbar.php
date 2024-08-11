<div class="app-header white box-shadow">
    <div class="navbar navbar-toggleable-sm flex-row align-items-center">

        <!-- Page title - Bind to $state's title -->
        <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>



        <!-- navbar right -->
<!-- navbar right -->
<ul class="nav navbar-nav ml-auto flex-row">
    <li class="nav-item dropdown" style="margin-right:5em">
        <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
            <div class="dropdown">
                <?php
                include '../Pages/db.php';
                $sql="SELECT * FROM `images` ";
                $res=mysqli_query($conn,$sql);
                $ar=mysqli_fetch_assoc($res);
                ?>
                <img class="dropdown-toggle" width="50px" height="50px" style="border-radius:5em"
                    src="../uploads/<?php echo $ar['img_profile']; ?>" data-bs-toggle="dropdown"
                    aria-expanded="false">
                
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="setting.php">Setting</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </a>
    </li>
</ul>

    </div>

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