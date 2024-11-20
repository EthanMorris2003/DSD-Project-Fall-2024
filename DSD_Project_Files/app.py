from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

# Home page
@app.route('/')
def index():
    return render_template('index.html')

# Customer page
@app.route('/customer')
def customer():
    return render_template('customer.html')

# Cart page
@app.route('/cart')
def cart():
    return render_template('cart.html')

# Order page
@app.route('/order')
def order():
    return render_template('order.html')

if __name__ == '__main__':
    app.run(debug=True)