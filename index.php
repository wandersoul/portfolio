<?php
    //Set the page title
    $page_title = 'Home';
    // Insert the page header
    require_once('header.php');
?>
<section>
    <!-- logo -->
    <img id="logo" src=""></img>
    <!-- welcome statement -->
    <p id="welcome">Hello! Welcome to my personal portfolio site!</p>    
    <!-- personal tagline -->
    <p id="tagline">Stand sure.</p>
    <!-- mission statement -->
    <div>
        <h2>Mission Statement</h2>
        <p>
            I strive to be the partner of choice for companies and individuals by helping them create, build and maintain the most reliable and robust sites. I work in tandem as a partner, understanding needs and delivering those goals step-by-step with my employers.
        </p>
    </div>
    <!-- View more work button -->
    <div class="view_more">
        <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/projects.php">View more work!</a>
    </div>
    <!-- featured work -->
    <div id="slider">
        <!-- INSERT A PREMADE IMAGE SLIDER -->
    </div>
    <!-- keep connected -->
    <div id="keep_connected">
        <h2>Keep Connected!</h2>
        <!--links facebook, twitter, github, ??? -->
        <a href="https://www.facebook.com/marc.anderson.50"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/facebook.png" alt="Link to Marc's Facebook" /></a>
        <a href="https://twitter.com/MisterAnderrson"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/twitter.png" alt="Link to Marc's Twitter" /></a>
        <a href="https://github.com/wandersoul"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/github.png" alt="Link to Marc's GitHub" /></a>
    </div>

</section>
<?php
//close the page
require_once('footer.php');
?>