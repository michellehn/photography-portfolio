$(document).ready(function(){
    
    //add 'active' class to current page in nav bar
    
    var url = window.location.href;
    $('ul.a a').filter(function() {
        return this.href == url;
    }).addClass('active');
    
    $('#genremenu ul.sub a').filter(function() {
        return this.href == url;
    }).addClass('active');
    
});

//form validation
function validateForm() {

var errortype = "";

    errortype += validateWhat();
    errortype += validateName();
    errortype += validateEmail();
    errortype += validateNumber();
    errortype += validateMessage();
    
    if (errortype != "") {
        alert("Some fields need correcting. Please do the following:\n\n" + errortype);
        return false
    }
    return true
}

function validateName() {
    var namevalue =  document.forms["contactform"]["name"].value;
    errors = "";
    if (namevalue == "") {
        errors = "Enter your name.\n";
    }
    return errors;
}

function validateWhat() {
    var whatvalue =  document.forms["contactform"]["what"].value;
    errors = "";
    if (whatvalue == "chooseone") {
        errors = "Select an option under 'Interested in...'\n";
    }
    return errors;
}

function validateEmail() {
    var emailvalue =  document.forms["contactform"]["email"].value;
    errors = "";
    if (emailvalue == "") {
        errors = "Enter a valid email\n";
    }
    return errors;
}

function validateNumber() {
    var numbervalue =  document.forms["contactform"]["number"].value;
    errors = "";
    var regExp = /^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/;
    if (numbervalue == "") {
        errors = "Enter a valid phone number\n";
    }
    if (!numbervalue.match(regExp)){
        errors = "Enter a valid phone number\n";
    }
    return errors;
}

function validateMessage() {
    var messagevalue =  document.forms["contactform"]["message"].value;
    errors = "";
    if (messagevalue == "") {
        errors = "Enter a message\n";
    }
    if (messagevalue.length > 2000) {
        errors = "Enter a message shorter than 2000 characters\n";
    }
    return errors;
}