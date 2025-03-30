<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("❌ يجب تسجيل الدخول أولاً لإجراء الحجز.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $sport = $_POST['sport'];

    $sql = "INSERT INTO bookings (user_id, date, time, sport) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id, $date, $time, $sport);
    
    if ($stmt->execute()) {
        echo "<script>alert('✅ تم الحجز بنجاح!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ حدث خطأ أثناء الحجز: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<p>
    <div class="top_link" style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>