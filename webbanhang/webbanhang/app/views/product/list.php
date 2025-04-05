<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <div class="alert alert-info text-center" role="alert">
        🎉 Giảm giá 50% cho sinh viên từ ngày 1/6 đến 31/8! 🎉
    </div>

    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>

    <?php $categoryParam = isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : ''; ?>

<?php if (isset($_GET['category_id'])): ?>
    <?php $category = $this->categoryModel->getCategoryById($_GET['category_id']); ?>
    <h3 class="text-center">Sản phẩm thuộc danh mục: <?= htmlspecialchars($category->name) ?></h3>
<?php endif; ?>

<div class="row mb-3">
    <!-- Sắp xếp theo -->
    <div class="col-md-6">
        <div class="card p-3 shadow-sm">
            <h6 class="text-uppercase text-custom mb-2">SẮP XẾP THEO:</h6>
            <div class="d-flex">
                <a href="?sort=high<?= $categoryParam ?>" class="btn btn-outline-danger me-2">🔻 Giá cao</a>
                <a href="?sort=low<?= $categoryParam ?>" class="btn btn-outline-secondary">🔺 Giá thấp</a>
            </div>
        </div>
    </div>

    <!-- Lọc theo giá -->
    <div class="col-md-6">
        <div class="card p-3 shadow-sm text-end">
            <h6 class="text-uppercase text-custom mb-2">CHỌN MỨC GIÁ:</h6>
            <form method="GET" action="" class="d-flex justify-content-end align-items-center">
                <?php if (isset($_GET['category_id'])): ?>
                    <input type="hidden" name="category_id" value="<?= htmlspecialchars($_GET['category_id']) ?>">
                <?php endif; ?>
                <select name="price_range" id="price_range" class="form-select w-auto">
                    <option value="">Tất cả</option>
                    <option value="0-2000000">Dưới 2 triệu</option>
                    <option value="2000000-4000000">Từ 2 - 4 triệu</option>
                    <option value="4000000-7000000">Từ 4 - 7 triệu</option>
                    <option value="7000000-13000000">Từ 7 - 13 triệu</option>
                    <option value="13000000-20000000">Từ 13 - 20 triệu</option>
                    <option value="20000000-999999999">Trên 20 triệu</option>
                </select>
                <button type="submit" class="btn btn-primary ms-2">Lọc</button>
            </form>
        </div>
    </div>
</div>




    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4">
                    <div class="card product-card h-100">
                        <?php if ($product->image): ?>
                            <img src="/<?php echo $product->image; ?>" class="card-img-top" alt="Product Image">
                        <?php else: ?>
                            <img src="/uploads/default-image.jpg" class="card-img-top" alt="Product Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/Product/show/<?php echo $product->id; ?>" class="text-decoration-none">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text"><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> đ
                            <p class="card-text"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <a href="/Product/show/<?php echo $product->id; ?>" class="btn btn-info">Xem</a>
                                <a href="/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
                                <a href="/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'user')): ?>
                                <a href="/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có sản phẩm trong danh mục này.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    body {
        background: linear-gradient(to right, #d4fcf7, #a0c4ff);
        font-family: 'Arial', sans-serif;
    }
    .product-card {
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .card-footer {
        background: #f8f9fa;
    }

    /* Điều chỉnh giao diện cho mobile */
    @media (max-width: 768px) {
        .d-flex.align-items-center {
            flex-direction: column;
        }
        .d-flex.align-items-center select,
        .d-flex.align-items-center button {
            width: 100%;
            margin-top: 5px;
        }
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
