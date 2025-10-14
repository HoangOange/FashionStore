<?php
// ⚙️ Kết nối SQL Server bằng Windows Authentication (Integrated Security)
$serverName = "localhost"; // hoặc "localhost\\MSSQLSERVER01" nếu bạn dùng instance đó

$connectionInfo = [
    "Database" => "FashionStore",
    "CharacterSet" => "UTF-8"
];

// Kết nối
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Kiểm tra
if ($conn) {
    echo "✅ Kết nối SQL Server bằng Windows Authentication thành công!";
} else {
    echo "❌ Lỗi kết nối:<br>";
    die(print_r(sqlsrv_errors(), true));
}
?>
