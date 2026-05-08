<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منيو المطعم الملكي - النسخة النهائية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="https://remove.photos/cache/images/users/f66e5832-ef93-4ac5-b8f7-9f9bc7b61960/recommend-optimized.png" >
    <style>
        :root { --gold: #ffc107; --dark: #0f0f0f; --card: #1a1a1a; }
        body { font-family: 'Cairo', sans-serif; background-color: var(--dark); color: #fff; }

        /* النافبار */
        .navbar { background: rgba(0,0,0,0.95); border-bottom: 1px solid rgba(255,193,7,0.2); }
        .cart-icon { cursor: pointer; position: relative; }
        .badge-cart { background: var(--gold); color: #000; font-size: 0.7rem; }

        /* السلايدر */
        .hero-menu { height: 50vh; position: relative; overflow: hidden; }
        .carousel-item img { height: 50vh; object-fit: cover; filter: brightness(30%); }
        .hero-text { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; text-align: center; }

        /* فلاتر المنيو */
        .filter-btn { border-radius: 50px; border: 1px solid var(--gold); color: var(--gold); transition: 0.3s; margin: 5px; }
        .filter-btn.active, .filter-btn:hover { background: var(--gold); color: #000; }

        /* الكروت */
        .menu-item-card { background: var(--card); border-radius: 20px; border: 1px solid #2a2a2a; transition: 0.3s; height: 100%; }
        .menu-item-card:hover { transform: translateY(-8px); border-color: var(--gold); }
        .img-container { position: relative; height: 200px; overflow: hidden; border-radius: 20px 20px 0 0; }
        .img-container img { width: 100%; height: 100%; object-fit: cover; }
        .price-badge { position: absolute; top: 15px; right: 15px; background: var(--gold); color: #000; font-weight: bold; padding: 4px 12px; border-radius: 50px; }

        /* السلة */
        .modal-content { background: var(--card); border: 1px solid var(--gold); }
        .cart-item { border-bottom: 1px solid #333; padding: 10px 0; }
    </style>

    


</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="#">المطعم الملكي</a>
            <div class="d-flex align-items-center order-lg-last ms-3 cart-icon" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="fas fa-shopping-basket fs-3 text-warning"></i>
                <span id="cart-count" class="badge badge-cart position-absolute top-0 start-100 translate-middle rounded-pill">0</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="food.html">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link active" href="menu.php">المنيو</a></li>
                    <li class="nav-item"><a class="nav-link" href="offers.php">العروض</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-menu">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active"><img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=1200" class="d-block w-100"></div>
                <div class="carousel-item"><img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200" class="d-block w-100"></div>
            </div>
        </div>
        <div class="hero-text">
            <h1 class="display-3 fw-bold text-warning">قائمة الطعام</h1>
            <p class="fs-5 text-light">اختر وجبتك المفضلة من أجود المكونات</p>
        </div>
    </header>

    <div class="container my-5 text-center">
        <button class="btn filter-btn active" data-filter="all">الكل</button>
        <button class="btn filter-btn" data-filter="main">وجبات رئيسية</button>
        <button class="btn filter-btn" data-filter="drinks">مشروبات</button>
    </div>

    
<div class="container mb-5">
        <div class="row g-4" id="menu-items">
            
            <?php
            include 'db.php'; // استدعاء ملف الاتصال بالقاعدة

            // جلب البيانات من جدول meals
           $query = "SELECT * FROM meals WHERE category != 'offers'";
            $result = mysqli_query($conn, $query);

            // التحقق من وجود وجبات في القاعدة
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    // تحديد مسار الصورة من مجلد uploads
                    $imagePath = "uploads/" . $row['image'];
                    ?>

                    <div class="col-md-4 menu-item <?php echo $row['category']; ?>">
                        <div class="menu-item-card p-2">
                            <div class="img-container" style="position: relative; height: 200px; overflow: hidden; border-radius: 20px 20px 0 0;">
                                
                                <?php 
                                $file_ext = pathinfo($row['image'], PATHINFO_EXTENSION);
                                if ($file_ext == 'mp4' || $file_ext == 'webm'): 
                                ?>
                                    <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                                        <source src="<?php echo $imagePath; ?>" type="video/mp4">
                                    </video>
                                <?php else: ?>
                                    <img src="<?php echo $imagePath; ?>" loading="lazy" style="width: 100%; height: 100%; object-fit: cover;">
                                <?php endif; ?>

                                <span class="price-badge" style="position: absolute; top: 15px; right: 15px; background: #ffc107; color: #000; font-weight: bold; padding: 4px 12px; border-radius: 50px; z-index: 2;">
                                    <?php echo number_format($row['price']); ?> د.ع
                                </span>
                            </div>

                            <div class="p-3 text-center">
                                <h5 class="fw-bold"><?php echo $row['name']; ?></h5>
                                <p class="small text-secondary"><?php echo $row['description']; ?></p>
                                <button class="btn btn-warning w-100 rounded-pill add-btn" 
                                        data-name="<?php echo $row['name']; ?>" 
                                        data-price="<?php echo $row['price']; ?>">
                                    إضافة للسلة
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php 
                } 
            } else {
                // رسالة تظهر في حال كان المنيو فارغاً
                echo '<div class="col-12 text-center py-5"><p class="text-muted">لا توجد وجبات متوفرة حالياً في المنيو.</p></div>';
            }
            ?>

        </div>
    </div>



    </div>

    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content text-white">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-warning">طلبك الحالي</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="cart-body"></div>
                <div class="modal-footer border-secondary flex-column">
                    <div class="d-flex justify-content-between w-100 mb-3 fs-5 fw-bold">
                        <span>المجموع:</span>
                        <span id="total-price" class="text-warning">0</span>
                    </div>
                    <button class="btn btn-warning w-100 fw-bold">إرسال الطلب عبر واتساب</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let cart = JSON.parse(localStorage.getItem('royal_cart')) || [];
        renderCart();

        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelector('.filter-btn.active').classList.remove('active');
                btn.classList.add('active');
                const cat = btn.dataset.filter;
                document.querySelectorAll('.menu-item').forEach(item => {
                    item.style.display = (cat === 'all' || item.classList.contains(cat)) ? 'block' : 'none';
                });
            });
        });

        document.querySelectorAll('.add-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                cart.push({ name: btn.dataset.name, price: parseInt(btn.dataset.price) });
                saveCart();
            });
        });

        function removeItem(index) {
            cart.splice(index, 1);
            saveCart();
        }

        function saveCart() {
            localStorage.setItem('royal_cart', JSON.stringify(cart));
            renderCart();
        }

        function renderCart() {
            const body = document.getElementById('cart-body');
            const count = document.getElementById('cart-count');
            const total = document.getElementById('total-price');
            count.innerText = cart.length;
            let sum = 0;

            if(cart.length === 0) {
                body.innerHTML = '<p class="text-center text-muted">السلة فارغة</p>';
                total.innerText = "0 د.ع";
                return;
            }

            body.innerHTML = cart.map((item, index) => {
                sum += item.price;
                return `
                    <div class="cart-item d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 fw-bold">${item.name}</p>
                            <small class="text-warning">${item.price.toLocaleString()} د.ع</small>
                        </div>
                        <button class="btn btn-sm btn-outline-danger border-0" onclick="removeItem(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
            }).join('');
            total.innerText = sum.toLocaleString() + " د.ع";
        }
    </script>
</body>
</html>