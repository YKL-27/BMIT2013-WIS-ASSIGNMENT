<?php
require '_base.php';

$query = $_GET['query'] ?? ''; // search keywords
$minPrice = $_GET['minPrice'] ?? 0;
$maxPrice = $_GET['maxPrice'] ?? 10000;
$selectedRAM = $_GET['ram'] ?? []; // filter ram
$selectedStorage = $_GET['storage'] ?? []; //filter storage
$products = [];

$sql = "SELECT * FROM product WHERE (productName LIKE ? OR description LIKE ?) AND price BETWEEN ? AND ?";
$params = ["%$query%", "%$query%", $minPrice, $maxPrice];

if (!empty($selectedRAM)) {
    $placeholders = implode(',', array_fill(0, count($selectedRAM), '?'));
    $sql .= " AND (" . implode(" OR ", array_map(fn() => "description LIKE ?", $selectedRAM)) . ")";
    foreach ($selectedRAM as $ram) {
        $params[] = "%Memory: $ram%";
    }
}

if (!empty($selectedStorage)) {
    $sql .= " AND (" . implode(" OR ", array_map(fn() => "description LIKE ?", $selectedStorage)) . ")";
    foreach ($selectedStorage as $storage) {
        $params[] = "%Storage: $storage%";
    }
}

$stm = $_db->prepare($sql);
$stm->execute($params);
$products = $stm->fetchAll();

$_title = 'Search Results';
include '_head.php';
?>

<style>
    .container {
        display: flex;
        padding: 20px;
    }

    .filter-header {
        display: flex;
        align-items: center; 
        gap: 8px;
    }

    .filter-section {
        width: 250px;
        padding: 20px;
        border-right: 2px solid #ddd;
        text-align: center;
    }

    .filter-header img {
        width: 30px;
        height: auto;
        margin-bottom: 10px;
    }

    .filter-section label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .price-inputs {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    .price-inputs input {
        width: 80px;
        padding: 5px;
        text-align: center;
    }

    .filter-group {
        text-align: left;
        margin-top: 10px;
    }

    .filter-group label {
        display: block;
    }

    .product-container {
        flex: 1;
        padding-left: 15px;
    }

    .no-results {
        text-align: center;
        margin-top: 20px;
    }

    .no-results img {
        width: 150px;
        height: auto;
        margin-bottom: 10px;
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
        height: 150px;
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

    .filter-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 15px;
    }

.apply-btn, .reset-btn {
    flex: 1;
    padding: 8px 15px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    }

.apply-btn {
    background-color: blue;
    color: white;
    }

.reset-btn {
    background-color:red;
    color: white;
    }

.apply-btn:hover {
    background-color: #0056b3;
    }

.reset-btn:hover {
    background-color: #d32f2f;
    }

    .product-link {
    text-decoration: none;
    color: inherit;
    }

.product-link:hover .product-card {
    transform: scale(1.05);
    transition: transform 0.2s ease-in-out;
    }
</style>

<div class="container">
    <div class="filter-section">   
        <div class="filter-header">
            <img src="<?= BASE_URL ?>image/filter-icon.png" alt="Filter">
            <h1>Filter</h1>
        </div>
        <form method="GET" action="">
            <input type="hidden" name="query" value="<?= encode($query) ?>">
            
            <label>Price Range (RM)</label>
            <div class="price-inputs">
                <input type="number" id="min-price" name="minPrice" value="<?= encode($minPrice) ?>" min="0" max="10000">
                <span>to</span>
                <input type="number" id="max-price" name="maxPrice" value="<?= encode($maxPrice) ?>" min="0" max="10000">
            </div>

            <div class="filter-group">
                <label>RAM</label>
                <label><input type="checkbox" name="ram[]" value="4GB" <?= in_array('4GB', $selectedRAM) ? 'checked' : '' ?>> 4GB</label>
                <label><input type="checkbox" name="ram[]" value="6GB" <?= in_array('6GB', $selectedRAM) ? 'checked' : '' ?>> 6GB</label>
                <label><input type="checkbox" name="ram[]" value="8GB" <?= in_array('8GB', $selectedRAM) ? 'checked' : '' ?>> 8GB</label>
            </div>

            <div class="filter-group">
                <label>Storage</label>
                <label><input type="checkbox" name="storage[]" value="128GB" <?= in_array('128GB', $selectedStorage) ? 'checked' : '' ?>> 128GB</label>
                <label><input type="checkbox" name="storage[]" value="256GB" <?= in_array('256GB', $selectedStorage) ? 'checked' : '' ?>> 256GB</label>
                <label><input type="checkbox" name="storage[]" value="1TB" <?= in_array('1TB', $selectedStorage) ? 'checked' : '' ?>> 1TB</label>
            </div>

            <div class="filter-buttons">
                <button type="submit" class="apply-btn">Apply</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>

    <div class="product-container">
        <h2>Search Results for "<?= encode($query) ?>"</h2>

        <?php if (empty($products)): ?>
            <div class="no-results">
                <img src="<?= BASE_URL ?>image/findNoResult.png">
                <p>No results found.</p>
            </div>
        <?php else: ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <a href="<?= BASE_URL ?>page/products/productDetails.php?id=<?= $product->productID ?>" class="product-link">
                        <div class="product-card">
                            <img src="<?= BASE_URL ?>image/<?= encode($product->image) ?>" alt="<?= encode($product->productName) ?>">
                            <h3><?= encode($product->productName) ?></h3>
                            <p class="price">RM<?= number_format($product->price, 2) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="<?= BASE_URL ?>js/app.js"></script>

<?php include '_foot.php'; ?>
