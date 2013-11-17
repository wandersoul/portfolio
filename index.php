<?php
/*  File name: index.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This is the default page for the portfolio site, 
 *  it includes a nav bar, image slider for my work, a footer and a 
 *  keep connected section.
 */
    //Set the page title
    $page_title = 'Home';
    // Insert the page header
    require_once('header.php');
?>
<section class="main">
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
    <!-- featured work, PREMADE SLIDER from http://cssglobe.com/easy-slider-17-numeric-navigation-jquery-slider/ -->
    <div id="container">
        <div id="content">
            <div id="slider">
                <ul>				
                    <li><a href="http://webdesign4.georgianc.on.ca/~200235076/movieposter/"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/movie_poster.png" alt="Image of Movie Poster Project" /></a></li>
                    <li><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/trading_card/"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/trading_card.png" alt="Image of Trading Card Project" /></a></li>
                    <li><a href="http://webdesign4.georgianc.on.ca/~200235076/retrosite/index.html"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/robots.png" alt="Image of Rock em Sock em Robots Project" /></a></li>
                    <li><a href="http://webdesign4.georgianc.on.ca/~200235076/TTW/"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/ttw.png" alt="Image of Database Website " /></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- View more work button -->
    <div class="view_more">
        <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/projects.php">View more work!</a>
    </div>

    <!-- keep connected -->
    <section id="keep_connected">
        <h2>Keep Connected!</h2>
        <!--links facebook, twitter, github, ??? -->
        <a href="https://www.facebook.com/marc.anderson.50"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/facebook.png" alt="Link to Marc's Facebook" /></a>
        <a href="https://twitter.com/MisterAnderrson"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/twitter.png" alt="Link to Marc's Twitter" /></a>
        <a href="https://github.com/wandersoul"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/github.png" alt="Link to Marc's GitHub" /></a>
    </section>

</section>
<?php
//close the page
require_once('footer.php');
?>