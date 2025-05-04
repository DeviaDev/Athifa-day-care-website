<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - AthifaDayCare</title>

    <link rel="icon" href="Images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style/main.css">

    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Agbalumo&family=Hedvig+Letters+Serif:opsz@12..24&family=Libre+Baskerville:ital@1&family=Merriweather:ital,wght@0,300;1,300&family=Noto+Sans+Kawi&family=Playfair+Display&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Ubuntu+Condensed&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="login_main">

<?php 
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password'] );

    $query = mysqli_query($connection, "select* from login_anak where username='$username' and password='$password'");

    if(mysqli_num_rows($query)>0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        echo '<script>alert("Selamat datang mama '.$data['username'].' di fitur kontrol si kecil"); 
        location.href="user_dashboard.php";
        </script>';
    }else{
        echo '<script>alert("Username atau Password tidak sesuai");</script>';
    }
}

?>

    <!-- Navbar Start -->
    <nav class="navbar">

        <div class="logo">
        <a href="#"><img src="Images/logo.png" alt="logo"></a>
        </div>
        <div class="navbar-nav">
                <a href="Beranda.php">Beranda</a>
                <a href="Tentang.php">Tentang</a>
                <a href="Program.php">Program</a>
                <a href="Daftar.php">Daftar</a>
                <a href="Hubungikami.php">Hubungi Kami</a>
                <a href="Login.php"><button class="my-button">Login</button></a>
        </div>
            
        </nav>
    <!-- Navbar end -->



    <!-- Login Section Start  -->
     <div class="login-all">

        <div class="login">
            
            <form action="check_login.php" method="POST">
                <h1>LOGIN</h1>

            <div class="input">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bx-lock'></i>
            </div>

            <div class="remember">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Login</button>
            </form>

        </div>

    </div>
    <!-- Login Section End -->

 
</body>

</html>


















