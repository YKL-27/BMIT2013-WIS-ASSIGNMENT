<?php
require '../../_base.php';

$_title = 'OUR PRODUCTS';
include '../../_head.php';

$stm = $_db->prepare("SELECT productID, productName, image FROM product ORDER BY productID DESC");
$stm->execute();
$products = $stm->fetchAll();
?>

<style>
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    .product-card {
        width: 200px;
        text-align: center;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: #fff;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: 250px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .product-card h3 {
        font-size: 16px;
        margin-top: 10px;
    }
</style>

<div class="product-container">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <a href="productDetails.php?id=<?= urlencode($product->productID) ?>">
                    <img src="<?= BASE_URL ?>image/<?= encode($product->image) ?>" alt="<?= encode($product->productName) ?>">
                    <h3><?= encode($product->productName) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products available.</p>
    <?php endif; ?>
</div>

<?php include '../../_foot.php'; ?>
