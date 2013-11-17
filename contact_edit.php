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
    //default user message
    $system_message = 'Please enter information and submit to create a new contact!';
    //check for submission
    if(isset($_POST['submit'])){
        $contact_id = trim($_POST['contact_id']);
        //grab submitted variables from POST
        $email = trim($_POST['email']);
        $phone_number = trim($_POST['phone_number']);
        $last_name = trim($_POST['last_name']);
        $first_name = trim($_POST['first_name']);
        $contact_title = trim($_POST['contact_title']);
        if(!empty($contact_title)){
            $contact_name = ''.$contact_title.' '.$first_name.' '.$last_name.'';
        }
        else {
            $contact_name = ''.$first_name.' '.$last_name.'';
        }
        
        if(!empty($email) && !empty($phone_number) && !empty($last_name) && !empty($first_name) ){
            //setup the connection to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            //update the new contact using a parameterized query
            $update = mysqli_stmt_init($dbc);
            mysqli_stmt_prepare($update, 'UPDATE business_contacts SET contact_name = ?, first_name = ?, last_name = ?, phone = ?, email = ? WHERE contact_id = ?');
            /* bind parameters, already previously set in $_POST */
            mysqli_stmt_bind_param($update, "sssssi", $contact_name, $first_name, $last_name, $phone_number, $email, $contact_id);
            mysqli_stmt_execute($update);
            /*close the insert query*/
            mysqli_stmt_close($update);
            
            //prompt user that the insert was a success and a return link to the table
            $system_message = 'Contact upddated successfully!';
            echo '<p>You can view the contact on the <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/business.php">contacts table</a>';
        }
        else{
            //prompt user to insert all required fields
            $system_message = 'Please insert all required fields!';
        }
    }
    else
    {
        //grab the contact id from the url
        $contact_id = $_GET['id'];
        //setup the connection to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        //so query to pull information
        $jolly = mysqli_stmt_init($dbc);
        mysqli_stmt_prepare($jolly, 'SELECT contact_name, first_name, last_name, phone, email FROM business_contacts WHERE contact_id = ?');
        mysqli_stmt_bind_param($jolly, "i", $contact_id);
        mysqli_stmt_execute($jolly);
        /* set the variables (for the form) with those database fields */
        mysqli_stmt_bind_result($jolly, $contact_name, $first_name, $last_name, $phone_number, $email);
        //if the contact ID was a match and pulled all info
        if(mysqli_stmt_fetch($jolly)== TRUE){
            mysqli_stmt_close($jolly);
        }
        else {
            $system_message = 'ERROR: This contact does not exist.';
            mysqli_stmt_close($jolly);
        }
    }
    echo '<section id="system"><h2>System: </h2><p id=sys_message>'.$system_message.'</p></section>';?>
    
<!--display edit form-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
    <legend>New Contact Information</legend>
    
    <label for="contact_title">Contact Title:</label>
    <input type="text" name="contact_title" value="<?php if (!empty($contact_title)) echo $contact_title;?>" maxlength="10" placeholder="e.g. Mr or Mrs." />

    <label for="first_name">First Name:<span class ="req">*required*</span></label>
    <input type="text" name="first_name" value="<?php if (!empty($first_name)) echo $first_name;?>" maxlength="20" />
   
    <label for="last_name">Last Name:<span class ="req">*required*</span></label>
    <input type="text" name="last_name" value="<?php if (!empty($last_name)) echo $last_name;?>" maxlength="30" />
    
    <label for="phone_number">Phone Number:<span class ="req">*required*</span></label>
    <input type="text" name="phone_number" value="<?php if (!empty($phone_number)) echo $phone_number;?>" maxlength="30" placeholder="XXX-XXX-XXXX"/>
    
    <label for="phone_number">Email:<span class ="req">*required*</span></label>
    <input type="text" name="email" value="<?php if (!empty($email)) echo $email;?>" maxlength="80" placeholder="email@website.com"/>
    
    </fieldset>
    <input type="submit" value="Save New Contact" name="submit" class="submit"/>
    <input type="hidden" id="contact_id" value="<?php echo $contact_id;?>" name="contact_id"/>
</form>
    
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