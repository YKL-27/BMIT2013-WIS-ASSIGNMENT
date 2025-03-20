<?php
require '../../_base.php';
//-----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
$_title = 'MY CART';
include '../../_head.php';
$is_logged_in = isset($_SESSION['user']);
$cart = get_cart();
?>

<style>
    /* cart page button >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
.cartEmpty-buttons{
    display: flex;
    gap: 150px;
}

.cartEmpty-buttons a{
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
</style>

<div class="cart-container">
    <?php if (!empty($cart)): ?>

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
                    echo '<a href="../member/login.php">Login</a>';
                }
            ?>
        </div>
    <?php endif; ?>
</div>

<?php
include '../../_foot.php';