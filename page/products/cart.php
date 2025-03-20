<?php
require '../../_base.php';

// 检查是否已登录，未登录则跳转至 login.php
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

// 处理 "Add to Cart" 请求
if (isset($_GET['add'])) {
    $productID = $_GET['add'];
    $cart = get_cart();
    $cart[$productID] = ($cart[$productID] ?? 0) + 1;
    set_cart($cart);
    header('Location: cart.php'); // 防止重复提交
    exit();
}

$_title = 'MY CART';
include '../../_head.php';

$is_logged_in = isset($_SESSION['user']);
$cart = get_cart();
?>

<style>
/* cart page button >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
.cartEmpty-buttons {
    display: flex;
    gap: 150px;
}

.cartEmpty-buttons a {
    display: inline-block;
    padding: 10px 20px;
    background-color: blue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 25px;
}

.cartEmpty-buttons a:hover {
    background-color: darkblue;
}

/* empty cart content >>>>>>>>>>>>>>>>>>>>>>>>>> */
.cart-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 70vh;
    text-align: center;
    font-size: 30px;
    gap: 30px;
}

/* cart content >>>>>>>>>>>>>>>>>>>>>>>>>> */
.cart-table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
}

.cart-table th, .cart-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.cart-table th {
    background-color: #f4f4f4;
}

.cart-actions {
    text-align: center;
    margin-top: 20px;
}

.cart-actions a {
    padding: 10px 20px;
    background-color: green;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 20px;
}

.cart-actions a:hover {
    background-color: darkgreen;
}
</style>

<div class="cart-container">
    <?php if (!empty($cart)): ?>
        <h1>Your Shopping Cart</h1>
        <table class="cart-table">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cart as $id => $qty): ?>
                <tr>
                    <td><?= htmlspecialchars($id) ?></td>
                    <td><?= $qty ?></td>
                    <td><a href="cart.php?remove=<?= $id ?>" style="color: red;">Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="cart-actions">
            <a href="checkout.php">Proceed to Checkout</a>
        </div>
        
    <?php else: ?>
        <img src="<?= BASE_URL ?>image/cartPicture.png" style="width: 100px; height: auto;">
        <h1>YOUR CART IS EMPTY</h1>

        <?php 
        if ($is_logged_in) {
            echo "<p>Oops! You haven’t added an Epal Aifon yet. Check out the newest series and pick your favorite!</p>";
        } else {
            echo "<p>Login to your Epal account to view your saved items or continue shopping</p>";
        }
        ?>

        <div class="cartEmpty-buttons">
            <a href="../../index.php">Continue Shopping</a>

            <?php 
                if (!$is_logged_in) {
                    echo '<a href="../login.php">Login</a>';
                }
            ?>
        </div>
    <?php endif; ?>
</div>

<?php
include '../../_foot.php';
?>
