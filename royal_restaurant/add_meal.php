<?php
include 'db.php'; // تأكد أن ملف db.php يحتوي على معلومات localhost

if (isset($_POST['submit'])) {
    $name = $_POST['meal_name'];
    $price = $_POST['meal_price'];
    $category = $_POST['category'];
    $desc = $_POST['description'];

    // معالجة رفع الصورة
    $image_name = $_FILES['meal_image']['name'];
    $image_tmp = $_FILES['meal_image']['tmp_name'];
    $upload_dir = "uploads/";

    // نقل الصورة من الذاكرة المؤقتة إلى مجلد uploads بجهازك
    if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
        
        // إدخال البيانات في الجدول
        $sql = "INSERT INTO meals (name, description, price, category, image) 
                VALUES ('$name', '$desc', '$price', '$category', '$image_name')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('تمت إضافة الوجبة بنجاح'); window.location.href='admin.php';</script>";
        } else {
            echo "خطأ في الإضافة: " . mysqli_error($conn);
        }
    } else {
        echo "فشل رفع الصورة.";
    }
}
?>
