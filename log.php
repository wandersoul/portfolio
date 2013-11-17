<?php
/*  File name: log.php
 *  Author: Marc Anderson
 *  Website Name: Marc Anderson's Porfolio Site
 *  File decription: This page provides the user a form with which to log in. 
 *  Upon successful entry of a matching password and user name, provides a link back to the contact table
 */
    //Set the page title
    $page_title = 'Business Contacts';
    // Insert the page header
    require_once('header.php');
    require_once('connect_vars.php');
?>
<section class="main">
<?php
// If the session vars aren't set, try to set them with the stored cookie
if (!isset($_SESSION['user_id'])) {
    
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        //if the cookies are set already:
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Grab the user-entered log-in data
        $user_username = trim($_POST['username']);
        $user_password = trim($_POST['password']);
        //sha1();
        
        if (!empty($user_username) && !empty($user_password)) {
            // Look up the username and password in the database
            $stmt = mysqli_stmt_init($dbc);
            mysqli_stmt_prepare($stmt, 'SELECT user_id, user_name, first_name, last_name, permission FROM buisness_users WHERE user_name = ? AND pass = ?');
            mysqli_stmt_bind_param($stmt, "ss", $user_username, $user_password);
            mysqli_stmt_execute($stmt);
            /* bind result in variables */
            mysqli_stmt_bind_result($stmt, $session_user_id, $session_user_name, $session_first_name, $session_last_name, $session_permission);
            if ((mysqli_stmt_fetch($stmt)) == TRUE) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                $_SESSION['user_id'] = $session_user_id;
                $_SESSION['username'] = $session_user_name;
                $_SESSION['first_name'] = $session_first_name;
                $_SESSION['last_name'] = $session_last_name;
                $_SESSION['permission'] = $session_permission;
                //these cookies are set for 1 day each before expiry
                setcookie('user_id', $session_user_id, time() + (60 * 60 * 24 * 1));    
                setcookie('username', $session_user_name, time() + (60 * 60 * 24 * 1)); 
                setcookie('first_name', $session_first_name, time() + (60 * 60 * 24 * 1));
                setcookie('last_name', $session_last_name, time() + (60 * 60 * 24 * 1)); 
                setcookie('permission', $session_permission, time() + (60 * 60 * 24 * 1));
                mysqli_stmt_close($stmt);
            }
            else {
                // The username/password are incorrect so set an error message
                $system_message = 'Login failed. Your username password combination failed.';
                mysqli_stmt_close($stmt);
            }
        }
        else {
            // The username/password weren't entered so set an error message
            $system_message = 'Please enter your username and password if you wish to log in.';
        }
    }
    else {
        //Hasn't been submitted yet;
        $system_message = 'Please enter your username and password.';
    }
}
?>
<?php
// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_SESSION['user_id'])) {
    echo '<section id="system"><h2>System: </h2><p id=sys_message>'.$system_message.'</p></section>';
?>
<form method="post" action="log.php">
    <fieldset>
        <legend>Log In</legend>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" />
    </fieldset>
    <input type="submit" value="Log In" name="submit" />
</form>

<?php
}
else {
    // Confirm the successful log-in
    $system_message = 'Login successful!';
    echo '<section id="system"><h2>System: </h2><p id=sys_message>'.$system_message.'</p></section>';
    echo '<p>You may now proceed to the <a href="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/business.php">contacts table</a>';
}
?>
</section>
<?php
//close the page
require_once('footer.php');
?>