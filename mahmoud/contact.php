<?php
include 'db.php'; // الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        echo "✅ تم إرسال رسالتك بنجاح!";
    } else {
        echo "❌ حدث خطأ أثناء إرسال الرسالة: " . $conn->error;
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