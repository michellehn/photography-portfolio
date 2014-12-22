<!DOCTYPE html>
<html>
    
<?php
include('header.html');
?>
<!-- include not used here, because of class = "active" -->
<body>
    <div id="menu">
        <div id="logo">
            <a href="index.php">
                <img src="../photos/logosmallblue.png" alt="Michelle Nelson Photography">
            </a>
        </div>
        <div class="seprub"></div>
        <ul class="a">
            <li><a href="portfolio.php">portfolio</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="contact.php" class="active">contact</a></li>
        </ul>
        <div class="seprub"></div>
        <ul class="social">
                <li><a href="http://instagram.com/whimsicolour" target="_blank">
                    <img src="../photos/socialmedia/insta.png" alt="Instagram">
                </a></li>
                <li><a href="https://www.behance.net/michellenelson" target="_blank">
                    <img src="../photos/socialmedia/be.png" alt="Behance">
                </a></li>
                <li><a href="https://www.facebook.com/michellehnelson" target="_blank">
                    <img src="../photos/socialmedia/fb.png" alt="Facebook">
                </a></li>
        </ul>
    </div>

    <div id="mainhome">
    <div id="formbox">
        <h4>contact</h4>
        <div id="form">
    
<?php
    $success = FALSE;
    $nameerror = "";
    $emailerror = "";
    $numbererror = "";
    $whaterror = "";
    $messageerror = "";
    
    function get_if_set($fieldname) {
        if ( isset($_GET[$fieldname]) ) {
            return $_GET[$fieldname];
        } 
        return "";
    }
    $what = htmlspecialchars(get_if_set("what"));
    $name = htmlspecialchars(trim(get_if_set("name")));
    $email = htmlspecialchars(trim(get_if_set("email")));
    $number = htmlspecialchars(get_if_set("number"));
    $facebook = get_if_set("facebook");
    $behance = get_if_set("behance");
    $instagram = get_if_set("instagram");
    $other = get_if_set("other");
    $message = htmlspecialchars(trim(get_if_set("message")));

    
    if ( isset($_GET["submit"]) ) {
        if ($name==""){
            $nameerror = "<div class='error' id='nameerror'>Please enter your name</div>";
        }
        if (strlen($name) > 70) {
            $nameerror = "<div class='error' id='nameerror'>Enter a shorter name</div>";
        }
        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)  ) {
            $emailerror = "<div class='error' id='emailerror'>Please enter a valid email address</div>";
        }
        if (strlen($email) > 254) {
            $emailerror = "<div class='error' id='emailerror'>Enter a shorter email address</div>";
        }
        function validate_phone_number( $number ) {
            if (preg_match( '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/', $number ) ) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        if (!validate_phone_number($number)){
            $numbererror = "<div class='error' id='numbererror'>Enter a valid 10-11 digit phone number</div>";
        }
        if (strlen($number) > 15) {
            $numbererror = "<div class='error' id='numbererror'>Enter a valid 10-11 digit phone number</div>";
        }
        if ($what=="chooseone"){
            $whaterror = "<div class='error' id='whaterror'>Please select an option</div>";
        }
        if ($message==""){
            $messageerror = "<div class='error' id='messageerror'>Please enter a message</div>";
        }
        if (strlen($message) > 2000) {
            $messageerror = "<div class='error' id='messageerror'>Please enter a message shorter than 2000 characters</div>";
        }
    }
    
    
    if (empty($nameerror) && empty($emailerror) && empty($numbererror) && empty($whaterror) && empty($messageerror)){
        $success = TRUE;
    }
    
    if ($success) {
        echo "<h5>Thank you, $name!</h5>";
        echo "<p>I email you soon at $email regarding the topic: $what.</p>";
    }
    
    if (! $success){
        echo "<h5 id='titleerror'>There were problems with the submission.</h5>";
        
        $hiring_selected = "";
        $using_selected = "";
        $saying_selected = "";
        $something_selected = "";
        if ($what == "Hiring Michelle"){
            $hiring_selected = "selected";
        }
        if ($what == "Using my work"){
            $using_selected = "selected";
        }
        if ($what == "Saying hi"){
            $saying_selected = "selected";
        }
        if ($what == "Something else"){
            $something_selected = "selected";
        }
        
        $facebook_checked = "";
        $behance_checked = "";
        $instagram_checked = "";
        $other_checked = "";
        
        if ($facebook != "") {
            $facebook_checked = "checked";
        }
        
        if ($behance != "") {
            $behance_checked = "checked";
        }
        
        if ($instagram != "") {
            $instagram_checked = "checked";
        }
        
        if ($other != "") {
            $other_checked = "checked";
        }
        
        echo <<< END_OF_FORM
    

<form name="contactform" action="contactecho.php" onsubmit="return validateForm() method="GET">
    <div class="formright">
        <label for="what" class="formgroup">Interested in...</label><br>
        <select name="what" id="what">
            <option value="chooseone">(Choose one)</option>
            <option value="Hiring Michelle" $hiring_selected>Hiring Michelle</option>
            <option value="Using my work" $using_selected>Using my work</option>
            <option value="Saying hi" $saying_selected>Saying hi</option>
            <option value="Something else" $something_selected>Something else...</option>
        </select>
        $whaterror
    </div>
      
    <div class="formleft">
        <label for="name" class="formgroup">Name</label>
        $nameerror<br>
        <input name="name" id="name" type="text" placeholder="John Smith"
        title = "Enter your first and last name" maxlength="70" value="$name" required>
    </div>
     
    <div class = "formleft">
        <label for="email" class="formgroup">Email</label>
        $emailerror<br>
        <input name="email" id="email" type="email" placeholder="name@company.com"
        title="Enter your email" maxlength="254" value="$email" required>
    </div>
    
    <div class = "formleft">
        <label for="number" class="formgroup">Phone Number</label>
        $numbererror<br>
        <input name="number" id="number" type="text" placeholder="555-555-5555"
        maxlength="15" title="Enter your phone number" value="$number" required>
    </div>
    
    <div class="formright" id="how">
        <label class="formgroup">How did you discover me?</label><br>
        <p class="optional">(optional)</p>
            <div id="checkboxes">
            <input type="checkbox" id="facebook" name="facebook" value="Facebook" $facebook_checked>Facebook<br> 
            <input type="checkbox" id="behance" name="behance" value="Behance" $behance_checked>Behance<br>                       
            <input type="checkbox" id="instagram" name="instagram" value="Instagram" $instagram_checked>Instagram<br>                        
            <input type="checkbox" id="other" name="other" value="Other" $other_checked>Other<br>
            </div>
    </div>
    
    <div class = "formleft">
    <label for="message" class="formgroup">Message</label><br>
    $messageerror
    <textarea name="message" id="message" rows="15" cols="75"
    title="Enter the message you would like to send">$message</textarea>
    </div>
    
    <input type="submit" name="submit" id="submit" value="Send">
</form>
END_OF_FORM;
    }
?>
            </div>
        </div>
    </div>
    

</body>
</html>