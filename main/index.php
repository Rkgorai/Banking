<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once "head.php"; ?>
        
        <title>Banking </title>
    </head>
    <body>
        <div class="navigation">
            <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

            <label for="navi-toggle" class="navigation__button">
                <span class="navigation__icon">&nbsp;</span>
            </label>

            <div class="navigation__background">&nbsp;</div>

            <nav class="navigation__nav">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="search_cust.php" class="navigation__link"><span>01</span>View All Customers</a></li>
                    <li class="navigation__item"><a href="about.php" class="navigation__link"><span>02</span>About Us</a></li>
                    <li class="navigation__item"><a href="contact.php" class="navigation__link"><span>03</span>Contact Us</a></li>
                    </ul>
            </nav>
        </div>
        <header class="header">
            <div class="logo-box">
                <img src="img/logo-white.png" alt="Logo" class="logo">
            </div>

            <div class="text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary-main">Banking</span>
                    <span class="heading-primary-sub">Make Your Life Simple</span>
                </h1>

                <a href="search_cust.php" class="btn btn-white btn-animated">View All Customers</a>
            </div>
            
        </header>
        
    </body>
</html>
