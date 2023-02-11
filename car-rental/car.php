<?php

include('components/header.php');
include('src/Car.php');

$car = new Car($connection);

$carData=$car->get($_GET['id']);

$images = array();
$colors = array();
$numbers=array();
$cdids = array();

$name = null;
$price = null;
$discount = null;
$brand = null;





$count = 0;
while($carDetails=mysqli_fetch_array($carData))
{
    
    if($count===0)
    {
        $name = $carDetails['name'];
        $price = $carDetails['price'];
        $discount = $carDetails['discount'];
        $brand = $carDetails['brand'];
        $count = 1;
    }   
    
    $images[] = $carDetails['image'];
    $colors[] = $carDetails['color'];
    $numbers[] = $carDetails['number'];
    $cdids[] = $carDetails[9];

    
}






?>

    <section class="main-container">

        <div class="main-container-child">
            <div class="container-section">
                <div class="big-car-img">
                    <img id="big-img" src="<?=$images[0]?>" alt="car">
                </div>

                <div class="img-options">

                    <?php

                        foreach($images as $key => $image)
                        {
                            ?>
                                <div class="img-option">
                                    <img onclick="changeImage(this.src,'<?=$numbers[$key]?>','<?=$colors[$key]?>',<?=$cdids[$key]?>)" src="<?=$image?>" alt="car">
                                </div>
                            <?php
                        }
                    
                    ?>

                </div>

                <div class="color-options">
                <?php

                foreach ($colors as $key => $color) {

                    ?>

                    <div class="color-option" onclick="changeImage('<?=$images[$key]?>','<?=$numbers[$key]?>','<?=$color?>',<?=$cdids[$key]?>)">
                        <p style="background-color: <?=$color?>;"></p>
                    </div>

                    <?php
                }
                    ?>
                   
                </div>

            </div>
            <div class="container-section">
                <h1><?=$brand?> <?=$name?></h1>
                <h2>Rs <?=$price?> </h2>
                <p>Available</p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <h2 id="number"><?=$numbers[0]?></h2>

                <a id="booking_url" href="http://localhost:80/car-rental/booking.php?cdid=<?=$cdids[0]?>">
                    <button class="btn btn-primary">Book Now</button>
                </a>
            </div>
        </div>

    </section>



<?php
include('components/footer.php');
?>