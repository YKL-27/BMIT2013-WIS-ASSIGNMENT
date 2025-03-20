<?php
require '../../_base.php';

$productID = $_GET['id'];
$stm = $_db->prepare("SELECT productName, quantity, image, price, description FROM product WHERE productID = ?");
$stm->execute([$productID]);
$product = $stm->fetch();

$_title = $product->productName;
include '../../_head.php';
?>

<style>
    .product-container {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        max-width: 900px;
        margin: auto;
        padding: 20px;
        border: 2px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        flex: 1;
        max-width: 350px;
        height: 350px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: #999;
        background-color: #f8f8f8;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info {
        flex: 2;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .product-info h2 {
        font-size: 24px;
        margin: 0;
    }

    .product-info .price {
        font-size: 20px;
        font-weight: bold;
        color: #e74c3c;
    }

    .product-info .description {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
        background-color: #f9f9f9;
        max-width: 400px;
    }

    .product-info .description p {
        margin: 5px 0;
    }

    .button-container {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    justify-content: center;
    }

.button-container a,
.button-container button {
    flex: 1;
    padding: 12px 20px;
    font-size: 18px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    text-align: center;
    transition: all 0.3s ease;
    }

.add-to-cart {
    background-color: #3498db;
    color: white;
    text-decoration: none;
    }

.add-to-cart:hover {
    background-color: #217dbb;
    }

.buy-now {
    background-color: #e74c3c;
    color: white;
    }

.buy-now:hover {
    background-color: #c0392b;
    }
</style>

<div class="product-container">
    <div class="product-image">
        <img src="<?= BASE_URL ?>image/<?= encode($product->image) ?>" alt="<?= encode($product->productName) ?>">
    </div>

    <div class="product-info">
        <h2><?= encode($product->productName) ?></h2>
        <p class="price">RM<?= number_format($product->price, 2) ?></p>

        <div class="description">
            <?= nl2br(encode($product->description)) ?>
        </div>

        <div class="button-container">
            <a href="cart.php?add=<?= $productID ?>" class="add-to-cart">ADD TO CART</a>
            <button class="buy-now">BUY NOW</button>
        </div>
    </div>
</div>

<?php include '../../_foot.php'; ?>
