<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thuốc Lào Hồng Con</title>

        <link rel="icon" href="/img/icon.jpg" type="image/x-icon" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link rel="stylesheet" href="/build/assets/app-CYnQzG6J.css">
        <script src="/build/assets/app-BPnfBaih.js" defer></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 text-xl">
        <header class="bg-[url('https://cdn.cmsfly.com/64252faf5d786b002ad3c138/9-TysH66.png')] border-b-2 border-secondary section-bg">
            <div class="container text-white flex items-center justify-between py-6 px-12">
                <div>
                    <img src="/img/icon.jpg" alt="logo" class="size-16" />
                </div>
                <div class="flex gap-6">
                    <button id="menuButton" class="cursor-pointer hover:underline lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <div id="mb-menu" class="lg:hidden absolute right-0 top-0 bottom-0 left-0 bg-[#0000008f] hidden">
                        <div id="sidebar" class="bg-secondary p-6 w-[300px] h-full">
                            <div class="flex justify-between items-center mb-6">
                                <img src="/img/icon.jpg" alt="logo" class="size-10" />
                                <svg id="closeMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="mb-6">
                                <a href="/" class="cursor-pointer hover:underline">Trang chủ</a>
                            </div>
                            <div class="mb-6">
                                <a href="/about" class="cursor-pointer hover:underline">Về chúng tôi</a>
                            </div>
                            <div class="mb-6">
                                <a href="/product" class="cursor-pointer hover:underline">Sản phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div id="menu" class="hidden lg:flex flex-col lg:flex-row gap-6">
                        <a href="/" class="cursor-pointer hover:underline">Trang chủ</a>
                        <a href="/about" class="cursor-pointer hover:underline">Về chúng tôi</a>
                        <a href="/product" class="cursor-pointer hover:underline">Sản phẩm</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="bg-[url('https://cdn.cmsfly.com/64252faf5d786b002ad3c138/9-TysH66.png')] border-t-2 border-secondary section-bg">
            <div class="container text-white mx-auto px-6 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <img src="/img/icon.jpg" alt="logo" class="size-20" />
                        <p class="mt-4">©2024 thuoclaohongcon, <br>All rights reserved. </p>
                    </div>
                    <div>
                        <p class="text-2xl font-semibold">Cửa hàng</p>
                        <p class="text-lg mt-4 text-gray-300">Trang chủ</p>
                        <p class="text-lg mt-4 text-gray-300">Về chúng tôi</p>
                        <p class="text-lg mt-4 text-gray-300">Sản phẩm</p>
                    </div>
                    <div>
                        <p class="text-2xl font-semibold">Dịch vụ</p>
                        <a href="https://www.facebook.com/Thuoclaohongcon" target="_blank" class="text-lg mt-4 text-gray-300">Facebook</a>
                        <p class="text-lg mt-4 text-gray-300">0931579983 - 0934569770</p>
                        <p class="text-lg mt-4 text-gray-300">217 khu 4 thị trấn tiên lãng, huyện Tiên lãng , Thành phố Hải Phòng</p>
                    </div>
                    <div>
                        <p class="text-2xl font-semibold">Giở mở cửa</p>
                        <p class="text-lg mt-4 text-gray-300">Thứ 2 - Chủ nhật</p>
                        <p class="text-lg mt-4 text-gray-300">24/24</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal Form -->
        <div id="orderModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-[url('https://cdn.cmsfly.com/64252faf5d786b002ad3c138/jn-msocIJ.png')] text-sm p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-semibold mb-4 text-white">Đặt hàng</h2>
                <form id="send-mail-form" action="/send-mail" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-white">Tên người nhận</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-1 text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-white">Địa chỉ</label>
                        <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded mt-1 text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-white">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1 text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label for="product_name" class="block text-white">Sảm phẩm</label>
                        <input type="text" id="product_name" name="product_name" class="w-full p-2 border border-gray-300 rounded mt-1 text-gray-900" required readonly>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-white">Số lượng (lạng)</label>
                        <input type="number" id="quantity" name="quantity" class="w-full p-2 border border-gray-300 rounded mt-1 text-gray-900" value="1" min="1" required>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="flex justify-end">
                        <button id="btn-cancel" type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Hủy</button>
                        <button id="btn-confirm" type="submit" class="bg-secondary text-white px-4 py-2 rounded">Xác nhận</button>
                        <button id="btn-loader" type="button" class="bg-secondary text-white px-4 py-2 rounded w-24 hidden">
                            <div class="loader"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Scroll to Top Button -->
        <button class="scroll-to-top" id="scrollToTopBtn" title="Go to top">
            ↑
        </button>

        <script>
            function toggleModal(product) {
                const modal = document.getElementById('orderModal');
                modal.classList.toggle('hidden');
                document.getElementById('product_name').value = product;
            }

            function close() {
                const modal = document.getElementById('orderModal');
                modal.classList.add('hidden');
            }

            document.querySelectorAll('.btn-order').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const product = this.parentElement.querySelector('h3').textContent;
                    toggleModal(product);
                });
            });

            document.getElementById('btn-cancel').addEventListener('click', function() {
                close();
            });

            // document.getElementById('btn-confirm').addEventListener('click', function() {
            //     document.getElementById('btn-confirm').classList.add('hidden');
            //     document.getElementById('btn-loader').classList.remove('hidden');
            // });

            document.getElementById('send-mail-form').addEventListener('submit', function(event) {
                // event.preventDefault();
            });
        </script>

        <script>
            // Get the button
            var mybutton = document.getElementById("scrollToTopBtn");
            var menuButton = document.getElementById("menuButton");
            var closeMenu = document.getElementById("closeMenu");
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.classList.add("show");
                } else {
                    mybutton.classList.remove("show");
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            mybutton.onclick = function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };

            menuButton.onclick = function() {
                const menu = document.getElementById('mb-menu');
                const sidebar = document.getElementById('sidebar');
                menu.classList.toggle('hidden');
                sidebar.classList.add('open');
                document.body.style.overflow = 'hidden';
            };

            closeMenu.onclick = function() {
                const menu = document.getElementById('mb-menu');
                const sidebar = document.getElementById('sidebar');
                menu.classList.add('hidden');
                sidebar.classList.remove('open');
                document.body.style.overflow = 'auto';
            };
        </script>
    </body>
</html>
