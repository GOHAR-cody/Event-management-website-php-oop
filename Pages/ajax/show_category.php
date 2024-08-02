<?php
                  include('D:\Xamp\htdocs\flatkit\Pages\db.php'); 
                   $i=1;
                    $query = "SELECT * FROM `categories`";
                    $res = mysqli_query($conn, $query);
                    while ($ar = mysqli_fetch_assoc($res)) {
                        ?>
          <tr>  
          <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $ar['cat_name'] ?></td>
                            <td><?php echo substr( $ar['cat_description'],0,100) ?>...</td>
                            <td style="display:flex">
                            <a  class="btn btn-danger delete" data-del="<?php echo $ar['cat_id'] ?>">Delete</a>
                            <a  class="btn btn-success update" href="edit_category.php?upid=<?php echo $ar['cat_id'] ?>">Update</a>
                            </td>   
        </tr>
        <?php
                  $i+=1; 
                  }
                    ?>