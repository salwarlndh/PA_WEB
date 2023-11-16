<?php
session_start();
require 'functions.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $concerts = query("SELECT * FROM concerts");
    $arrConcertId = [];
    foreach($concerts as $concert) {
        $arrConcertId[] = $concert['id'];
    }
    if (!in_array($id, $arrConcertId)) {
        header("Location:index.php");
        exit;
    }
    $concert = query("SELECT * FROM concerts WHERE id=$id")[0];
    $lineups = query("SELECT * FROM lineups WHERE concert=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Fest</title>
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <style>
        .banner .main {
            margin: 0 auto;
        }

        .banner h1, .banner p {
            margin: 0 auto; 
            max-width: 600px; 
        }

    </style>
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
            <h1><?= $concert['name']; ?></h1>
            <p><?= $concert['description']; ?></p><br>
            <?php if(!isset($_SESSION['userLoggedIn'])) :?>
                <a href="user-admin/register.php"><button class="show-btn">Get ticket</button></a>
            <?php else : ?>
                <button id="show" class="show-btn">Get ticket</button>
            <?php endif; ?>
        </div>
    </div>
    <!-- main content -->

    <!-- -- caraousell -- -->

    <!-- line up -->
    <div class="container" id="nav2">
        <!-- <div class="lineup"> -->
            <h1>Line up</h1>
        <!-- </div> -->
        <?php if(sizeof($lineups) == 0): ?>
            <p class="lineup">No lineups yet. Will be updated soon.</p>
        <?php else: ?>
            <?php foreach($lineups as $lineup): ?>
                <div class="card">
                    <div class="img">
                        <img src="dashboard/concerts/img-lineup/<?= $lineup['image']; ?>" alt="<?= $lineup['name']; ?>">
                    </div>
                    <div class="content">
                        <h3><?= $lineup['name']; ?></h3>
                        <p><?= $lineup['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    <!-- line up -->

    <!-- ticket -->
    <div class="container" id="nav2">
        <div class="ticket">
            <h1>don't miss your chance to have fun!</h1>
                <i class="fa-solid fa-calendar-week"></i><p> <?= date_format(date_create($concert['date']), "j F Y"); ?> <br></p>
                <i class="fa-solid fa-location-dot"></i><p><?= $concert['location']; ?><br></p>
                <i class="fa-solid fa-ticket"></i><p>vip : $300 <br>general : $150 <br></p>
                <p>all price excluded tax</p>
            
        </div>

        <!-- pop up -->
        <div class="popup" id="ticket">
            <div class="close-btn" id="close">x</div>
            <div class="form">
                <form action="hasil.php" method="POST">
                    <h2>Ticket</h2>
                    <input type="hidden" name="concert_id" value="<?= $id; ?>">
                    <div class="form-element">
                        Name:
                        <input type="text" id="name" name="name" placeholder="enter your name" required>
                    </div>
                    <div class="form-element">
                        Id number:
                        <input type="text" id="id" name="id" readonly value="<?= date("Ymd") . random_int(100, 999) ?>">
                    </div>
                    <div class="form-element">
                        Email:
                        <input type="email" id="email" name="email" placeholder="enter your email" required>
                    </div>
                    <div class="form-element">
                        Ticket category: <br>
                        <input type="radio" id="vip" name="category" value="vip"> vip
                        <input type="radio" id="general" name="category" value="general"> general
                    </div>
                    <div class="form-element">
                        Payment method: <br>
                        <input type="radio" id="payment" name="payment" value="debit"> debit card
                        <input type="radio" id="payment" name="payment" value="credit"> credit card
                    </div>
                    <button type="submit" name="submit" value="submit">Purchase</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ticket -->

    <!-- date -->
    <div class="container" id="nav1">
        <h1 class="countdown">Countdown</h1>
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

    <script type="text/javascript">
        function updateCountdown() {
            const targetDate = new Date('<?= date_format(date_create($concert['date']), "Y-n-j"); ?> 23:59:59');
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

        const showButton = document.getElementById("show");
        const closeButton = document.getElementById("close");
        const ticket = document.getElementById("ticket");

        showButton.addEventListener("click", () => {
            ticket.classList.add("active");
        });

        closeButton.addEventListener('click', () => {
            ticket.classList.remove("active");
        });
    </script>

    
</body>

</html>
<?php
} else {
    header("Location: index.php");
}
?>