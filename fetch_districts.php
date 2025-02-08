<?php
include 'db.php';

if (isset($_POST['region_id'])) {
    $regionID = $_POST['region_id'];
    $stmt = $conn->prepare("SELECT id, name FROM districts WHERE region_id = ?");
    $stmt->bind_param("i", $regionID);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<option value="">Select District</option>';
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    $stmt->close();
}
?>
