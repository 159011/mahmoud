<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "❌ البريد الإلكتروني مستخدم بالفعل!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "✅ تم إنشاء الحساب بنجاح!";
        } else {
            echo "❌ خطأ: " . $conn->error;
        }
    }

    $conn->close();
}
?>
<p>
    <div class="top_link" style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>