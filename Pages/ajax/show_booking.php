<?php
                            // Include database connection
                            include('../db.php');
                            
                            // Fetch data from the volunteer table
                            $query = "SELECT * FROM `booking`";
                            $result = mysqli_query($conn, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><?php echo $row['book_mail']; ?></td>
                                    <td><?php echo $row['book_date']; ?></td>
                                    <td><?php echo $row['book_cat']; ?></td>
                                    <td><?php echo $row['book_phone']; ?></td>
                                    <td><?php echo $row['book_desc']; ?></td>
                                    <td><?php echo $row['book_city']; ?></td>
                                    <td><?php echo $row['book_occ']; ?></td>
                                    <td><?php echo $row['book_time']; ?></td>
                                    <td><?php echo $row['book_seats']; ?></td>
                                    <td><?php echo $row['book_ven']; ?></td>
                                    <td><?php echo $row['book_status']; ?></td>
                                    <td style="display:flex">
                                        <a class="btn btn-danger delete" data-del = "<?php echo $row['book_id']; ?>">Delete</a>
                                        <a class="btn btn-success" href="edit_booking.php?id=<?php echo $row['book_id']; ?>">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>