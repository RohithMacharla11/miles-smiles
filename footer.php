<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato|Nanum+Gothic:700|Raleway&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/footer.css">

    <title>Responsive Footer</title>
</head>
<body>    
    <footer>
       <div>
            <span class="logo">Car-Rental</span>
       </div>

       <div class="row">
            <div class="col-3">                
                <div class="link-cat" onclick="footerToggle(this)">
                    <span class="footer-toggle"></span>
                    <span class="footer-cat">Services</span>
                </div>
                <ul class="footer-cat-links">
                    <li><a href=""><span>24/7 service Provided</span></a></li>
                    <li><a href=""><span>Enjoy the comfortable Ride with us</span></a></li>
                    <li><a href=""><span>With affordable Prices.</span></a></li>
                    <li><a href=""><span>Special offers Provided with time</span></a></li>
                </ul>
            </div>
            <div class="col-3">
                <div class="link-cat" onclick="footerToggle(this)">
                    <span class="footer-toggle"></span>
                    <span class="footer-cat">Industries</span>
                </div>
                <ul class="footer-cat-links">
                    <li><a href=""><span>Healthcare</span></a></li>
                    <li><a href=""><span>Sports</span></a></li>
                    <li><a href=""><span>ECommerce</span></a></li>
                    <li><a href=""><span>Construction</span></a></li>
                    <li><a href=""><span>Club</span></a></li>
                </ul>
            </div>
            <div class="col-3">
                <div class="link-cat" onclick="footerToggle(this)">
                    <span class="footer-toggle"></span>
                    <span class="footer-cat">Quick Links</span>
                </div>
                <ul class="footer-cat-links">
                    <li><a href=""><span>Reviews</span></a></li>
                    <li><a href=""><span>Terms & Condition</span></a></li>
                    <li><a href=""><span>Disclaimer</span></a></li>
                    <li><a href=""><span>Site Map</span></a></li>
                </ul>
            </div>
            <div class="col-3" id="newsletter">
                <span>Stay Connected</span>
                <form id="subscribe">
                    <input type="email" id="subscriber-email" placeholder="Enter Email Address"/>
                    <input type="submit" value="Subscribe" id="btn-scribe"/>
                </form>
                
                <div class="social-links social-2">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-tumblr"></i></a>
                    <a href=""><i class="fab fa-reddit-alien"></i></a>
                </div>

                <div id="address">
                    <span>Office Location</span>
                    <ul>
                        <li>
                            <i class="far fa-building"></i>
                            <div>India<br/>
                            33-4-233/1, Thimmapur, Warangal, Telangana</div>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <div>Contact<br/>
                            7780598470 macharlarohith111@gmail.com</div>
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="social-links social-1 col-6">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-tumblr"></i></a>
                <a href=""><i class="fab fa-reddit-alien"></i></a>
            </div>
       </div>
       <div id="copyright">
           &copy; All Rights Reserved 2019-2020
       </div>
       <div id="owner">
           <span>
               Designed by Rohith & Dheeraj.
           </span>
       </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="StyleiTechFooter.js"></script>
    
</body>
</html>