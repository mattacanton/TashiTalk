<?php

include ('../userSystem/userBase.php');

// Forward user to user Dashboard if they are signed in
if (isset($_SESSION['username'])) {
  header("location: ../userDashboard/");
}

//Incoming POST var holders
$register_first_name = $register_last_name = $register_email = $register_password = "";

//Error holders
$register_first_nameErr = $register_last_nameErr = $register_emailErr = $register_passwordErr = $register_email_in_useErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


   //Check no POST field is empty if not pull them into variables
   if (empty($_POST["register_first_name"]) or empty($_POST["register_last_name"]) or empty($_POST["register_email"]) or empty($_POST["register_password"])) {
     error_log ("CUSTOM WARNING: POST on Sign Up attempted to submit through form with a empty field");
   } else {
        $register_first_name = ($_POST["register_first_name"]);
        $register_last_name = ($_POST["register_last_name"]);
        $register_email = ($_POST["register_email"]);
        $register_password = ($_POST["register_password"]);

      //Checks to make sure the first name only contains letters and spaces
      if (!preg_match("/^[a-zA-Z ]*$/",$register_first_name)) {
        $register_first_nameErr = "Only letters and spaces in your first name"; 
      }

      //Checks to make sure the last name only contains letters and spaces
      if (!preg_match("/^[a-zA-Z ]*$/",$register_last_name)) {
        $register_last_nameErr = "Only letters and spaces in your last name"; 
      }

      //Checks to make sure first name is longer than 1 characters
      if (strlen($register_first_name)<2){
        $register_first_nameErr = "First name longer than 1 characters please."; 
      }

           //Checks to make sure last name is longer than 3 characters
      if (strlen($register_last_name)<2){
        $register_last_nameErr = "Last name longer than 1 characters please."; 
      }

      //Checks to make sure the email is formated as a email
      if (!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
        $register_emailErr = "Invalid email format."; 
      }

      //Checks to make sure the password is safe to be stored and won't be changed while being cleaned for storage in database
      if (!($register_password == (htmlspecialchars($register_password))) or !($register_password == (stripslashes($register_password)))) {
        $register_passwordErr = "Password contains symbols that are not allowed."; 
      }

      //Checks to make sure password is longer than 6 characters
      if (strlen($register_password)<9){
        $register_passwordErr = "A password longer than 8 characters please."; 
      }

      //Checks that the password contains a number
      if (!preg_match('#[0-9]#',$register_password)){ 
        $register_passwordErr = "Please use a number in your password.";
      }

      //Clean the variables
      $register_first_name = clean_input($register_first_name);
      $register_last_name = clean_input($register_last_name);
      $register_email = clean_input($register_email);
      $register_password = clean_input($register_password);

      if(($register_first_nameErr == "") and ($register_last_nameErr == "") and ($register_emailErr == "") and ($register_passwordErr == "")) {

        //Check if the email is already in user table
          //Check user table for email
          $sql = "SELECT email FROM users WHERE email = :register_email"; 
          $query = $db->prepare( $sql );
          $query->execute( array( ':register_email'=>$register_email ) );

          //If it is not found at least once register
          if(!($query->rowCount() > 0)){

            //hash password
            $register_password = password_hash($register_password, PASSWORD_BCRYPT);
            //Insert into users table
            $sql = "INSERT INTO users ( first_name, last_name, password, email, activated) VALUES ( :first_name, :last_name, :password, :email, :activated )";
            $query = $db->prepare( $sql );
            $query->execute( array( ':first_name'=>$register_first_name, ':last_name'=>$register_last_name,':password'=>$register_password, ':email'=>$register_email, ':activated'=>'0' ) );
            header("location: ../index.php");
          }
          //Email was found in user table print error
          else{
            $register_email_in_useErr = "Email already in use";
          }
      }
    }

}




?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>TashiTalk - Sign Up</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>



    <body>

    <div class="align">
      <div class="site__container">


        <div class="grid__container">
        <center><img src="images/TT_mid.png" alt="logo" align="middle" >
        <br>
        <br>
        <br>
        </center>

          <form action="" method="post" class="form form--login">

            <span class="error-message"><?php echo $register_first_nameErr;?></span>
            <div class="form__field">
              <label class="fa fa-user" for="login__username"><span class="hidden">First Name</span></label>
              <input name="register_first_name" id="login__username" type="text" class="form__input" placeholder="First Name" required>
            </div>

            <span class="error-message"><?php echo $register_last_nameErr;?></span>
            <div class="form__field">
              <label class="fa fa-user" for="login__username"><span class="hidden">Last Name</span></label>
              <input name="register_last_name" id="login__username" type="text" class="form__input" placeholder="Last Name" required>
            </div>
              
            <span class="error-message"><?php echo $register_email_in_useErr;?></span>  
            <span class="error-message"><?php echo $register_emailErr;?></span>
            <div class="form__field">
              <label class="fa fa-envelope" for="login__email"><span class="hidden">Email</span></label>
              <input name="register_email" id="login__email" type="text" class="form__input" placeholder="Email" required>
            </div>

            <span class="error-message"><?php echo $register_passwordErr;?></span>
            <div class="form__field">
              <label class="fa fa-lock" for="login__password"><span class="hidden">Password</span></label>
              <input name="register_password" id="login__password" type="password" class="form__input" placeholder="Password" required>
            </div>

            <div class="form__field">
              <input type="submit" value="Sign Up">
            </div>

          </form>

        </div>

      </div>
      </div>

    </body>
</html>
