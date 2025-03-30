<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "✅ تم تسجيل الدخول بنجاح!";
        } else {
            echo "❌ كلمة المرور غير صحيحة!";
        }
    } else {
        echo "❌ البريد الإلكتروني غير مسجل!";
    }

    $conn->close();
}
?>
<p>
    <div class="top_link" style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>