<?php
    //Set the page title
    $page_title = 'Edit a Contact';
    // Insert the page header
    require_once('header.php');
    require_once('connect_vars.php');

?>
<section class="main">
<?php
//if the user is logged in
if(isset($_SESSION['user_id'])){
    //display edit form
    
}
//else the user is not logged in, show a login screen
else{
    header('Location: http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/log.php');
}

?>
</section>
<?php
//close the page
require_once('footer.php');
?>