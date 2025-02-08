<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $regNumber = $_POST['regNumber'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $district = $_POST['district'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (full_name, reg_number, sex, email, region, district, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullName, $regNumber, $sex, $email, $region, $district, $password);

    if ($stmt->execute()) {
        header("Location: success.php?name=" . urlencode($fullName));
        exit();
    } else {
        echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/validation.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, rgb(77, 108, 250), rgb(212, 248, 112));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: linear-gradient(135deg, rgb(152, 245, 156), rgb(112, 194, 248));
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #444;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group div {
            width: 48%;
            margin-bottom: 1rem;
            animation: fadeInUp 0.5s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.6);
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
            transform: scale(1.05);
        }

        .success-message, .error-message {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            animation: fadeIn 0.5s ease-in;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 480px) {
            .form-group div {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>
    <form id="registrationForm" action="register.php" method="POST">
        <div class="form-group">
            <div>
                <label>Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div>
                <label>Registration Number:</label>
                <input type="text" id="regNumber" name="regNumber" placeholder="BCS-00-0000-0000" required>
            </div>
            <div>
                <label>Sex:</label>
                <select id="sex" name="sex">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label>Region:</label>
                <select id="region" name="region">
                    <option value="">Select Region</option>
                    <?php
                    include 'db.php';
                    $query = "SELECT * FROM regions";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>District:</label>
                <select id="district" name="district">
                    <option value="">Select District</option>
                </select>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label>Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
        </div>
        <button type="submit">Register</button>
    </form>
</div>

<script src="js/script.js"></script>
<script>
$(document).ready(function() {
    $("#region").change(function() {
        var regionID = $(this).val();
        $.ajax({
            url: "fetch_districts.php", // A separate PHP file to fetch districts
            method: "POST",
            data: { region_id: regionID },
            success: function(data) {
                $("#district").html(data);
            }
        });
    });
});
</script>
</body>
</html>