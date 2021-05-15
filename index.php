<?php
    session_start();
    include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
<style>
    .login{
        margin: auto;
        width: 240px;
        height: 270px;
        padding: 25px;
        border: 1px solid;
    }
    input[type=text]{
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 4px;
        border: 1px solid;
        text-align: center;
    }
    h3{
        text-align: center;
    }
    button{
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 4px;
        border: 1px solid;
        text-align: center;
        width: 120px;
        border-radius: 5px;
        background-color: lightblue;
    }
</style>
</head>
<body>
    <div class="login">
        <h3>Halaman Login</h3>
    <form method="post" >
        <center>
        <label>Username</label><br>
        <input type="text" name="fusername"><br>
        <label>Password</label><br>
        <input type="text" name="fpassword"><br>
        <button type="submit" name="fmasuk">Login</button>
        </center>
    </form>
    </div>
    <?php
        if (isset($_POST['fmasuk'])) {
            $username = $_POST['fusername'];
            $password = $_POST['fpassword'];
            echo $username;
            $qry = mysqli_query($koneksi, "SELECT * FROM tab_login WHERE username = '$username' AND password = '$password'");
            $cek = mysqli_num_rows($qry);
            if ($cek>0){
                $row = mysqli_fetch_assoc($qry);
                var_dump($row);
                $_SESSION['userweb']=$username;
                header ("location:admin.php");
                exit;
            }
        else {
            echo "Maaf username dan password yang anda masukkan salah";
        }
    }
    ?>
</body>
</html>