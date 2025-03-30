<?php
include 'db.php';

$sql = "SELECT * FROM coaches ORDER BY sport, name";
$result = $conn->query($sql);

echo "<h2 style='text-align: center; color: #333;'>قائمة المدربين</h2>";
echo "<table style='width: 80%; margin: auto; border-collapse: collapse; text-align: center; font-family: Arial, sans-serif;'>
        <tr style='background-color: #007bff; color: white;'>
            <th style='padding: 10px; border: 1px solid #ddd;'>الاسم</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>التخصص الرياضي</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>رقم الهاتف</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>البريد الإلكتروني</th>
            <th style='padding: 10px; border: 1px solid #ddd;'>إجراءات</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr style='background-color: #f9f9f9;'>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['name']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['sport']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['phone']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>{$row['email']}</td>
            <td style='padding: 10px; border: 1px solid #ddd;'>
                <a href='delete_coach.php?id={$row['id']}' style='color: red; text-decoration: none; font-weight: bold;'>حذف</a>
            </td>
          </tr>";
}

echo "</table>";

$conn->close();
?><p>
    <div style="text-align: center; margin-top: 20px;">
        <a href="add_coach.html" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-right: 10px;">إضافة مدرب</a>
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>