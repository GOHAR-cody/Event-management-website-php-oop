<?php
                   include('../db.php');
                   $i=1;
                    $query = "SELECT * FROM roles";
                    $res = mysqli_query($conn, $query);
                    $new= array('category','planner','designer','volunteer','venue','booking','news','event');
                    while ($ar = mysqli_fetch_assoc($res)) {
                        $selected=unserialize($ar['role_roles']);
                        
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['role_name'] ?></td>
                            <td><?php echo $ar['role_access'] ?></td>
                            
                            <?php 
                              foreach($new as $s){
                                
                               ?>
                             <td><input type="checkbox"  <?php echo in_array($s ,$selected) ? 'checked' : ' '; ?>></td>
                                
                                
                                <?php
                              } ?>
                            
                            <td style="display:flex">
                            <a class="btn btn-danger delete" data-del="<?php echo $ar['role_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="edit_role.php?upid=<?php echo $ar['role_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                   ?>