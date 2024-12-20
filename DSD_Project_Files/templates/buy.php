<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Horse - The Armored Stallion</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=MedievalSharp&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Cinzel', serif;
            background-color: #ffffff;
            color: #373737;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #292929;
            color: #ffffff;
            text-align: center;
            padding: 1.5rem 0;
        }

        header h1 {
            font-family: 'MedievalSharp', serif;
            font-size: 2rem;
            letter-spacing: 2px;
            margin: 0;
        }

        main {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        form {
            background-color: #f8f8f8;
            border: 2px solid #6c6c6c;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        form h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        label {
            display: block;
            font-size: 1rem;
            margin: 1rem 0 0.5rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-button {
            display: inline-block;
            width: 100%;
            padding: 0.8rem 1.2rem;
            background-color: #6c6c6c;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-family: 'Cinzel', serif;
            font-size: 1rem;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid #ffffff;
        }

        .submit-button:hover {
            background-color: #292929;
        }

        footer {
            background-color: #292929;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>The Armored Stallion - Purchase Horse</h1>
    </header>

    <main>
        <form action="confirmation.html" method="POST">
            <h2>Complete Your Purchase</h2>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="address">Shipping Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>

            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment" required>
                <option value="">Select a payment method</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>

            <button type="submit" class="submit-button">Place Order</button>
        </form>

        <?php

        ?>
    </main>
    </body>

    <footer>
        <p>&copy; 2024 The Armored Stallion</p>
    </footer>
</body>
</html>