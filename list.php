<?php
  include('db.php'); 
  include('validation.php');
  session_start(); 
if ( !$_SESSION['login']){
    header('Location: login.php');
    die;
}

//   DELETE

if(isset($_GET['id']) && isset($_GET['delete'])){
    $sql = "DELETE FROM contacts WHERE id = ". $_GET['id'];
    $result2 = mysqli_query($conn,$sql);
}



$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn,$sql);






// EDIT
if(isset($_GET['id'])){
    $sql = "UPDATE contacts SET fname='' , lname='' , email='' , adress='' , phone='' ,groupe=''  WHERE id = " .$_GET['id'];
    $result3 = mysqli_query($conn,$sql);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>
    <div class="container">
        <div class="logo">LOGO</div>
        <div class="bar">
            <div class="title-bar">My Web App</div>
            <div class="logout"><a href="./logout.php">Logout</a></div>
        </div>
        <div class="translate">
            <div class="search-add">
                <div class="search"><input type="text" placeholder="Search..."></div>
                <div class="add"><a href="add-person.php">Add a Person</a></div>
            </div>
        </div>
        <div class="contact">Contact list</div>
    </div>
    <div class="cont">        
        <div class="table">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Phone</th>
                    <th>Groupe</th>
                    <th>Action</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td><?= $row['id']?></td>
                                <td><?= $row['fname']?></td>
                                <td><?= $row['lname']?></td>
                                <td><?= $row['email']?></td>
                                <td><?= $row['adress']?></td>
                                <td><?= $row['phone']?></td>
                                <td><?= $row['groupe']?></td>
                                <td><a href="./edit-person.php?id=<?= $row['id']?>">Edit</a></td>
                                <td><a href="?id=<?= $row['id']?>&delete=1"><i class="fas fa-times-circle"></i></a></td>
                            </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>