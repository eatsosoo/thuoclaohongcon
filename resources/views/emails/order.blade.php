<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://cdn.cmsfly.com/64252faf5d786b002ad3c138/jnnj-LbptCy.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-lg max-w-lg">
        <div class="text-center mb-6">
            {{-- <img src="/images/logo.png" alt="Logo" class="mx-auto h-16"> --}}
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Đơn hàng mới</h1>
        <div class="details mb-6">
            <p class="mb-2"><strong>Tên khách hàng:</strong> {{ $details['name'] }}</p>
            <p class="mb-2"><strong>Điện thoại:</strong> {{ $details['phone'] }}</p>
            <p class="mb-2"><strong>Địa chỉ:</strong> {{ $details['address'] }}</p>
            <p class="mb-2"><strong>Sản phẩm:</strong> {{ $details['product_name'] }}</p>
            <p class="mb-2"><strong>Số lượng:</strong> {{ $details['quantity'] }} lạng</p>
        </div>
        <div class="footer text-center text-gray-600 text-sm mt-6">
            <p>Cảm ơn bạn đã đặt hàng!</p>
        </div>
    </div>
</body>
</html>
