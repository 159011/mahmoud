<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("❌ يجب تسجيل الدخول لرؤية حجوزاتك.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM bookings WHERE user_id = ? ORDER BY date, time";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2 style='text-align: center; color: #333;'>حجوزاتي</h2>";
echo "<table style='width: 80%; margin: auto; border-collapse: collapse; text-align: center; font-family: Arial, sans-serif;'>
        <tr style='background-color: #007bff; color: white;'>
            <th style='padding: 10px; border: 1px solid #ddd;'>التاريخ</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>الوقت</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>الرياضة</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr style='background-color: #f9f9f9;'>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['date']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['time']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['sport']}</td>
          </tr>";
}

echo "</table>";

$stmt->close();
$conn->close();
?>✅ هذه الصفحة تعرض للمستخدم قائمة بجميع حجوزاته السابقة والمستقبلية.

<p>
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p><p>
<div style="text-align: center; margin-top: 20px;">
    <a href="activities.html#booking" id="bookingButton" 
       style="display: inline-block; padding: 10px 20px; background-color: #28a745; 
              color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        🔔 احجز موعد جديد
    </a>
</div>
</p>