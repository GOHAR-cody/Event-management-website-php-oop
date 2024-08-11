<?php
                            // Include database connection
                            include('../db.php');
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM messages";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                               
                                   
                                    ?>

                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['msg_name']; ?></td>
                                        <td><?php echo $row['msg_phone']; ?></td>
                                        <td><?php echo $row['msg_mail']; ?></td>
                                        <td ><?php echo $row['msg_msg'] ;?></td>
                                        <td style="display:flex">
                                            <a class="btn btn-danger delete" data-del="<?php echo $row['msg_id']; ?>">Delete</a>
                                            <a class="btn btn-success" href="reply_message.php?id=<?php echo $row['msg_id']; ?>">Reply</a>
                                        </td>
                                    </tr>
                                    <?php } ?>