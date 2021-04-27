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
if(!isset($_GET['id'])){
    die("Id not found!");
}

$id = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id=$id"; 
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $id =   $_POST['id'];
    $Fname =  santString($_POST['Fname']);
    $Lname = santString($_POST['Lname']);
    $email = santEmail($_POST['email']);
    $adress = santString($_POST['adress']);
    $phone = santString($_POST['phone']);
    $group = santString($_POST['group']);



    $sql = "UPDATE `contacts` SET `fname` = '$Fname', `lname` = '$Lname', `email` = '$email', `adress` = '$adress', `phone` = '$phone', `groupe` = '$group' WHERE id= $id";

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
    <form action="./edit-person.php?id=<?= $id ?>" method="post">
        <input type="hidden" value="<?= $row['id'] ?>" name="id">
    <div class="background">
        <div class="logo">LOGO</div>
        <div class="data">
            <div class="first-name">
                <label for="firstname">First name</label>
                <input name="Fname" type="text" value="<?= $row['fname'] ?>" placeholder="first name...">
            </div>
            <div class="last-name">
                <label for="lastname">last name</label>
                <input name="Lname" type="text" value="<?= $row['lname'] ?>" placeholder="last name...">
            </div>
            <div class="email-user">
                <label for="email">Email</label>
                <input name="email" type="email" value="<?= $row['email'] ?>" placeholder="email...">
            </div>
            <div class="adress">
                <label for="adress">Adress</label>
                <input name="adress" type="text" value="<?= $row['adress'] ?>" placeholder="adress...">
            </div>
            <div class="phone">
                <label for="phone">Phone</label>
                <input name="phone" type="number" value="<?= $row['phone'] ?>" placeholder="phone...">
            </div>
           
            <div class="text">
                <label for="message">Note</label>
                <textarea name="message" placeholder="message..."></textarea>
            </div>
             <div class="choose">
                 <div class="family">
                    <input name="group" <?php if($row['groupe'] == "family"){echo "checked='true'";} ?> value="family" type="radio" id="Family">
                    <label for="Family">Family</label>
                 </div>
                 <div class="friend">
                    <input name="group" <?php if($row['groupe'] == "Friend"){echo "checked='true'";} ?> value="Friend" type="radio" id="Friend">
                    <label name="group" for="Friend">Friend</label> 
                 </div>                    
                 <div class="business">
                    <input name="group" <?php if($row['groupe'] == "Business"){echo "checked='true'";} ?> value="Business" type="radio" id="Business">
                    <label name="group" for="Business">Business</label>       
                 </div>

            </div>
        </div>
    </div>
    <div class="footer">
        <div class="submit">
            <button name="update" type="submit">submit</button>
        </div>
    </div>
    </form>
</body>
</html>