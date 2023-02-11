<?php

include('components/header.php');
include('src/Car.php');
include('src/Booking.php');

if(!isset($_SESSION['car_user']))
{
    header('location:login.php');
}

$car = new Car($connection);

$response = $car->getSingleCarDetails($_GET['cdid']);
$carDetails = mysqli_fetch_assoc($response);


$booking = new Booking($connection);

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $cdid = $_GET['cdid'];
    $uid = $_SESSION['user_id'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    $endD = date_create($endDate);
    $startD = date_create($startDate);

    $days=date_diff($endD,$startD)->days===0?1:date_diff($endD,$startD)->days;

    $amount = $days * $carDetails['price'];
    $discountAmount = ($carDetails['discount'] / 100) * $amount;
    $amount = $amount - $discountAmount;



    $response=$booking->create($cdid,$uid,$startDate,$endDate,$amount);

    if($response)
    {
        ?>
            <script>
                alert("Your Booking is successfull!!!");
                window.location="http://localhost:80/car-rental/index.php";
            </script>
        <?php
    }


}



?>

    <section class="main-container">

        <div class="main-container-child">
            <div class="booking-section">
                <div class="booking-section-img">
                    <img src="<?=$carDetails['image']?>" alt="car">
                </div>
                <div class="booking-details">
                    <h1><?=$carDetails['brand']?> <?=$carDetails['name']?></h1>

                    <h2>Rs <?=$carDetails['price']?></h2>

                    <h4><?=$carDetails['number']?></h4>

                    <p><?=$carDetails['is_available']?"Available":"Unavailable" ?></p>
                </div>
            </div>
            <form class="booking-section" method="post" action="">

                <h1>Fill Booking Details</h1>

                <div>
                <p>Start Date</p>
                <input required id="start_date" type="date" min="<?=date('Y-m-d')?>" name="start_date"/>
                </div>

                <div>
                <p>End Date</p>
                <input type="date" id="end_date" onchange="calculatePrice(<?=$carDetails['price']?>,<?=$carDetails['discount']?>)" min="<?=date('Y-m-d')?>" name="end_date"/>
                </div>

                

                <h2>

                To Be Paid : <span id="final-amount">0</span> (<?=$carDetails['discount']?>% discount)

                </h2>

                <button class="btn btn-primary">Confirm Booking</button>

            </form>
        </div>

    </section>

<?php

include('components/footer.php');

?>