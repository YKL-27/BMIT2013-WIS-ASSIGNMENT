<?php
require '_base.php';

$query = $_GET['query'] ?? ''; // get the keyword
$products = [];

if ($query) {
    $stm = $_db->prepare("SELECT * FROM product WHERE productName LIKE ? OR description LIKE ?");
    $searchTerm = "%$query%";
    $stm->execute([$searchTerm, $searchTerm]);
    $products = $stm->fetchAll();
}

$_title = 'Search Results';
include '_head.php';
?>

<style>
    .container {
        text-align: center;
        padding: 20px;
    }

    .product-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .product-card {
        width: 250px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        background-color: #fff;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .product-card h3 {
        margin: 10px 0;
        font-size: 18px;
    }

    .product-card .price {
        font-size: 16px;
        font-weight: bold;
        color: #e74c3c;
    }

    .no-results {
        font-size: 18px;
        color: #888;
        margin-top: 20px;
    }
</style>

<div class="container">
    <?php if (empty($products)): ?>
        <div class="no-results">
            <img src="<?= BASE_URL ?>image/findNoResult.png" style="width: 100px; height: auto;">
        </div>
    <?php endif; ?>

    <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>

    <?php if (!empty($products)): ?>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?= BASE_URL ?>image/<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->productName) ?>">
                    <h3><?= htmlspecialchars($product->productName) ?></h3>
                    <p class="price">RM<?= number_format($product->price, 2) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-results">No results found.</p>
    <?php endif; ?>
</div>

<?php include '_foot.php'; ?>
