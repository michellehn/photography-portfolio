<!DOCTYPE html>
<html>
    
<?php
include('header.html');
?>

<body>
    <?php
    include('nav.html');
    ?>

    <div id="mainhome">
    <div id="formbox">
        <h4>contact</h4>
        <div id="form">
<form name="contactform" action="contactecho_noclientside.php" method="GET" novalidate>
    <div class="formright">
        <label for="what" class="formgroup">Interested in...</label><br>
        <select name="what" id="what">
            <option value="chooseone">(Choose one)</option>
            <option value="Hiring Michelle">Hiring Michelle</option>
            <option value="Using my work">Using my work</option>
            <option value="Saying hi">Saying hi</option>
            <option value="Something else...">Something else...</option>
        </select>
    </div>
      
    <div class="formleft">
        <label for="name" class="formgroup">Name</label><br>
        <input name="name" id="name" type="text" placeholder="John Smith"
        title = "Enter your first and last name" maxlength="70" required>
    </div>
     
    <div class = "formleft">
        <label for="email" class="formgroup">Email</label><br>
        <input name="email" id="email" type="email" placeholder="name@company.com"
        title="Enter your email" maxlength="254" required>
    </div>
    
    <div class = "formleft">
        <label for="number" class="formgroup">Phone Number</label><br>
        <input name="number" id="number" type="text" placeholder="555-555-5555"
        maxlength="15" title="Enter your phone number" required>
    </div>
    
    <div class="formright" id="how">
        <label class="formgroup">How did you discover me?</label><br>
        <p class="optional">(optional)</p>
            <div id="checkboxes">
            <input type="checkbox" id="facebook" name="facebook" value="Facebook">Facebook<br> 
            <input type="checkbox" id="behance" name="behance" value="Behance">Behance<br>                       
            <input type="checkbox" id="instagram" name="instagram" value="Instagram">Instagram<br>                        
            <input type="checkbox" id="other" name="other" value="Other">Other<br>
            </div>
    </div>
    
    <div class = "formleft">
    <label for="message" class="formgroup">Message</label><br>
    <textarea name="message" id="message" rows="15" cols="75"
    title="Enter the message you would like to send" required></textarea>
    </div>
    
    <input type="submit" name="submit" id="submit" value="Send">
</form>
            </div>
        </div>
    </div>
    <script src='../js/script.js'></script>
</body>
</html>