<?php
include 'db.php';

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>الرسائل الواردة</h2>";
echo "<table border='1'><tr><th>الاسم</th><th>البريد</th><th>الرسالة</th><th>التاريخ</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['message']}</td>
            <td>{$row['created_at']}</td>
          </tr>";
}
echo "</table>";

$conn->close();
?>
<p>
    <div class="top_link" style="text-align: center; margin-top: 20px;">
        <a href="index.html" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">الرجوع للصفحة الرئيسية</a>
    </div>
</p>