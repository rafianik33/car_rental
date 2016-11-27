
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script type="text/javascript">
            function sureToApprove(id) {
                if (confirm("Are you sure you want to Approve this request?")) {
                    window.location.href = 'users.php?id=' + id + '&action=approve';
                }
            }
            function sureToDeactivate(id) {
                if (confirm("Are you sure you want to Deactivate this request?")) {
                    window.location.href = 'users.php?id=' + id + '&action=deactivate';
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
                require_once '../includes/config.php';
                ?>

                <?php
                if (isset($_GET['id']) && isset($_GET['action'])) {

                    $id = $_GET['id'];
                    $action = $_GET['action'] == 'approve' ? 'Approved' : 'Pending';

                    $query = "UPDATE users SET status = '$action' WHERE client_id = $id";
                    $result = $conn->query($query);
                    var_dump($result);
                    header('Location: users.php');
                }
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
                                <h2 class="left">Client Requests</h2>
                            </div>

                            <div class="table">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <th width="13"><input type="checkbox" class="checkbox" /></th>
                                        <th>Id</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th width="110" class="ac">Content Control</th>
                                    </tr>
                                    <?php
                                    include '../includes/config.php';
                                    $select = "SELECT  client_id,fname, email, status FROM users";
                                    $result = $conn->query($select);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" /></td>
                                            <td><?php echo $row['client_id'] ?></td>
                                            <td><?php echo $row['fname'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><?php if ($row['status'] != 'Approved'): ?><a href="javascript:sureToApprove(<?php echo $row['client_id']; ?>)" class="ico del">Approve</a>
                                                <?php else: ?>
                                                    <a href="javascript:sureToDeactivate(<?php echo $row['client_id']; ?>)" class="ico del">Deactivate</a>
                                                <?php endif; ?></td>
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