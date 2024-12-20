<?php
session_start();

//If user is logged in, go to homepage.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: homepage.php");
    exit;
}

include "database.php";

$user = $pass = "";
$user_err = $pass_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Check for empty user
    if(empty(trim($_POST["user"]))) {
        $user_err = "Enter a username dummy";
        echo $user_err;
    } else {
        $user = trim($_POST["user"]);
    }

    //Check for empty pass
    if(empty(trim($_POST["pass"]))) {
        $pass_err = "Enter a password dummy";
        echo $pass_err;
    } else {
        $user = trim($_POST["pass"]);
    }

    //Validate user
    if(empty($user_err) && empty($pass_err)) {
        $sql = "SELECT CustomerID, Username, Password, Address, CredCar, Phone FROM Customer WHERE Username = ?";

        if($stmt = $mysqli->prepare($sql)) {
            //Bind variables
            $stmt->bind_param("s", $param_user);

            //Sets parameter
            $param_user = $user;

            if($stmt->execute()) {
                $stmt->store_result();

                if($stmt->num_rows == 1) {

                //Attempt to execute
                    if($stmt->execute()) {
                    $stmt->store_result();

                    //Check if user exists, if so, verify password
                        $stmt->bind_result($id, $user, $hash);
                        if($stmt->fetch()) {
                            if(password_verify($pass, $hash)) {
                            //If password is correct, start new session
                            session_start();

                            //Store data
                            $_SESSION["loggedin"] == true;
                            $_SESSION["CustomerID"] = $id;
                            $_SESSION["Username"] = $user;

                            header("location: homepage.php");
                            } else {
                            //Password fails
                             $login_err = "Invalid username of password";
                            }
                        }
                    }
                } else {
                    //Username fails
                    $login_err = "Invalid username or password";
                }
            } else {
                echo "Unable to login";
            }
            //close statement
            $stmt->close();
        }
    } 
    //Close connection
    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <style>
body {
    font-family: 'Cinzel', serif;
    background-color: #ffffff; /* Dark background for contrast */
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensures body takes full height */
    color: #373737; /* White text color */
    overflow: hidden; /* Prevent scrolling */
}

header, footer {
    background-color: #292929;
    color: #ffffff;
    text-align: center;
    padding: 1.5rem 0; /* Increased padding to make footer thicker */
    border-bottom: 2px solid #6c6c6c;
    border-top: 2px solid #6c6c6c;
}

header h1, footer p {
    font-family: 'MedievalSharp', serif;
    font-size: 2rem;
    letter-spacing: 2px;
    margin-top: 5px; /* Shift header title down by 5px */
}

main {
    display: flex;
    flex: 1;
    align-items: center;
    justify-content: flex-start;
    padding: 2rem;
    gap: 2rem;
    height: calc(100vh - 4rem); /* Full screen minus header/footer */
}

.image-container {
    flex: 2; /* Take up available space */
    height: 100%; /* Full height of the screen */
    display: flex;
    justify-content: flex-start; /* Align to the left */
    align-items: center; /* Vertically center the image */
    overflow: hidden; /* Hide anything that overflows */
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Make the image cover the entire container */
    object-position: left; /* Align the image to the left */
}

.login-container {
    background: rgba(0, 0, 0, 0.1); /* Semi-transparent background */
    padding: 2rem;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    text-align: center;
    border: 2px solid #313131;
    flex: 1; /* Take up all available space */
    margin-left: auto; /* Align to the right */
    height: 100%; /* Full available height within main */
    display: flex; /* Center content inside */
    flex-direction: column;
    justify-content: center;
    box-sizing: border-box; /* Include padding and borders in height calculation */
}

h1 {
    margin-bottom: 1rem;
    font-size: 1.8rem;
    font-family: 'MedievalSharp', serif;
    letter-spacing: 1px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 0.8rem;
    margin: 0.5rem 0;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: 'Cinzel', serif;
    background: rgba(255, 255, 255, 0.2);
    color: #000000; /* Text color changed to black */
}

input[type="text"]::placeholder, input[type="password"]::placeholder {
    color: #000000;
}

.login-button {
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

.login-button:hover {
    background-color: #000000;
    color: #1a1a1a;
}

.create-account {
    margin-top: 1rem;
}

.create-account a {
    display: inline-block;
    text-decoration: none;
    color: #ffffff;
    background-color: #6c6c6c;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    border: 2px solid #ffffff;
    font-family: 'Cinzel', serif;
    transition: all 0.3s;
}

.create-account a:hover {
    background-color: #ffffff;
    color: #1a1a1a;
}

footer {
    margin-top: auto;
    font-size: 1rem;
    padding: 0.5rem 1rem;

}

    </style>
</head>
<body>
    <header>
        <h1>The Armored Stallion</h1>
    </header>

    <main>
        <!-- Image on the Left -->
        <div class="image-container">
            <img src="/Users/ethanmorris/Desktop/GitHub Repos/DSD-Project-Fall-2024/DSD_Project_Files/templates/abstract-woman-knight2299.logowik.com.webp" alt="Decorative Image">
        </div>

        <!-- Login Container -->
        <div class="login-container">
            <h1>Login</h1>
            <form action="/login" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="login-button">Login</button>
            </form>
            </div>
            <div class="create-account">
                <a href="create_account.html">Create Account</a>
            </div>
        </div>
    </main>


</body>
<footer>
    <p>&copy; 2024 The Armored Stallion</p>
</footer>
</html>