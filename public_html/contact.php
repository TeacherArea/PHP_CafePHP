<?php define("TITLE", "Cafe PHP | CONTACT"); ?>
<?php include '../resources/templates/header.php'; ?>
<div class="ad-container">
  <div class="init-introtext">
  <h3>Contact</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint	occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	</p>
  </div>
  <?php
    //Om knappen submitt har trycks på

      if(isset($_POST['contact_submit']))
      {
        //filtrera snvändarens input från otillåtna tecken
        $fname = trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $lname = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
        $msg   = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      
        //dubbelkolla (lita inte på html/css) så fälten inte är tomma 
        if(!$fname || !$lname || !$email || !$msg )
        {
          echo '<h4 class="error">All fields required.</h4>';
          echo '<p class="LBS-button LBS-light-grey LBS-block"><a href="contact.php">Go back and try again</a></p>';
          exit;
        }

        //Rekonstruera meddelandets alla värden till en variabel
        $to = "addresse@domain.se";
        $subject = $fname . " " . $lname . " sents us a message.";
        $message = "Name: $fname $lname\r\n";
        $message .= "Email: $email\r\n";
        $message .= "Message:\r\n$msg";
        //Kontrollera subscripe inklusive värde 
        if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe')
        {
          $message .="\r\n\r\nAdd $email to the mailing list.\r\n";
        }
        //Sätt längden på stycken till läsvänligt
        $message = wordwrap($message, 72);
        //Ordna huvudet op mailet till en variabel, och sätt några värden
        $headers = "MIME-Version 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $fname $lname <$email>\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";

        mail($to, $subject, $message, $headers);
    ?>
  
      <h4>Thanks for contacting Café PHP</h4>
      <p>Please allow 24 hours for a response.</p>
      <p><a class="LBS-button LBS-light-grey LBS-block" href="index.php">Now its time for some Coffee!</a></p>

  <?php } else { ?>
  <div class="init-container">
    <form method="post" action="" method="contact" target="_self">
      <p><input class="init-input" type="text" id="firstname" name="firstname" placeholder="Firstname" required></p>   
      <p><input class="init-input" type="text" id="lastname" name="lastname" placeholder="Lastname" required></p>
      <p><input class="init-input" type="email" id="email" placeholder="Your email" required name="email"></p>
      <p><textarea class="init-textarea" name="message" placeholder="Your message" required style="height:200px"></textarea></p>
      <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
      <label for="subscribe">Subscribe to our newletter</label>
      
      <p><button class="init-button" type="submit" name="contact_submit">SEND MESSAGE</button>
      <input class="init-button" type="reset" value="RESET"></input></p>
    </form>
  </div>
  <?php } ?>
</div>

<?php include '../resources/templates/footer.php'; ?>