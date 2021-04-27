<?php
  include('db.php'); 
  include('validation.php');
  session_start(); 
if ( !$_SESSION['login']){
    header('Location: login.php');
    die;
}
?>


<?php
$sql = "SELECT * FROM 'contact list'"; 
$result = mysqli_query($conn,$sql);
if(isset($_POST['submit'])){
    $Fname =  santString($_POST['Fname']);
    $Lname = santString($_POST['Lname']);
    $email = santEmail($_POST['email']);
    $adress = santString($_POST['adress']);
    $phone = santString($_POST['phone']);
    $group = santString($_POST['group']);



    $sql = "INSERT INTO `contacts` (`fname`,`lname`,`email`,`adress`,`phone`,`groupe`)
    VALUES ('$Fname','$Lname','$email','$adress' ,'$phone', '$group')  ";

    if(mysqli_query($conn, $sql)){
        header('Location: list.php');
    } else{
        echo "err".mysqli_error($conn);
    }
}

  ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="./add-person.php" method="post">
    <div class="background">
        <div class="logo">LOGO</div>
        <div class="data">
            <div class="first-name">
                <label for="firstname">First name</label>
                <input name="Fname" type="text" placeholder="first name...">
            </div>
            <div class="last-name">
                <label for="lastname">last name</label>
                <input name="Lname" type="text" placeholder="last name...">
            </div>
            <div class="email-user">
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="email...">
            </div>
            <div class="adress">
                <label for="adress">Adress</label>
                <input name="adress" type="text" placeholder="adress...">
            </div>
            <div class="phone">
                <label for="phone">Phone</label>
                <input name="phone" type="number" placeholder="phone...">
            </div>
           
            <div class="text">
                <label for="message">Note</label>
                <textarea name="message" placeholder="message..."></textarea>
            </div>
             <div class="choose">
                 <div class="family">
                    <input name="group" value="family" type="radio" id="Family">
                    <label for="Family">Family</label>
                 </div>
                 <div class="friend">
                    <input name="group" value="Friend" type="radio" id="Friend">
                    <label name="group" for="Friend">Friend</label> 
                 </div>                    
                 <div class="business">
                    <input name="group" value="Business" type="radio" id="Business">
                    <label name="group" for="Business">Business</label>       
                 </div>

            </div>
        </div>
    </div>
    <div class="footer">
        <div class="submit">
            <button name="submit" type="submit">submit</button>
        </div>
    </div>
    </form>
</body>
</html>