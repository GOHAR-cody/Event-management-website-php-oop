<?php
                            // Include database connection
                            include('../db.php');
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM news";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i = 1;
                                    $images = $row['news_pics'];
                                    $new_arr = unserialize($images);
                                    ?>
                                
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['news_title']; ?></td>
                                    <td><?php echo $row['news_cat']; ?></td>
                                    <td>  <div class="image-container">
                                    <?php foreach ($new_arr as $arr) { ?>
                                        <img src="../uploads/<?php echo $arr ?>" alt="<?php echo $arr ?>">
                                    <?php } ?>
                                </div></td>
                                    <td><?php echo substr($row['news_desc'], 0, 100) . '...'; ?></td>
                                   
                                    <td><?php echo $row['news_status']; ?></td>
                                    <td style="display:flex">
                                        <a class="btn btn-danger delete" data-del ="<?php echo $row['news_id']; ?>">Delete</a>
                                        <a class="btn btn-success" href="edit_news.php?id=<?php echo $row['news_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>