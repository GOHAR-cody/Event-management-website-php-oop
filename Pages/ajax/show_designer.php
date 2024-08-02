<?php
                   include('../db.php');
                   $i=1;
                    $query = "SELECT * FROM `designer`";
                    $res = mysqli_query($conn, $query);
                    while ($ar = mysqli_fetch_assoc($res)) {
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['designer_name'] ?></td>
                            <td><?php echo $ar['designer_dob'] ?></td>
                            <td><?php echo $ar['designer_phone'] ?></td>
                            <td><?php echo substr( $ar['designer_desc'],0,100) ?>...</td>
                            <td><?php echo $ar['designer_city'] ?></td>
                            <td><?php echo $ar['designer_experience'] ?></td>
                            <td><?php echo $ar['designer_ordered'] ?></td>
                            <td><?php echo $ar['designer_company'] ?></td>
                            <td> <span style="background-color:<?php echo $ar['designer_color']; ?>;display: inline-block; width: 20px; height: 20px;"></span></td>
                            <td><?php echo $ar['designer_tools'] ?></td>
                            <td><?php echo $ar['designer_content'] ?></td>
                            <td><?php echo $ar['designer_number'] ?></td>
                            <td><?php echo $ar['designer_pwd'] ?></td>
                            <td><?php echo $ar['designer_address2'] ?></td>
                            <td><img style="width: 100px; height: 50px;" src="../uploads/<?php echo $ar['designer_img'] ?>" alt="<?php echo $ar['designer_img'] ?>"></td>
                            <td><?php echo $ar['designer_exampleRadios'] ?></td>
                            <td><?php echo $ar['designer_mail'] ?></td>
                            <td style="display:flex">
                            <a class="btn btn-danger delete" data-del ="<?php echo $ar['designer_id'] ?>">Delete</a>
                            <a class="btn btn-success" href="edit_designer.php?upid=<?php echo $ar['designer_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                    ?>