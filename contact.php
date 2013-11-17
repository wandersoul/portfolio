<?php
/*  File name: contact.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This page provides the user with the keep connected tab, and a way to email Marc directly!
 */
    //Set the page title
    $page_title = 'Contact';
    // Insert the page header
    require_once('header.php');
?>
<section class="main">
    

    <!-- Keep Connected -->
    <section id="keep_connected">
        <h2>Keep Connected!</h2>
            <!--links facebook, twitter, github, ??? -->
            <a href="https://www.facebook.com/marc.anderson.50"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/facebook.png" alt="Link to Marc's Facebook" /></a>
            <a href="https://twitter.com/MisterAnderrson"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/twitter.png" alt="Link to Marc's Twitter" /></a>
            <a href="https://github.com/wandersoul"><img src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/github.png" alt="Link to Marc's GitHub" /></a>
    </section>
    <!-- Contact Form to email student account -->
    <?php
    if(isset($_POST['submit'])){
        //trim variables
        $user_name = trim($_POST['user_name']);
        $user_email = trim($_POST['user_email']);
        $message = trim($_POST['message']);
        //if required variables are filled
        if((!empty($user_name))&& (!empty($user_email))){
            //send the email
            $system_message = 'Email sent!';
        }
        else{
            $system_message = 'Please enter required fields!';
        }
    }
    else
    {
        //display instructions
        $system_message = 'Fill out fields and submit to email Marc!';
    }
    ?>
    <?php //A sticky form for emailing Marc
    echo '<div id="system"><h2>System: </h2><p id=sys_message>'.$system_message.'</p></div>';?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>      
          <label for="user_name">Your Name:<span class ="req">*required*</span></label>
          <input type="text" id="user_name" name="user_name" value="<?php if (!empty($user_name)) echo $user_name;?>" maxlength="50" />

          <label for="user_email">Your Email:<span class ="req">*required*</span></label>
          <input type="text" id="user_email" name="user_email" value="<?php if (!empty($user_email)) echo $user_email;?>" maxlength="75" />

          <label for="message">Message:</label>
          <textarea id="message" placeholder="Message..." name="message"><?php if (!empty($message)) echo $message;?></textarea>

        </fieldset>
          <input type="submit" value="Submit" name="submit" class="submit"/>
      </form>
</section>
<?php
//close the page
require_once('footer.php');
?>
