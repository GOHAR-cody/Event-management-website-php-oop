<?php
                            // Include database connection
                            include('../db.php'); 
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM `volunteer`";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['volunteer_name']; ?></td>
                                    <td><?php echo $row['volunteer_dob']; ?></td>
                                    <td><?php echo $row['volunteer_phone']; ?></td>
                                    <td><?php echo substr($row['volunteer_desc'], 0, 100) . '...'; ?></td>
                                    <td><?php echo $row['volunteer_city']; ?></td>
                                    <td><?php echo $row['volunteer_experience']; ?></td>
                                    <td><?php echo $row['volunteer_occasions']; ?></td>
                                    <td><?php echo $row['volunteer_achievements']; ?></td>
                                    <td><?php echo $row['volunteer_skills']; ?></td>
                                    <td><?php echo $row['volunteer_pwd']; ?></td>
                                    <td><?php echo $row['volunteer_address2']; ?></td>
                                    <td><img style="width: 100px; height: 50px;" src="../uploads/<?php echo $row['volunteer_img']; ?>" alt="<?php echo $row['volunteer_img']; ?>"></td>
                                    <td><?php echo $row['volunteer_gender']; ?></td>
                                    <td><?php echo $row['volunteer_exampleRadios']; ?></td>
                                    <td><?php echo $row['volunteer_mail']; ?></td>
                                    <td style="display:flex">
                                        <a class="btn btn-danger delete" data-del="<?php echo $row['volunteer_id']; ?>">Delete</a>
                                        <a class="btn btn-success" href="edit_volunteer.php?id=<?php echo $row['volunteer_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>