<x-guest-layout>
    <section class="bg-[url('https://cdn.cmsfly.com/64252faf5d786b002ad3c138/frame-1000007408-o76FCZ.png')] section-bg">
        <div class="container py-10 text-white text-center min-h-[calc(100vh-25rem)]">
            <div class="mb-5">Đơn đặt hàng</div>
            <div class="flex justify-center">
                <table class="border-collapse border border-secondary rounded-md text-sm">
                    <thead>
                        <tr>
                            <th class="border border-secondary p-4">STT</th>
                            <th class="border border-secondary p-4">Khách hàng</th>
                            <th class="border border-secondary p-4">Địa chỉ</th>
                            <th class="border border-secondary p-4">Số điện thoại</th>
                            <th class="border border-secondary p-4">Sản phẩm</th>
                            <th class="border border-secondary p-4">Số lượng</th>
                            <th class="border border-secondary p-4">Ngày đặt hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders['data'] as $order)
                            <tr>
                                <td class="border border-secondary p-4">{{ $order['id'] }}</td>
                                <td class="border border-secondary p-4">{{ $order['name'] }}</td>
                                <td class="border border-secondary p-4">{{ $order['address'] }}</td>
                                <td class="border border-secondary p-4">{{ $order['phone'] }}</td>
                                <td class="border border-secondary p-4">{{ $order['product_name'] }}</td>
                                <td class="border border-secondary p-4">{{ $order['quantity'] }}</td>
                                <td class="border border-secondary p-4">{{ \Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>     
            </div>
            <div class="pagination flex justify-center mt-5 text-sm">
                <a href="{{ $orders['first_page_url'] }}" class="btn-paginate"><<</a>
                <a href="{{ $orders['prev_page_url'] }}" class="btn-paginate"><</a>
                <span class="btn-paginate">{{ $orders['current_page'] }}</span>
                <a href="{{ $orders['next_page_url'] }}" class="btn-paginate">></a>
                <a href="{{ $orders['last_page_url'] }}" class="btn-paginate">>></a>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="pinModal" class="fixed inset-0 flex items-center justify-center bg-black hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-black text-center">
            <h2 class="text-xl mb-4">Nhập mã PIN</h2>
            <form id="pinForm">
                <div class="flex justify-center mb-4">
                    @for ($i = 0; $i < 6; $i++)
                        <input type="password" maxlength="1" class="pin-input p-2 border rounded-md mx-1 text-center w-10" required>
                    @endfor
                </div>
                <div id="error" class="text-[rgb(233,70,73)] mb-4 text-lg"></div>
                <button type="submit" class="bg-secondary px-4 py-2 rounded-lg">Xác nhận</button>
            </form>
        </div>
    </div>

    <style>
        .pin-input {
            font-size: 1.5rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var pinModal = document.getElementById('pinModal');
            var pinInputs = document.querySelectorAll('.pin-input');
            var pinForm = document.getElementById('pinForm');

            pinModal.classList.remove('hidden');

            pinInputs.forEach((input, index) => {
                input.addEventListener('input', function () {
                    if (input.value.length === 1 && index < pinInputs.length - 1) {
                        pinInputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function (event) {
                    if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
                        pinInputs[index - 1].focus();
                    }
                });
            });

            pinForm.addEventListener('submit', function (event) {
                event.preventDefault();
                var pin = Array.from(pinInputs).map(input => input.value).join('');

                if (pin === '{{ $pin }}') {
                    pinModal.classList.add('hidden');
                } else {
                    document.getElementById('error').innerHTML = 'Mã PIN không đúng';
                    pinInputs.forEach(input => input.value = '');
                    pinInputs[0].focus();
                }
            });
        });
    </script>
</x-guest-layout>
