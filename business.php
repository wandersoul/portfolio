<?php
    //Set the page title
    $page_title = 'Business Contacts';
    // Insert the page header
    require_once('header.php');
    require_once('connect_vars.php');
?>
<section class="main">
<?php
//if the user is logged in
if(false){
    //display buisness contacts
    require ('contact_table.php');
}
//else the user is not logged in, show a login screen
else{
    require_once('log.php');
}

?>
</section>
<?php
//close the page
require_once('footer.php');
?>