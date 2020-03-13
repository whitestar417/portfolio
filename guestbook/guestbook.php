<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyles.css">
    <title>David's Guestbook</title>
    <link rel="icon" href="images/book.jfif" type="image/jfif">
</head>
<body>
    <div class="container">
        <a href="admin.php" id="admin" class="btn btn-sm btn-primary float-right">Admin</a>
    </div>
    <div class="jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sign My Guestbook</h1>
            <p class="lead">It's always great to hear from old friends. Please sign my guestbook so we can stay in touch.</p>
        </div>
    </div>

    <container class="form-group">
        <form id="guestbookForm"  action="confirm.php" method="post">

            <!-- Contact Info -->
            <fieldset class="form-group">
                <legend>Contact Info</legend>

                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName">
                    <span class="err" id="errFname">Please enter a first name</span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName">
                    <span class="err" id="errLname">Please enter a last name</span>
                </div>
                <div class="form-group">
                    <label for="jobTitle">Job Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle">
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company">
                </div>
                <div class="form-group">
                    <label for="linkedIn">Linked In URL</label>
                    <input type="text" class="form-control" id="linkedIn" name="linkedIn">
                    <span class="err" id="errLinkedIn">Please enter a valid url</span>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span class="err" id="errEmail">Please enter your email address</span>
                    <span class="err" id="errValidEmail">Please enter a valid email address</span>
                </div>

                <!-- Contact Information -->
            </fieldset>

            <!-- Background Info -->
            <fieldset class="form-group">
                <legend>How did we meet?</legend>

                <select class="form-control" id="meet" name="meet">
                    <option value="none">Select an option</option>
                    <option value="new">Haven't met yet</option>
                    <option value="school">School</option>
                    <option value="jobFair">Job Fair</option>
                    <option value="meetUp">Meetup</option>
                    <option value="other">Other</option>
                </select>
                <span class="err" id="errMeet">Please tell me how we met</span>

                <div class="form-group">
                    <label for="other">Other</label>
                    <input type="text" class="form-control" id="other" name="other">
                </div>

                <div class="form-group">
                    <label for="other" name="message" id="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
            </fieldset>

            <!-- Mailing list -->
            <fieldset class="form-group">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="mailingList" name="mailingList">
                    <label class="form-check-label" for="terms">Please add me to your email list!</label>
                </div>
            </fieldset>

            <!-- Email format -->
            <fieldset class="form-group" id="method">
                <legend name="method" id="method">Please choose an email format:</legend>
                <div class="form-check">
                    <input type="radio" id="method" name="method" class="form-check-input" value="html">
                    <label class="form-check-label" for="html" id="method">HTML</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="method" name="method" class="form-check-input" value="text">
                    <label class="form-check-label" for="text" id="method">Text</label>
                </div>
            </fieldset>

            <!-- Submit button -->
            <input type="submit" class="btn btn-primary" id = "submit"></input>
        </form>
    </container>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/guestbook.js"></script>

</body>
</html>