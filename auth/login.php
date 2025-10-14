<?php
session_start();
include_once "../config/config.php"; // kết nối SQL Server

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT user_id, full_name, email, password, role_id 
            FROM Users 
            WHERE email = ?";
    $params = [$email];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($user) {
        $dbEmail = strtolower(trim($user['email']));
        $dbPass  = trim($user['password']);
        $inputEmail = strtolower(trim($email));
        $inputPass  = trim($password);

        if ($inputEmail === $dbEmail && $inputPass === $dbPass) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role_id'] = $user['role_id'];

            // ✅ Hiển thị SweetAlert thông báo thành công
            echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Đăng nhập thành công!',
                    text: 'Chào mừng bạn quay lại, " . addslashes($user['full_name']) . "!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = '../index.html';
                });
            </script>
            </body>
            </html>";
            exit();
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Sai mật khẩu!',
                          text: 'Vui lòng thử lại.',
                          confirmButtonText: 'OK'
                      }).then(() => {
                          window.location = '../login.html';
                      });
                  </script>";
            exit();
        }
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                  Swal.fire({
                      icon: 'warning',
                      title: 'Không tìm thấy tài khoản!',
                      text: 'Vui lòng kiểm tra lại email của bạn.',
                      confirmButtonText: 'OK'
                  }).then(() => {
                      window.location = '../login.html';
                  });
              </script>";
        exit();
    }
} else {
    header("Location: ../login.html");
    exit();
}
?>
