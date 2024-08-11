<?php
                   include('../db.php');
                   $i=1;
                    //$query = "SELECT * FROM `users`";
                    $query = "SELECT login_users.*, roles.role_name FROM `login_users` INNER JOIN `roles` ON login_users.login_role = roles.role_id";

                    $res = mysqli_query($conn, $query);
                    while ($ar = mysqli_fetch_assoc($res)) {
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $ar['login_name'] ?></td>
                            <td><?php echo $ar['login_mail'] ?></td>
                            <td><?php echo $ar['role_name'] ?></td>
                           
                            <td style="display:flex">
                            <a class="btn btn-danger delete" data-del="<?php echo $ar['login_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="edit_user.php?upid=<?php echo $ar['login_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                    ?>