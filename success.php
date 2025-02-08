<?php
// success.php
if (!isset($_GET['name'])) {
    header("Location: register.php");
    exit();
}
$userName = htmlspecialchars($_GET['name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #8BC6EC, #9599E2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .success-container {
            text-align: center;
            position: relative;
            z-index: 1;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            animation: scaleUp 0.8s ease-out;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 1rem;
            font-size: 2.5em;
        }

        .user-name {
            color: #e74c3c;
            font-weight: 700;
            text-transform: uppercase;
        }

        .message {
            font-size: 1.2em;
            color: #34495e;
            margin-bottom: 2rem;
        }

        .flower {
            position: absolute;
            animation: float 4s infinite linear;
            opacity: 0.7;
        }

        @keyframes scaleUp {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-100px) rotate(180deg);
            }
            100% {
                transform: translateY(0) rotate(360deg);
            }
        }

        .flower:nth-child(1) {
            left: 10%;
            top: 20%;
            animation-delay: 0.2s;
            width: 40px;
        }

        .flower:nth-child(2) {
            right: 15%;
            top: 30%;
            animation-delay: 0.5s;
            width: 50px;
        }

        .flower:nth-child(3) {
            left: 25%;
            bottom: 20%;
            animation-delay: 0.8s;
            width: 35px;
        }

        .flower:nth-child(4) {
            right: 25%;
            bottom: 30%;
            animation-delay: 1.1s;
            width: 45px;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #ff6b6b;
            animation: confetti 3s infinite;
        }

        @keyframes confetti {
            0% {
                transform: translateY(-100vh) rotate(0deg);
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Flowers -->
    <img src="https://www.svgrepo.com/show/309493/flower.svg" class="flower">
    <img src="https://www.svgrepo.com/show/309493/flower.svg" class="flower">
    <img src="https://www.svgrepo.com/show/309493/flower.svg" class="flower">
    <img src="https://www.svgrepo.com/show/309493/flower.svg" class="flower">

    <!-- Confetti -->
    <div class="confetti" style="left:10%"></div>
    <div class="confetti" style="left:20%"></div>
    <div class="confetti" style="left:30%"></div>
    <div class="confetti" style="left:40%"></div>
    <div class="confetti" style="left:50%"></div>
    <div class="confetti" style="left:60%"></div>
    <div class="confetti" style="left:70%"></div>
    <div class="confetti" style="left:80%"></div>
    <div class="confetti" style="left:90%"></div>

    <div class="success-container">
        <h1>Congratulations, <span class="user-name"><?php echo $userName; ?></span>! 🎉</h1>
        <p class="message">You have successfully registered!</p>
        <p class="message">Welcome to our community! 🌸</p>
    </div>
</body>
</html>