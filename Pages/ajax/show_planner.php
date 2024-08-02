
        <?php
                 include('../db.php'); 
                   $i=1;
                    $query = "SELECT * FROM `planner`";
                    $res = mysqli_query($conn, $query);
                    while ($ar = mysqli_fetch_assoc($res)) {
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['planner_name'] ?></td>
                            <td><?php echo $ar['planner_dob'] ?></td>
                            <td><?php echo $ar['planner_phone'] ?></td>
                            <td><?php echo substr( $ar['planner_desc'],0,100) ?>...</td>
                            <td><?php echo $ar['planner_city'] ?></td>
                            <td><?php echo $ar['planner_exp'] ?></td>
                            <td><?php echo $ar['planner_achi'] ?></td>
                            <td><?php echo $ar['planner_skills'] ?></td>
                            <td><?php echo $ar['planner_partner'] ?></td>
                            <td><?php echo $ar['planner_mail'] ?></td>
                            <td><?php echo $ar['planner_address'] ?></td>
                            <td> <img style=" width: 100px;height: 50px;" src="../uploads/<?php echo $ar['planner_pic'] ?>" alt="<?php echo $ar['planner_pic'] ?>"></td>
                            <td><?php echo $ar['planner_status'] ?></td>
                            <td style="display:flex">
                            <a class="btn btn-danger delete" data-del="<?php echo $ar['planner_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="edit_planner.php?upid=<?php echo $ar['planner_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                    ?>
        