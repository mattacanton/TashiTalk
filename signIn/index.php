<?php

include ('../userSystem/userBase.php');

// Forward user to user dashboard if they are signed in
if (isset($_SESSION['first_name'])) {
  header("location: ../userDashboard/");
}

//Incoming POST var holders
$login_email = $login_password = "";

//Error holders
$login_emailErr = $login_passwordErr = $login_invalidErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   //Check no POST field is empty if not pull them into variables
   if (empty($_POST["login_email"]) or empty($_POST["login_password"])) {
     error_log ("CUSTOM WARNING: POST on Log In attempted to submit through form with a empty field");
   } else {
        $login_email = ($_POST["login_email"]);
        $login_password = ($_POST["login_password"]);

       //Checks to make sure the email is formated as a email
       if (!filter_var($login_email, FILTER_VALIDATE_EMAIL)) {
         $login_emailErr = "Invalid email format."; 
       }

       //Checks to make sure password is not empty.  Generates error though form blocks blank submition for final error check and non page hacked submits
       if (strlen($login_password)<1){
        $login_passwordErr = "Password is empty"; 
       }

       //Clean the variables
       $login_email = clean_input($login_email);
       $login_password = clean_input($login_password);

       if(($login_emailErr == "") and ($login_passwordErr == "")) {

	      	//Variables
	      	$retrieved_password_hash = "";

	        //Retrieves login if it exists
			$sql = "SELECT * FROM users WHERE email = :login_email"; 
	        $query = $db->prepare( $sql );
	        $query->execute( array( ':login_email'=>$login_email ) );
          if ($query->rowCount() > 0){

  		        $row = $query->fetch();
  		        $retrieved_password_hash = $row['password'];


  				//verify password
  				$password_valid = password_verify($login_password, $retrieved_password_hash);

  				if ($password_valid){
  					//Sign in successful

  					//Add variables to session
  					$_SESSION["first_name"] = $row['first_name'];
  					$_SESSION["last_name"] = $row['last_name'];
  					$_SESSION["email"] = $login_email;
  					$_SESSION["user_number"] = $row['userNumber'];

  					//Redirect to User Dashboard
  					header("location: ../userDashboard/");

  				}
  				else{
  					$login_invalidErr = "Email Password combination is not correct";
  				}
			}
			else{
				$login_invalidErr = "Email Password combination is not correct";
			}
      }
    }

}




?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>TashiTalk - Sign In</title>

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

          	<span class="error-message"><?php echo $login_invalidErr;?></span>

            <span class="error-message"><?php echo $login_emailErr;?></span>
            <div class="form__field">
              <label class="fa fa-envelope" for="login__email"><span class="hidden">Email</span></label>
              <input name="login_email" id="login__email" type="text" class="form__input" placeholder="Email" required>
            </div>

            <span class="error-message"><?php echo $login_passwordErr;?></span>
            <div class="form__field">
              <label class="fa fa-lock" for="login__password"><span class="hidden">Password</span></label>
              <input name="login_password" id="login__password" type="password" class="form__input" placeholder="Password" required>
            </div>

            <div class="form__field">
              <input type="submit" value="Sign In">
            </div>

          </form>

                <p class="text--center">Not a member? <a href="../signUp">Sign up now</a> <span class="fa fa-arrow-right"></span></p>

        </div>

      </div>
      </div>

    </body>
</html>
