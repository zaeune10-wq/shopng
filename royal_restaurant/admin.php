<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - المطعم الملكي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #0f0f0f; color: #fff; padding-top: 50px; }
        .admin-card { background: #1a1a1a; border: 1px solid #ffc107; border-radius: 20px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .form-control, .form-select { background: #222; border: 1px solid #333; color: #fff; }
        .form-control:focus { background: #252525; color: #fff; border-color: #ffc107; box-shadow: none; }
        label { color: #ffc107; margin-bottom: 8px; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="admin-card">
                <h2 class="text-center text-warning mb-4 fw-bold">إضافة وجبة ملكية جديدة</h2>
                
                <form action="add_meal.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label>اسم الوجبة</label>
                        <input type="text" name="meal_name" class="form-control" placeholder="مثلاً: كباب ملكي" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>السعر (بالدينار)</label>
                            <input type="number" name="meal_price" class="form-control" placeholder="15000" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>التصنيف</label>
                            <select name="category" class="form-select">
                                <option value="main">وجبات رئيسية</option>
                                <option value="drinks">مشروبات</option>
                                <option value="offers">عروض خاصة</option>
                            </select>
                        </div>
                    </div>

                            <a href="delete_meal.php?id=<?php echo $row['id']; ?>" 
                         onclick="return confirm('هل أنت متأكد من حذف هذه الوجبة؟')" 
                             class="btn btn-danger btn-sm">
                             حذف الوجبة
                                </a>





                    <div class="mb-3">
                        <label>وصف الوجبة</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="اكتب وصفاً يشهي الزبائن..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label>صورة الوجبة (أو فيديو)</label>
                        <input type="file" name="meal_image" class="form-control" accept="image/*,video/*" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-warning w-100 fw-bold py-2 rounded-pill">
                        نشر الوجبة في المنيو
                    </button>
                </form>
            </div>
            
            <div class="text-center mt-4">
                <a href="food.html" class="text-secondary text-decoration-none">← العودة للموقع الرئيسي</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>