<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script type="text/javascript">
            function sureToApprove(id) {
                if (confirm("Are you sure you want to delete this message?")) {
                    window.location.href = 'delete_msg.php?id=' + id;
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
            <!-- End Main Nav -->
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
                                <h2 class="left">Client Messages</h2>
                            </div>

                            <div class="table">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th width="13"><input type="checkbox" class="checkbox" /></th>
                                        <th>Message Sender</th>
                                        <th>Message Content</th>
                                        <th>Time Send</th>
                                        <th>Status</th>
                                        <th width="110" class="ac">Content Control</th>
                                    </tr>
                                    <?php
                                    include '../includes/config.php';
                                    $select = "SELECT m.msg_id, m.client_id, m.message, m.status, m.time, u.fname FROM message m, users u WHERE m.client_id=u.client_id  ";
                                    $result = $conn->query($select);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" /></td>
                                            <td><h3><a href="#"><?php echo $row['fname'] ?></a></h3></td>
                                            <td><h3><a href="#"><?php echo $row['message'] ?></a></h3></td>
                                            <td><?php echo $row['time'] ?></td>
                                            <td><a href="#"><?php echo $row['status'] ?></a></td>
                                            <td><a href="javascript:sureToApprove(<?php echo $row['msg_id']; ?>)" class="ico del">Delete</a><a href="#" class="ico edit">Read</a></td>
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