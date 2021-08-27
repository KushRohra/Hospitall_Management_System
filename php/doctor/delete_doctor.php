<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt = $conn->prepare("DELETE FROM doctor WHERE doctor_id = ?");
        $stmt->bind_param("s", $doctor_id);

        $doctor_id = $_POST['doctor_id'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>