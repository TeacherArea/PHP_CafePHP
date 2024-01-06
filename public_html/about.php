<?php define("TITLE", "Cafe PHP | ABOUT"); ?>
<?php include '../resources/templates/header.php'; ?>
<div class="ad-container">
  <div class="init-introtext">
  <h3>About</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint	occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	</p>
  </div>
  <div class="clearfix">
  <?php
    foreach($staff as $staffmember){
  ?>
    <div class="card">
      <img class="about-img" src="img/<?php echo $staffmember['img']; ?>.jpg" alt="<?php echo $staffmember['name'] ?>" style="width:100%">
      <h3><?php echo $staffmember['name'] ?></h3>
      <p><?php echo $staffmember['position'] ?></p>
      <p><?php echo $staffmember['bio'] ?></p>
      <p><button class="init-button" onclick="window.location.href='contact.php'">CONTACT</button></p>
    </div>
  <?php
    }
  ?>
  </div>
<?php include '../resources/templates/footer.php'; ?>