<?php
session_start(); //Initialize session

//Query to add new customer
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
$sql_ins = "INSERT INTO Customer (CustomerID, FirstName,
            LastName, Address, CreditCardNumber) 
            VALUES ('?', '?', '?', '?')";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <style>
        /* Same styles as before */
        body {
            font-family: 'Cinzel', serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #373737;
            overflow: hidden;
        }

        header, footer {
            background-color: #292929;
            color: #ffffff;
            text-align: center;
            padding: 2rem 0;
            border-bottom: 2px solid #6c6c6c;
            border-top: 2px solid #6c6c6c;
        }

        header h1, footer p {
            font-family: 'MedievalSharp', serif;
            font-size: 2rem;
            letter-spacing: 2px;
            margin-top: 5px;
        }

        main {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: flex-start;
            padding: 2rem;
            gap: 2rem;
            height: 100%;
            overflow: hidden;
        }

        .image-container {
            flex: 2;
            height: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: left;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.1);
            padding: 2rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            text-align: center;
            border: 2px solid #313131;
            flex: 1;
            margin-left: auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
        }

        h1 {
            margin-bottom: 1rem;
            font-size: 1.8rem;
            font-family: 'MedievalSharp', serif;
            letter-spacing: 1px;
        }

        input[type="text"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Cinzel', serif;
            background: rgba(255, 255, 255, 0.2);
            color: #000000;
        }

        input[type="text"]::placeholder, input[type="password"]::placeholder, input[type="tel"]::placeholder {
            color: #000000;
        }

        .create-account-button {
            width: 100%;
            padding: 0.8rem;
            background-color: #6c6c6c;
            color: rgb(0, 0, 0);
            border: 2px solid #ffffff;
            border-radius: 4px;
            font-size: 1rem;
            font-family: 'Cinzel', serif;
            cursor: pointer;
            transition: all 0.3s;
        }

        .create-account-button:hover {
            background-color: #000000;
            color: #1a1a1a;
        }

        footer {
            margin-top: auto;
            font-size: 1rem;
            padding: 2rem 1rem;
            text-align: center;
            background-color: #292929;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <header>
        <h1>The Armored Stallion</h1>
    </header>

    <main>
        <div class="image-container">
            <img src="/Users/ethanmorris/Desktop/GitHub Repos/DSD-Project-Fall-2024/DSD_Project_Files/templates/abstract-woman-knight2299.logowik.com.webp" alt="Decorative Image">
        </div>

        <div class="login-container">
            <h1>Create Account</h1>
            <form id="createAccountForm">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="credit_card" placeholder="Credit Card Number" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <button type="submit" class="create-account-button">Create Account</button>
            </form>
        </div>
    </main>
     <?php
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
    $sql_ins = "INSERT INTO Customer (CustomerID, FirstName,
                LastName, Address, CreditCardNumber) 
                VALUES ('?', '?', '?', '?')";
    $sql_ins->bind_param()

    ?>


    <footer>
        <p>&copy; 2024 The Armored Stallion</p>
    </footer>

    <script>
        // Adding form submit event to redirect to login page
        document.getElementById('createAccountForm').addEventListener('submit', function(event) {
            event.preventDefault();  // Prevent form from submitting normally
            window.location.href = 'login.html';  // Redirect to login page
        });
    </script>
</body>
</html>
