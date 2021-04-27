<!--------------------------------------------------------------------------------------------------------------------------------------
--------------------------------start login php---------------------------------------------------------------------------------------->
<?php 
 session_start();
include('db.php');
include('validation.php');

if(isset($_POST['submit'])){
    $email = santEmail($_POST['email']);
    $password = santString($_POST['password']);

    // $sql = "INSERT INTO 'login' ('email','phone')
    // VALUES ('$email','$phone')  ";
    $sql = "SELECT * FROM user WHERE `user-email`='$email'  LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        
        $row = mysqli_fetch_assoc($result);
        if( $row['user-password']=== $password){
            $_SESSION['email'] = $row['user-email'];
            $_SESSION['id'] = $row['user-id'];
            $_SESSION['login'] = TRUE;
            header('Location: list.php');
        } else{
            header('Location: login.php');
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <div class="logo">LOGO</div>
            <div class="title">WELCOME TITLE</div> 
    </div>
    <div class="content">
        <div class="first-section">
            <div class="sub-title">WELCOME sub_title</div>
            <div class="para">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    
                    molestiae perspiciatis neque praesentium aperiam sequi odit repudianda.
                </p>
            </div>
            <div class="read-more">
                <a href="./read">Read More</a>
            </div>
        </div>
        <div class="second-section">
            <div class="login">
                <div class="log">Login</div>
                <div class="border">
                    <form action="./login.php" method="post">
                        <div class="email">
                            <div class="label-email"><label for="email">Email</label></div>
                            <div class="input-email"><input name="email" type="email" placeholder="email...">       </div>
                        </div>
                        <div class="pw">
                            <div class="label-password"><label for="password">password</label></div>
                            <div class="input-password"><input name="password" type="password" placeholder="password..."> </div>
                        </div>
                    <div class="choose">
                        <div class="login-btn">
                            <button type="submit" name="submit">Login</button>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="remembre-me"> 
                            <label for="remembre-me">Remembre me</label>
                        </div>
                    </div> 
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>