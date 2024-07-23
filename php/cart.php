
<?php
if (isset($_GET['success']) && $_GET['success'] === 'true') {
    echo '<script>alert("Details saved successfully. Press Buy Now to complete your purchase.");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART - BEAST</title>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/product2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../css/buybut.css">
    <link rel="stylesheet" href="../css/register.css">
    <style>
    </style>
</head>
<body>
    <div class="preloader" id="preloader"></div>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../pics/BEAST(1).png" alt="" width="175px">
                </div>
                <nav>
                    <ul>
                        <li><a href="../php/carpediem.php">HOME</a></li>
                        <li><a href="../html/products.html">PRODUCT</a></li>
                        <li><a href="#footer">CONTACT</a></li>
                        <li>
                            <div class="cart">
                                <a href="../php/cart.php">
                                    <i class="bx bx-cart"></i> CART
                                    <span id="cartItemCount">0</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="cart"></div>
            </div>
        </div>
    </div>
    <div id="cartContainer">
        <div class="small-container cart-page">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cartBody"></tbody>
            </table>
        </div>
    </div>
    <div class="total">
        <h3>Total</h3>
        <p></p>
    </div>

    <div class="mainscreen">
    <
      <div class="card">
        <div class="leftside">
          <img
            src="../pics/bull.jpg"
            class="product"
          />
        </div>
        <div class="rightside">
          <form action="../php/cart1.php" method="post">
            <h1>CheckOut</h1>
            <h2>Payment Information</h2>
            <p>Cardholder Name</p>
            <input type="text" class="inputbox" name="name" required />
            <P>Address</p>
            <input type="text" class="inputbox" name="address" required />
            <p>Card Number</p>
            <input type="number" class="inputbox" name="card_number" id="card_number" required />

            <p>Card Type</p>
            <select class="inputbox" name="card_type" id="card_type" required>
              <option value="">--Select a Card Type--</option>
              <option value="Visa">Visa</option>
              <option value="RuPay">RuPay</option>
              <option value="MasterCard">MasterCard</option>
            </select>
<div class="expcvv">

            <p class="expcvv_text">Expiry</p>
            <input type="date" class="inputbox" name="exp_date" id="exp_date" required />

            <p class="expcvv_text2">CVV</p>
            <input type="password" class="inputbox" name="cvv" id="cvv" required />
        </div>
            <p></p>
            <button type="submit" class="button">Submit Details</button>
          </form>
        </div>
      </div>
    </div>
    
   
    <form method="POST" id="buyNowForm">
    <div class="address_field">
        <input type="text" name="address" class="address" placeholder="Enter Your Address" >
        <label for="address" class="form_address">Address</label>
    </div>
    <div class="buy">
        <button type="submit" name="purchase" id="buyNowBtn">Buy Now</button>
    </div>
</form>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        function handleBuyNowSubmit(event) {
            event.preventDefault();

            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const url = 'cart.php';
            const data = new FormData();
            data.append('cartItems', JSON.stringify(cartItems));
            data.append('address', document.querySelector('.address').value);

            fetch(url, {
                method: 'POST',
                body: data,
            })
            .then(response => response.text())
            .then(result => {
                if (result === 'success') {
                    console.log('Order placed successfully!');
                    localStorage.removeItem('cart');
                    updateCartItemCount();
                    setTimeout(() => {
                        window.location.href = 'products.html';
                    }, 2000);
                } else {
                    console.log('Order placement failed. Please try again.');
                    showPopup('Order placement failed. Please try again.');
                }
            })
            .catch(error => {
                console.log('Failed to communicate with the server. Please try again.');
                showPopup('Failed to communicate with the server. Please try again.');
            });
        }

        const buyNowBtn = document.getElementById('buyNowBtn');
        if (buyNowBtn) {
            buyNowBtn.addEventListener('click', handleBuyNowSubmit);
        }

        function updateCartItemCount() {
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemCountElement = document.getElementById('cartItemCount');
            const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
            cartItemCountElement.textContent = totalItems;
        }

        updateCartItemCount();
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function handleBuyNowSubmit(event) {
        event.preventDefault();

        const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        const url = 'cart.php';
        const data = new FormData();
        data.append('cartItems', JSON.stringify(cartItems));
        data.append('address', document.querySelector('.address').value);

        fetch(url, {
            method: 'POST',
            body: data,
        })
        .then(response => response.text())
        .then(result => {
            if (result === 'success') {
                console.log('Order placed successfully!');
                localStorage.removeItem('cart');
                updateCartItemCount();
                // Optionally show a success message to the user
                showPopup('Order placed successfully!');
            } else {
                console.log('Order placement failed. Please try again.');
                showPopup('Order placement failed. Please try again.');
            }
        })
        .catch(error => {
            console.log('Failed to communicate with the server. Please try again.');
            showPopup('Failed to communicate with the server. Please try again.');
        });
    }

    const buyNowForm = document.getElementById('buyNowForm');
    if (buyNowForm) {
        buyNowForm.addEventListener('submit', handleBuyNowSubmit);
    }

    function updateCartItemCount() {
        const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        const cartItemCountElement = document.getElementById('cartItemCount');
        const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
        cartItemCountElement.textContent = totalItems;
    }

    function showPopup(message) {
        // Implement a function to display a popup or alert with the given message
        // Example: alert(message);
    }

    updateCartItemCount();
});
</script>






    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        var loader = document.getElementById("preloader");
        setTimeout(function () {
            loader.style.display = "none";
        }, 1500);
    </script>
    
    <script>
            document.addEventListener('DOMContentLoaded', function () {
            window.addToCart = function (productName, productPrice) {
                let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const existingProductIndex = cartItems.findIndex(item => item.name === productName);
                if (existingProductIndex !== -1) {
                    cartItems[existingProductIndex].quantity += 1;
                } else {
                    const cartItem = {
                        name: productName,
                        price: productPrice,
                        quantity: 1,
                    };
                    cartItems.push(cartItem);
                }
                localStorage.setItem('cart', JSON.stringify(cartItems));
                updateCartItemCount();
                console.log('Item added to cart:', productName, productPrice);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'your_php_script.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                const formData = new FormData();
                formData.append('productName', productName);
                formData.append('productPrice', productPrice);
                console.log('Sending AJAX request:', productName, productPrice);
                xhr.send(formData);
            };

            function handleBuyNowSubmit() {
                const address = document.querySelector('.address').value;
                console.log('Buy Now button clicked with address:', address);
                simulateSuccessfulOrder();
            }

            function simulateSuccessfulOrder() {
                console.log('Order placed successfully!');
                localStorage.removeItem('cart');
                updateCartItemCount();
                setTimeout(() => {
                    window.location.href = 'products.html';
                }, 2000);
            }

            const buyNowBtn = document.getElementById('buyNowBtn');
            if (buyNowBtn) {
                buyNowBtn.addEventListener('click', handleBuyNowSubmit);
            }

            function updateCartItemCount() {
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const cartItemCountElement = document.getElementById('cartItemCount');
                const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
                cartItemCountElement.textContent = totalItems;
            }

            updateCartItemCount();
        });
    </script>
   


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function displayCart() {
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const cartBody = document.getElementById('cartBody');
                const totalElement = document.querySelector('.total p');
                cartBody.innerHTML = '';
                let total = 0;
                cartItems.forEach((item, index) => {
                    const cartRow = document.createElement('tr');
                    const subtotal = item.price * item.quantity;
                    total += subtotal;
                    cartRow.innerHTML = `
                        <td>${item.name}</td>
                        <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)"></td>
                        <td>${item.price}</td>
                        <td>${subtotal}</td>
                        <td><button onclick="removeItem(${index})">Remove</button></td>
                    `;
                    cartBody.appendChild(cartRow);
                });
                totalElement.textContent = `${total}`;
            }

            displayCart();

            window.removeItem = function (index) {
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                cartItems.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCart();
            };

            window.updateQuantity = function (index, newQuantity) {
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                cartItems[index].quantity = parseInt(newQuantity, 10);
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCart();
            };

            window.addToCart = function (productName, productPrice) {
                let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const existingProductIndex = cartItems.findIndex(item => item.name === productName);
                if (existingProductIndex !== -1) {
                    cartItems[existingProductIndex].quantity += 1;
                } else {
                    const cartItem = {
                        name: productName,
                        price: productPrice,
                        quantity: 1,
                    };
                    cartItems.push(cartItem);
                }
                localStorage.setItem('cart', JSON.stringify(cartItems));
                displayCart();
            };

            const addToCartBtn = document.getElementById('addToCartBtn');
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', function (event) {
                    event.preventDefault();
                    const productName = 'Athletic Kit';
                    const productPrice = 4500;
                    addToCart(productName, productPrice);
                });
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buyNowForm = document.getElementById('buyNowForm');
        if (buyNowForm) {
            buyNowForm.addEventListener('submit', handleBuyNowSubmit);
        }
    });
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateCartItemCount() {
                const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                const cartItemCountElement = document.getElementById('cartItemCount');
                const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
                cartItemCountElement.textContent = totalItems;
            }

            updateCartItemCount();
        });

        function addToCart(productName, productPrice) {
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const existingProductIndex = cartItems.findIndex(item => item.name === productName);
            if (existingProductIndex !== -1) {
                cartItems[existingProductIndex].quantity += 1;
            } else {
                const cartItem = {
                    name: productName,
                    price: productPrice,
                    quantity: 1,
                };
                cartItems.push(cartItem);
            }
            localStorage.setItem('cart', JSON.stringify(cartItems));
            updateCartItemCount();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'your_php_script.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            const formData = new FormData();
            formData.append('productName', productName);
            formData.append('productPrice', productPrice);
            xhr.send(formData);
        }
    </script>
    <footer>
        <div class="footer-content" id="footer">
            <h3>BEAST</h3>
            <p>BEAST: Elevate Your Play. From inspiring apparel to tailored fitness programs, we empower you to conquer every moment, one rep at a time.</p>
            <div class="contact">
                Contact phone-number: +91 8789950364
            </div>
            <div class="footer-bottom">
                <p>Copyright &copy; 2024 BEAST. Designed by <span>BEAST</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
