<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات از فرم
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // اتصال به پایگاه داده
    $conn = new mysqli("localhost", "نام_کاربری_دیتابیس", "رمز_عبور_دیتابیس", "نام_دیتابیس");

    // بررسی اتصال
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // رمزگذاری رمز عبور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // آماده‌سازی و اجرای کوئری
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "ثبت‌نام با موفقیت انجام شد!";
    } else {
        echo "خطا: " . $sql . "<br>" . $conn->error;
    }

    // بستن اتصال
    $conn->close();
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        // Get form data
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);

        // Save the data (e.g., to a database or a file)
        // In this example, we'll save the data to a text file for simplicity
        $data = "First Name: $first_name, Last Name: $last_name, Email: $email, Phone: $phone\n";
        file_put_contents('signups.txt', $data, FILE_APPEND);

        // Display a confirmation message
        echo "<p>ثبت‌نام شما با موفقیت انجام شد. ما با شما تماس خواهیم گرفت.</p>";
    }
    
?>
