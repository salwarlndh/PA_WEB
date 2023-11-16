<?php
session_start();
require 'functions.php';
$concerts = query("SELECT * FROM concerts");
date_default_timezone_set("Asia/Makassar");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>♫ Music Fest</title>
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <a href="index.php"><img src="assets/image/logo.png" alt="logo"></a>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#nav2">Line up</a></li>
            <li><a href="#nav1">D-day</a></li>
            <?php
            if (isset($_SESSION['userLoggedIn'])) {
                echo '<li><a href="user-admin/logout.php">Sign out</a></li>';
            } else if (isset($_SESSION['adminLoggedIn'])) {
                echo '<li><a href="dashboard">Dashboard</a></li>';
            } else {
                echo '<li><a href="user-admin/login.php">Sign in</a></li>';
            }
            ?>
        </ul>
    </nav>
    <!-- navbar -->

    <!-- main content -->
    <div class="banner" id="home">
        <div class="main">
            <h1>euphoria music festival</h1>
            <p>as the day surrenders to the enchanting tunes, embark on a journey where rhythms become your heartbeat and harmonies play like your pulse.
                dance beneath the starry night, unite with fellow music enthusiasts, and lose yourself in a melodic odyssey that will leave you enchanted and craving for more.</p><br>
            <?php if(!isset($_SESSION['userLoggedIn'])) :?>
                <a href="user-admin/register.php"><button class="show-btn">Get ticket</button></a>
            <?php else : ?>
                <button id="show" class="show-btn">Get ticket</button>
            <?php endif; ?>
        </div>
    </div>
    <!-- main content -->


    <!-- line up -->
    <div class="container" id="nav2">
        <h1>Line up</h1>
        <div class="card">
            <div class="img">
                <img src="assets/image/niki.jpg" alt="Niki Zefanya">
            </div>
            <div class="content">
                <h3>Niki Zefanya</h3>
                <p>Get ready to be enchanted by Niki Zefanya's soulful voice and captivating performances.
                    She's all set to mesmerize all of you.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="assets/image/neighbourhood.jpeg" alt="The Neighbourhood">
            </div>
            <div class="content">
                <h3>The Neighbourhood</h3>
                <p>Prepare to rock out with The Neighbourhood as they gear up to deliver their indie-rock hits.
                    It's going to be an unforgettable night.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="assets/image/frank-ocean.webp" alt="Frank Ocean">
            </div>
            <div class="content">
                <h3>Frank Ocean</h3>
                <p>Immerse yourself in the anticipation of Frank Ocean's soulful melodies and poetic lyrics.
                    Get ready for a night to remember, everyone.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="assets/image/sza.jpg" alt="SZA">
            </div>
            <div class="content">
                <h3>SZA</h3>
                <p>Join us in creating an electric atmosphere with SZA's enchanting R&B tunes and powerful stage
                    presence.</p>
            </div>
        </div>

        <div class="card">
            <div class="img">
                <img src="assets/image/bryson.webp" alt="SZA">
            </div>
            <div class="content">
                <h3>Bryson Tiller</h3>
                <p>Get ready for an unforgettable night with Bryson Tiller's smooth R&B vocals and soulful tunes.
                    He's here to serenade you and create lasting memories.</p>
            </div>
        </div>

    </div>
    <!-- line up -->

    <!-- ticket -->
    <div class="container">
        <div class="ticket">
            <h1>don't miss your chance to have fun!</h1>
            <i class="fa-solid fa-calendar-week"></i>
            <p> 20 november 2023 <br></p>
            <i class="fa-solid fa-location-dot"></i>
            <p>asier valley, los angeles <br></p>
            <i class="fa-solid fa-ticket"></i>
            <p>vip : $300 <br>general : $150 <br></p>
            <p>all price excluded tax</p>

        </div>

        <!-- pop up -->
        <div class="popup" id="ticket">
            <div class="close-btn" id="close">x</div>
            <div class="form">
                <form action="hasil.php" method="POST">
                    <h2>Ticket</h2>
                    <input type="hidden" name="concert_id" value="1">
                    <div class="form-element">
                        Name :
                        <input type="text" id="name" name="name" placeholder="enter your name" required>
                    </div>
                    <div class="form-element">
                        Id number :
                        <input type="text" id="id" name="id" readonly value="<?= date("Ymd") . random_int(100, 999) ?>">
                    </div>
                    <div class="form-element">
                        Email :
                        <input type="email" id="email" name="email" placeholder="enter your email" required>
                    </div>
                    <div class="form-element">
                        Ticket category : <br>
                        <input type="radio" id="vip" name="category" value="vip" required> vip
                        <input type="radio" id="general" name="category" value="general" required> general
                    </div>
                    <div class="form-element">
                        Payment method : <br>
                        <input type="radio" id="payment" name="payment" value="debit" required> debit card
                        <input type="radio" id="payment" name="payment" value="credit" required> credit card
                    </div>
                    <button type="submit" name="submit" value="submit">Purchase</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ticket -->

    <!-- date -->
    <div class="container" id="nav1">
        <h1>Countdown</h1>
        <div class="date">
            <div class="box">
                <span id="days">0</span>
                <p>days</p>
            </div>
            <div class="box">
                <span id="hours">0</span>
                <p>hours</p>
            </div>
            <div class="box">
                <span id="minutes">0</span>
                <p>minutes</p>
            </div>
            <div class="box">
                <span id="seconds">0</span>
                <p>seconds</p>
            </div>
        </div>
    </div>
    <!-- date -->

    <!-- upcoming concerts -->
    <div class="container2" id="upcoming-concerts">
        <h1>Upcoming concerts</h1>
        <div class="concert-list">
            <?php foreach ($concerts as $concert) : ?>
                <div class="concert-link">
                    <div class="concert-card">
                        <div class="circle">
                            <img src="dashboard/concerts/img/<?= $concert['image']; ?>" alt="<?= $concert['name']; ?>">
                        </div>
                    </div>
                    <div class="details">
                        <h3><?= $concert['name']; ?></h3>
                        <p><?= $concert['description']; ?></p>
                        <a href="detail.php?id=<?= $concert['id'] ?>" class="btn">See Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- upcoming concerts -->

    <!-- footer -->
    <div class="footer" id="contact">
        <div>
            <div class="row">
                <div class="col">
                    <h3>the 90's vinyl</h3>
                    <ul>
                        <li>221b baker street</li>
                        <li>london, united kingdom</li>
                        <li>+1 2345 678 0</li>
                    </ul>
                </div>
                <div class="col">
                    <h3>contact us</h3>
                    <ul>
                        <li><a href="https://twitter.com/Drake">twitter</a></li>
                        <li><a href="https://instagram.com/jennierubyjane">instagram</a></li>
                        <li><a href="https://www.youtube.com/@jennierubyjane">youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <script type="text/javascript" src="assets/js/javascript.js"></script>
    <script type="text/javascript">
        function updateCountdown() {
            const targetDate = new Date('2023-11-20 23:59:59');
            const currentDate = new Date();
            const timeRemaining = targetDate - currentDate;

            if (timeRemaining <= 0) {
                document.getElementById('days').textContent = '0';
                document.getElementById('hours').textContent = '0';
                document.getElementById('minutes').textContent = '0';
                document.getElementById('seconds').textContent = '0';
            } else {
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60) / 1000));

                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;
            }
        }

        updateCountdown();

        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>