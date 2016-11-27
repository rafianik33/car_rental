<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script type="text/javascript">
            function sureToApprove(id) {
                if (confirm("Are you sure you want to Approve this request?")) {
                    window.location.href = 'approve.php?id=' + id;
                }
            }
        </script>
        <script type="text/javascript">
            function sureToApprove1(id) {
                if (confirm("Are you sure you want to delete this Hire Request?")) {
                    window.location.href = 'delete_hire.php?id=' + id;
                }
            }
        </script>
    </head>
    <body>
        <!-- Header -->
        <div id="header">
            <div class="shell">

                <?php
                include 'menu.php';
                ?>
            </div>
        </div>

        <div id="container">
            <div class="shell">

                <br />

                <div id="main">
                    <div class="cl">&nbsp;</div>

                    <div id="content">

                        <div class="box">
                            <!-- Box Head -->
                            <div class="box-head">
                                <h2 class="left">Hire Requests</h2>

                            </div>

                            <div class="table">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th width="13"><input type="checkbox" class="checkbox" /></th>
                                        <th>Id</th>
                                        <th>Client Name</th>
                                        <th>Client Phone</th>
                                        <th>Car Booked</th>
                                        <th>Rent</th>
                                        <th>bKash ID</th>
                                        <th>Date and Time</th>
                                        <th>Status</th>
                                        <th width="110" class="ac">Content Control</th>
                                    </tr>
                                    <?php
                                    include '../includes/config.php';
                                    $select = "SELECT h.hire_id, h.rent,h.status,h.client_id,h.bkash_tran_id,h.phoneno, h.datetime, h.status, u.fname, c.car_name, c.car_type FROM hire h, users u, cars c where h.car_id=c.car_id AND h.client_id=u.client_id";
                                    $result = $conn->query($select);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" /></td>
                                            <td><?php echo $row['hire_id'] ?></td>
                                            <td><?php echo $row['fname'] ?></td>
                                            <td><?php echo $row['phoneno'] ?></td>

                                            <td><?php echo $row['car_Type'] . ' ' . $row['car_name'] ?></td>
                                            <td><?php echo $row['rent'] ?></td>
                                            <td><?php echo $row['bkash_tran_id'] ?></td>
                                            <td><?php echo $row['datetime'] ?></td>

                                            <td><?php echo $row['status'] == 0 ? "Pending" : "Approved"; ?></td>
                                            <td><?php if ($row['status'] == 0): ?><a href="javascript:sureToApprove(<?php echo $row['hire_id']; ?>)" class="ico del">Approve</a><a href="javascript:sureToApprove1(<?php echo $row['hire_id']; ?>)" class="ico edit">Delete</a><?php endif; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>


                                <!-- Pagging -->
                                <div class="pagging">

                                    <div class="right">
                                        <a href="#">Previous</a>
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <span>...</span>
                                        <a href="#">10</a>
                                        <a href="#">Next</a>
                                        <a href="#">View all</a>
                                    </div>
                                    <h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>
                                </div>
                                <!-- End Pagging -->

                            </div>


                        </div>
                        <!-- End Box -->

                    </div>
                    <!-- End Content -->



                    <div class="cl">&nbsp;</div>			
                </div>
                <!-- Main -->
            </div>
        </div>
        <!-- End Container -->

        <!-- Footer -->
        <div id="footer">
            <div class="shell">
                <span class="left">&copy; <?php echo date("Y"); ?> - Rajshahi Rent A Car</span>
                <span class="right">

                </span>
            </div>
        </div>

        <!-- End Footer -->

    </body>
</html>