<?php

include('src/User.php');

include('components/header.php');

$message = null;
$messageType = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);


    $user = new User($connection);

    $response = $user->login($username,$password);

    if ($response["success"]===true) {
        $_SESSION['car_user'] = $username;
        $_SESSION["user_id"] = $response["userid"];
        header('location:index.php');
    }
    else 
    {
        $message = "Wrong Username Or Password";
        $messageType = "danger";
    }

}





?>


    <div class="form-container">

        <form action="" method="post">

            <h2>Login User</h2>

           
            <input type="text" name="username" placeholder="Enter Username">

            <input type="password" name="password" placeholder="Enter Password">

           <button class="btn btn-primary">Login</button>

           <p>Dont have a account ? <a href="register.php"> Create One </a></p>

            <?php
            if ($message !== null) {
                ?>

            <div class="alert alert-<?=$messageType?>">
                <?=$message?>
            </div>
            <?php
            }
            ?>

        </form>
    </div>

    
<?php

include('components/footer.php');

?>