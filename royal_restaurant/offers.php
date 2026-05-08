<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>العروض الخاصة - المطعم الملكي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="https://remove.photos/cache/images/users/f66e5832-ef93-4ac5-b8f7-9f9bc7b61960/recommend-optimized.png" >
    
    
    
    <style>
        body { background-color: #0f0f0f; color: white; font-family: 'Cairo', sans-serif; }
        .offer-badge { position: absolute; top: 10px; left: 10px; background: red; color: white; padding: 5px 15px; border-radius: 5px; font-weight: bold; z-index: 3; }
    </style>
</head>
<body>

<div class="container py-5">
    <h1 class="text-center text-warning mb-5 fw-bold">🔥 أقوى العروض الملكية 🔥</h1>

    <div class="row g-4">
        <?php
        include 'db.php';
        
        // جلب الوجبات التي صنفها 'offers' فقط
        $query = "SELECT * FROM meals WHERE category = 'offers' ORDER BY id DESC";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $imagePath = "uploads/" . $row['image'];
        ?>
            <div class="col-md-4">
                <div class="menu-item-card p-2" style="background: #1a1a1a; border: 1px solid #ffc107; border-radius: 20px; position: relative;">
                    <span class="offer-badge">عرض لفترة محدودة</span>
                    
                    <div class="img-container" style="height: 200px; overflow: hidden; border-radius: 15px;">
                        <img src="<?php echo $imagePath; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="p-3 text-center">
                        <h4 class="fw-bold text-warning"><?php echo $row['name']; ?></h4>
                        <p class="text-secondary small"><?php echo $row['description']; ?></p>
                        <h5 class="text-white fw-bold"><?php echo number_format($row['price']); ?> د.ع</h5>
                        <button class="btn btn-warning w-100 rounded-pill mt-2 add-btn" 
                                data-name="<?php echo $row['name']; ?>" 
                                data-price="<?php echo $row['price']; ?>">
                            إضافة للعرض
                        </button>
                    </div>
                </div>
            </div>
        <?php 
            }
        } else {
            echo '<div class="col-12 text-center"><h3>لا توجد عروض حالياً، انتظرونا قريباً!</h3></div>';
        }
        ?>
    </div>
</div>

</body>
</html>