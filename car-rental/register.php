<?php

include('components/header.php');
include('src/User.php');

$message = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);


    $user = new User($connection);

    $response = $user->create($name, $username, $email, $password, $contact);

    if ($response) {
        $message = "User Regsitered";
    }

}





?>


    <div class="form-container">

        <form action="" method="post">

            <h2>Register User</h2>

            <input type="text" name="name" placeholder="Enter Name">

            <input type="text" name="username" placeholder="Enter Username">

            <input type="text" name="email" placeholder="Enter Email">

            <input type="password" name="password" placeholder="Enter Password">

            <input type="tel" name="contact" placeholder="Enter Contact">

            <button class="btn btn-primary">Register</button>

            <p>Already have a account ? <a href="login.php"> Login </a></p>

            <?php
            if ($message !== null) {
                ?>

            <div class="alert alert-success">
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