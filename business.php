<?php
/*  File name: business.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This is the section of the site for business contacts
 *  Users will be redirected to the login page if they do not have an authenticated session
 *  Upon successful login, the contacts table will be shown with links to the edit, new and delete, logout parts of the site.
 */


    //Set the page title
    $page_title = 'Business Contacts';
    // Insert the page header
    require_once('header.php');
    require_once('connect_vars.php');

?>
<section class="main">
<?php
//if the user is logged in
if(isset($_SESSION['user_id'])){
    //display buisness contacts
    require ('contact_table.php');
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