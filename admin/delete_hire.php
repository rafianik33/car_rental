<?php

include '../includes/config.php';
$id = $_REQUEST['id'];
$query = "DELETE FROM hire WHERE hire_id = '$id'";
$result = $conn->query($query);
if ($result === TRUE) {
    echo "<script type = \"text/javascript\">
					alert(\"Hire Recuest Successfully Deleted\");
					window.location = (\"index.php\")
				</script>";
}
?>
