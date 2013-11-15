<?php
    //Set the page title
    $page_title = 'Delete a Contact';
    // Insert the page header
    require_once('header.php');
    require_once('connect_vars.php');

?>
<section class="main">
<?php
//if the user is logged in
if(isset($_SESSION['user_id'])){
    //display delete form
    //set which contact id to delete
if (isset($_GET['id']))
{
  $id = trim($_GET['id']);
}
else
{
  $id = trim($_POST['id']);
};
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//query to find the contact information
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, 'SELECT * FROM business_contacts WHERE contact_id = ?');
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
/* set the variables with those database fields */
mysqli_stmt_bind_result($stmt, $contact_id, $contact_name, $first_name, $last_name, $phone, $email);
// Make sure contact IS valid
if((mysqli_stmt_fetch($stmt))=== TRUE){
    //Check if the form been submitted 
    if(isset($_POST['submit'])){
            //Check that user indicated to delete this contact.
            if($_POST['confirm'] === 'true'){
                //close the retrival query
                mysqli_stmt_close($stmt);
                //user selected delete
                $delete = mysqli_stmt_init($dbc);
                mysqli_stmt_prepare($delete, 'DELETE FROM business_contacts WHERE contact_id = ?');
                mysqli_stmt_bind_param($delete, "i", $id);
                // delete the entry
                mysqli_stmt_execute($delete);
                mysqli_stmt_close($delete);
                $system_message_del = "Contact deleted.";
                }
            //user selected cancel
            else{
                $system_message_del = "Action canceled.";
                //close the retrival query
                mysqli_stmt_close($stmt);
                }
                //after either selections, provide way back to the table
                echo'<p>Back to <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/business.php">Contacts</a></p>';
    }
    else{
        //form has not been submitted, display a reminder to user
        $system_message_del = 'Are you sure? You will permanently delete this contact.';
        }
}    
else{
    //invalid contact id
    $system_message_del = "Sorry, contact doesn't exist.";
    };
    
//display the system messages or errors
echo '<section id="system"><h2>System: </h2><p id=sys_message>'.$system_message_del.'</p></section>';
?>
<section>
    <form id="contact_delete_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset id ="radio">
        <label for="delete">Yes, delete contact.</label>
        <input type="radio" name="confirm" id="delete" value="true">
        <label for="cancel">No, cancel.</label>
        <input type="radio" name="confirm" id="cancel" value="false">
        </fieldset>
        <input type="submit" value="Confirm" name="submit" class="submit">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>
</section>
<?php
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