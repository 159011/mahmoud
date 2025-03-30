<?php
session_start();
session_unset();  // إزالة جميع بيانات الجلسة
session_destroy(); // تدمير الجلسة

header("Location: login.html"); // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
exit();
?>