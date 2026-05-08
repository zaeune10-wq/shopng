<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // استعلام الحذف
    $sql = "DELETE FROM meals WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // بعد الحذف يرجعك للأدمن فوراً
        header("Location: admin.php?msg=deleted");
    } else {
        echo "خطأ أثناء الحذف: " . mysqli_error($conn);
    }
} else {
    header("Location: admin.php");
}
?>