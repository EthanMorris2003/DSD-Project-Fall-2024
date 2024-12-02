<!DOCTYPE html>
<html>
<head>
    <title>Armored Stallion - Home</title>
</head>
<body>
    <h1>Welcome to Armored Stallion</h1>
    <nav>
        <a href="{{ url_for('customer') }}">Customers</a> |
        <a href="{{ url_for('cart') }}">Cart</a> |
        <a href="{{ url_for('order') }}">Orders</a>
    </nav>
</body>
</html>