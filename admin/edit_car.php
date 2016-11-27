<?php
include '../includes/config.php';
$car = null;
if (isset($_POST['send'])) {



    $car_name = $_POST['car_name'];
    $id = $_POST['car_id'];
    $car_type = $_POST['car_type'];
    $hire_cost = $_POST['hire_cost'];
    $capacity = $_POST['capacity'];
    $image = false;
    if (isset($_FILES['image']['name'])) {
        $target_path = "../cars/";
        $target_path = $target_path . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {

            $image = basename($_FILES['image']['name']);
        }
    }
    $qr = "update cars set";
    if ($image != false) {
        $qr.=" image='$image', ";
    }
    $qr.=" car_name='$car_name',car_type='$car_type',hire_cost=$hire_cost, capacity=$capacity WHERE car_id=$id";
    $res = $conn->query($qr);
    if ($res === TRUE) {

        echo "<script type = \"text/javascript\">
					alert(\"Car Successfully Updated\");
					window.location = (\"add_vehicles.php\")
				</script>";
    } else
        'Failed';
    $car = $_POST;
}



if (isset($_GET['car_id'])) {
    $qr = "SELECT * FROM cars  WHERE car_id=" . $_GET['car_id'];
    $res = $conn->query($qr);

    if ($res->num_rows > 0) {

        $car = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    </head>
    <body>
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
                            <div class="box-head">
                                <h2>Edit </h2>
                            </div>
                            <?php if (is_null($car)): ?> 
                                <p>Car not found </p>
                            <?php else : ?>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form">
                                        <input type="hidden" class="field size1" name="car_id" value="<?php echo $car['car_id']; ?>" required />
                                        <p>
                                            <span class="req">max 100 symbols</span>
                                            <label>Vehicle Name <span>(Required Field)</span></label>
                                            <input type="text" class="field size1" name="car_name" value="<?php echo $car['car_name']; ?>" required />
                                        </p>	
                                        <p>
                                            <span class="req">max 20 symbols</span>
                                            <label>Vehicle Make <span>(Required Field)</span></label>
                                            <input type="text" class="field size1" name="car_type" value="<?php echo $car['car_type']; ?>" required />
                                        </p>
                                        <p>
                                            <span class="req">max 20 symbols</span>
                                            <label>Vehicle Hire Price <span>(Required Field)</span></label>
                                            <input type="text" class="field size1" name="hire_cost" value="<?php echo $car['hire_cost']; ?>" required />
                                        </p>
                                        <p>
                                            <span class="req">Current Images</span>
                                            <label>Vehicle Image <span>(Required Field)</span></label>
                                            <img src="../cars/<?php echo $car['image']; ?>" width='200px'/>
                                            <input type="file" class="field size1" name="image" />
                                        </p>
                                        <p>
                                            <span class="req">In Terms of Passenger Seats</span>
                                            <label>Vehicle Capacity<span>(Required Field)</span></label>
                                            <input type="text" class="field size1" name="capacity" value="<?php echo $car['capacity']; ?>" required />
                                        </p>	

                                    </div>

                                    <div class="buttons">
                                        <input type="button" class="button" value="preview" />
                                        <input type="submit" class="button" value="submit" name="send" />
                                    </div>

                                </form>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div id="sidebar">

                        <div class="box">

                            <div class="box-head">
                                <h2>Management</h2>
                            </div>

                            <div class="box-content">
                                <a href="add_vehicles.php" class="add-button"><span>View Our Vehicles</span></a>
                                <div class="cl">&nbsp;</div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="cl">&nbsp;</div>			
            </div>
        </div>


        <div id="footer">
            <div class="shell">
                <span class="left">&copy; <?php echo date("Y"); ?> - Rajshahi Rent A Car</span>
                <span class="right">

                </span>
            </div>
        </div>

    </body>
</html>