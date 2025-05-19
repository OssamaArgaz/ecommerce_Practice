<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Ecommerce</title>
</head>
<body>
    

<?php include 'includes/nav.php'?>

<div class="container pt-5">
    <?php
        if(isset($_POST['connexion'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            if(!empty($login) && !empty($password)){
                require_once 'includes/database.php';
                $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=? AND password=?');
                $sqlState->execute([$login, $password]);
                if($sqlState->rowCount() >=1){
                    session_start();
                    $_SESSION['utilisateur'] = $sqlState->fetch();
                    header('location:admin.php');
                }else{
                    echo "login ou password incorect, veuiller entrer valid info.";
                }
            }else{
    ?>
                <div class="alert alert-danger" role="alert">
                    les info sont obligatoires
                </div>
    <?php 
            }
        }
    ?>
    <h2>Connexion</h2>
    <form action="" method="post">
        <label for="inputLogin5" class="form-label">login</label>
        <input type="text" name="login" id="inputLogin5" class="form-control" aria-describedby="passwordHelpBlock"> 


        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">

        <input type="submit" name="connexion" value="connexion" class="btn btn-primary btn-lg mt-2">
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>