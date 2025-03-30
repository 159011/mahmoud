<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM coaches WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "✅ تم حذف المدرب بنجاح!";
    } else {
        echo "❌ حدث خطأ أثناء الحذف: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}

// إعادة التوجيه إلى الصفحة الرئيسية بعد الحذف
header("Location: coaches.php");
exit();
?>