<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sport = $_POST['sport'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // التحقق مما إذا كان البريد الإلكتروني مسجلاً بالفعل
    $check_email = "SELECT * FROM coaches WHERE email=?";
    $stmt = $conn->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "❌ هذا المدرب مسجل بالفعل!";
    } else {
        // إدخال بيانات المدرب الجديد
        $sql = "INSERT INTO coaches (name, sport, phone, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $sport, $phone, $email);
        
        if ($stmt->execute()) {
            echo "✅ تم إضافة المدرب بنجاح!";
        } else {
            echo "❌ حدث خطأ أثناء الإضافة: " . $conn->error;
        }
    }
    
    $stmt->close();
    $conn->close();
}
?><p>
    <div class="top_link" style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>