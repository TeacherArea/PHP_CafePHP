<?php 
  define("TITLE", "Cafe PHP | REGISTER");
  require '../resources/settings/global.inc.php';
  include '../resources/templates/header.php';
?>
<div class="ad-container">
  <div class="init-container">
    <h3>Create account</h3>
    <p>
      Hello there. Pleased to meet you. We are so glad that you want to join us!
    </p>
    <p id="control-message">
      Please read our terms, and then fill in the form bellow. Once done, we will send
      you the code for you two free cup of coffee of your own choice.
    </p>

      <img class="init-blogimage" src="img/coffee_registerheader.jpg" alt="World of Coffee">
  </div>
  
  <div class="init-container">
       <p>&nbsp;</p>
      <h3>Please fill in the form</h3>
      <form action="" method="post" target="_self">
        <p><input class="init-input" type="text" id="firstname" name="firstname" placeholder="Firstname" required></p>
        <p><input class="init-input" type="text" id="lastname" name="lastname" placeholder="Lastname" required></p>
        <p><input class="init-input" type="email" id="email" name="email" placeholder="E-mail" required></p>
        <p><textarea class="init-textarea" id="presentation" name="presentation" placeholder="Presentation (optional)" style="height:200px"></textarea></p>
        <p>&nbsp;</p>
        <h4>* username are used to log in and to be displayed in public</h4>
        <p><input class="init-input" type="text" id="username" name="username" placeholder="Username" required></p>
        <p><input class="init-input" type="text" id="password" name="password" placeholder="Password" required></p>
        <p><input class="init-input" type="text" id="repassword" name="repassword" placeholder="Retype password" required></p>
        <p>&nbsp;</p>
        <p><button class="init-button" type="submit" name="register_submit">CREATE ACCOUNT</button>
        <input class="init-button" type="reset" value="RESET FORM"></input>
        <a class="init-button" href="../public_html/blog.php">JUST LOOKING</a></p>
      </form>
  </div>
  <div class="footer-push"></div>
<?php
  if(isset($_POST['register_submit']))
  {
    /* trim()) tar bort eventuella mellanslag, och filter_input() attributet FILTER_SANITIZE_ADD_SLASHES
      lägger till ett \ framför tecken som (' " \ NULL) eftersom sådana annars skulle tolkas som kod */
    $password   = trim(filter_input(INPUT_POST, "password",   FILTER_SANITIZE_ADD_SLASHES));
    $repassword = trim(filter_input(INPUT_POST, "repassword", FILTER_SANITIZE_ADD_SLASHES));
    
    /* Kontroll om angivna lösenord är likadana */
    if($password == $repassword)
    {
      /*
        Kontroll huruvuda användaren har ett tillräcklgt bra lösenord.
        Observera att @[^\w]@ accepterar tecken som å, ä, ö
      */
      $uppercase =    preg_match("@[A-Z]@", $password);
      $lowercase =    preg_match("@[a-z]@", $password);
      $number    =    preg_match("@[0-9]@", $password);
      $specialchar =  preg_match('@[^\w]@', $password);

      /*  1) Säkrar inmatade värden,
          2) placerar dem i en array och
          3) skickar med arrayen i anropet av en funtion som kopplar till databas
          && ($uppercase == 1) && ($lowercase == 1) && ($number == 1) && ($specialchar == 1) */
      if(strlen($password) >= 8 )
      {
        echo $password;
        $firstname    = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $lastname     = trim(filter_input(INPUT_POST, 'lastname',  FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email        = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_EMAIL));
        $presentation = filter_input(INPUT_POST, 'presentation',   FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username     = filter_input(INPUT_POST, 'username',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password     = password_hash($password, PASSWORD_DEFAULT);

        $newuser = array (
          $firstname, $lastname, $email, $presentation, $username, $password
        );
        
        RegisterNewUser($newuser);
      }

      else
      {
        echo  "<script>
                var errormessage = '* Your password is too short!\n
                                    It needs to be of at least eight characters, include numbers\n
                                    and mixed upper-case/lower-case.\n\n
                                    Please try again.';
                colorred = errormessage.fontcolor('red');
                document.getElementById('control-message').innerHTML = colorred;
              </script>";
      }
    }

    else
    {
      echo  "<script>
              var errormessage = '* Passwords do not match, try again.';
              colorred = errormessage.fontcolor('red');
              document.getElementById('control-message').innerHTML = colorred;
            </script>";
    }
  }

  else
  {
    echo  "<script>
            var errormessage = '* Some things in the form is still missing!';
            colorred = errormessage.fontcolor('red');
            document.getElementById('control-message').innerHTML = colorred;
          </script>";
  }
?>
    </div>
  <div class="footer-push"></div>
<?php
  include '../resources/templates/footer.php';
?>