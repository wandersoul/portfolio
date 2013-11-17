<?php
/*  File name: contact_new.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This page provides the user with a method to add new contacts to the list.
 *  Upon successfully filling in the required fields and submission, the database will enter in
 *  a new contact for display, providing a link back to the table
 */
    //Set the page title
    $page_title = 'Create a Contact';
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
        //setup the connection to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
            //insert the new contact using a parameterized query
            $insert = mysqli_stmt_init($dbc);
            mysqli_stmt_prepare($insert, 'INSERT INTO business_contacts (contact_name, first_name, last_name, phone, email) VALUES (?, ?, ?, ?, ?)');
            /* bind parameters, already previously set in $_POST */
            mysqli_stmt_bind_param($insert, "sssss", $contact_name, $first_name, $last_name, $phone_number, $email);
            /* create the new facility  */
            mysqli_stmt_execute($insert);
            /*close the insert query*/
            mysqli_stmt_close($insert);
            
            //prompt user that the insert was a success and a return link to the table
            $system_message = 'Contact added successfully!';
            echo '<p>You can view the new contact on the <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/business.php">contacts table</a>';
        }
    }
    else
    {
        //prompt user to insert all required fields
        $system_message = 'Please insert all required fields!';
    echo '<section id="system"><h2>System: </h2><p id=sys_message>'.$system_message.'</p></section>';
    //show the form?>

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
</form>    
        
    <?php
    }
    
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