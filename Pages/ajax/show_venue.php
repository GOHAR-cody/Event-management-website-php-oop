<?php
                  include('../db.php'); 
                   $i=1;
                    $query = "SELECT * FROM `venue`";
                    $res = mysqli_query($conn, $query);
                    while ($ar = mysqli_fetch_assoc($res)) {
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['venue_name'] ?></td>
                            <td><?php echo $ar['venue_desc'] ?></td>
                           
                            <td style="display:flex">
                            <a class="btn btn-danger delete" data-del="<?php echo $ar['venue_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="edit_venue.php?upid=<?php echo $ar['venue_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                    ?>