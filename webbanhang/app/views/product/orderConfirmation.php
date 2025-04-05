<?php include 'app/views/shares/header.php'; ?>

<div class="confirmation-container">
    <div class="confirmation-content">
        <h1 class="text-center text-success">✅ Xác nhận đơn hàng</h1>
        <p class="text-center">🎉 Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được xử lý thành công.</p>
        <div class="text-center">
            <a href="/Product/" class="btn btn-primary mt-3">🛍️ Tiếp tục mua sắm</a>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    /* Nền gradient xanh nhẹ */
    body {
        background: linear-gradient(to bottom right, #d4faff, #b3ecff);
    }

    .confirmation-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;
    }

    .confirmation-content {
        width: 50%;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        transition: transform 0.2s ease-in-out;
    }

    /* Hiệu ứng hover */
    .confirmation-content:hover {
        transform: scale(1.02);
    }

    .btn-primary {
        background: #007bff;
        border: none;
        font-size: 16px;
        font-weight: bold;
        transition: 0.3s;
        padding: 10px 20px;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .confirmation-content {
            width: 90%;
        }

        .btn {
            font-size: 14px;
        }
    }
</style>
