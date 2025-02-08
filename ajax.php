<?php
include 'db.php';

if (isset($_POST['region_id'])) {
    $region_id = $_POST['region_id'];

    $stmt = $conn->prepare("SELECT id, name FROM districts WHERE region_id = ?");
    $stmt->bind_param("i", $region_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $districts = "<option value=''>Select District</option>";
    while ($row = $result->fetch_assoc()) {
        $districts .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }

    echo $districts;
}
?>
