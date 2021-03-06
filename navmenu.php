<?php
//included in the header of almost every page
//set variables for path names
$index = "/~200235076/AdvWebPro/portfolio/index.php";
$about = "/~200235076/AdvWebPro/portfolio/about.php";
$projects = "/~200235076/AdvWebPro/portfolio/projects.php";
$services = "/~200235076/AdvWebPro/portfolio/services.php";
$contact = "/~200235076/AdvWebPro/portfolio/contact.php";
$business = "/~200235076/AdvWebPro/portfolio/business.php";

// Generate the permanent navigation menu, match each url against 
echo '<nav>';
    echo '<ul>';
        //Home
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $index )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo '><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/index.php">Home</a></li>';
        
        //About Me
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $about )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo'><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/about.php">About Me</a></li>';
        
        //Projects
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $projects )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo'><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/projects.php">Projects</a></li>';
        
        //Services
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $services )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo'><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/services.php">Services</a></li>';
        
        //Contact Me
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $contact )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo'><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/contact.php">Contact</a></li>';
        
        //Business
        echo '<li';
        //check if the current site matches the current nav option
        if( $_SERVER['PHP_SELF'] == $business )
            {echo ' class="current"';} //if it does, give it class "current"
        //finish the rest of the nav link
        echo'><a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/business.php">Business Contacts</a></li>';
        
        //GitHub
        echo '<li';
        //finish the rest of the nav link
        echo'><a href="https://github.com/wandersoul">GitHub</a></li>';        
               
        
    echo '</ul>';
echo '</nav>';
?>