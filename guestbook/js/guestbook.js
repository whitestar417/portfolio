
document.getElementById("guestbookForm").onsubmit = validate;

function validate()
{
    //Create a flag variable
    let valid = true;

    //Clear all errors
    let errors = document.getElementsByClassName("err");
    for (let i=0; i<errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //Check first name
    let first = document.getElementById("firstName").value;
    if (first == "") {
        let errFirst = document.getElementById("errFname");
        errFirst.style.visibility = "visible";
        valid = false;
    }

    //Check last name
    let last = document.getElementById("lastName").value;
    if (last == "") {
        let errLast = document.getElementById("errLname");
        errLast.style.visibility = "visible";
        valid = false;
    }


    // Checked LinkedIn address
    // valid URL
    let linkedIn = document.getElementById("linkedIn").value;
    if (linkedIn != "")
    {
        if (!is_url(linkedIn))
        {
            let errLinkedIn = document.getElementById("errLinkedIn");
            errLinkedIn.style.visibility = "visible";
            valid = false;
        }
    }


    // Check email
    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // If filled out or Mailing List checked
    // must be valid
    let email = document.getElementById("email").value;
    let mailingList = document.getElementById("mailingList").checked;
    let countAts = 0;
    let countDots = 0;

    if (email != "" || mailingList)
    {
        //let errEmail = document.getElementById("errEmail");
        //errEmail.style.visibility = "visible";
        //valid = false;

        for (let i = 0; i < email.length; i++)
        {
            if (email.charAt(i) == '@') {
                countAts++;
            }
            if (email.charAt(i) == '.') {
                countDots++;
            }
        }

        if (countAts != 1 || countDots < 1)
        {
            let errEmail = document.getElementById("errEmail");
            errEmail.style.visibility = "visible";
            valid = false;
        }
    }

    //Check how we met
    let meet = document.getElementById("meet").value;
    if (meet.value == "none") {
        let errMeet = document.getElementById("errMeet");
        errMeet.style.visibility = "visible";
        valid = false;
    }

    //Show textarea if other selected in how we met
    if (meet.value == "other") {
        other.style.visibility = "visible";
    }

    return valid;
}

// other functions
function is_url(linkedIn)
{
    regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (regexp.test(linkedIn))
    {
        return true;
    }
    else
    {
        return false;
    }
}