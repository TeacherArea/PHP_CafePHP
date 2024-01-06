  <div class="init-display-topleft init-container init-xlarge">
    <p><button onclick="document.getElementById('menu').style.display='block'" class="init-blackbutton init-black">disches</button></p>
    <p><button onclick="document.getElementById('contact').style.display='block'" class="init-blackbutton init-black">reservations</button></p>
  </div>

</div>
<!-- Disches Modal -->
<div id="menu" class="init-modal">
  <div class="init-modal-content init-animate-zoom">
    <div class="init-container init-black init-display-container">
      <span class="init-button init-display-topright init-large" onclick="document.getElementById('menu').style.display='none'">x</span>
      <h2>Starters</h2>
    </div>
    <div class="init-container">
      <h5>Tomato Soup <b>$2.50</b></h5>
      <h5>Chicken Salad <b>$3.50</b></h5>
      <h5>Bread and Butter <b>$1.00</b></h5>
    </div>
    <div class="init-container init-black">
      <h2>Main Courses</h2>
    </div>
    <div class="init-container">
      <h5>Grilled Fish and Potatoes <b>$8.50</b></h5>
      <h5>Italian Pizza <b>$5.50</b></h5>
      <h5>Veggie Pasta <b>$4.00</b></h5>
      <h5>Chicken and Potatoes <b>$6.50</b></h5>
      <h5>Deluxe Burger <b>$5.00</b></h5>
    </div>
    <div class="init-container init-black">
      <h2>Desserts</h2>
    </div>
    <div class="init-container">
      <h5>Fruit Salad <b>$2.50</b></h5>
      <h5>Ice cream <b>$2.00</b></h5>
      <h5>Chocolate Cake <b>$4.00</b></h5>
      <h5>Cheese <b>$5.50</b></h5>
    </div>
  </div>
</div>

<!-- Reservation Modal -->
  <div id="contact" class="init-modal">
    <div class="init-modal-content init-animate-zoom">
      <div class="init-container init-black">
        <span class="init-button init-display-topright init-large" onclick="document.getElementById('contact').style.display='none'">x</span>
        <h2>Reservations</h2>
      </div>
      <div class="init-container">
        <p>Reserve a table, ask for today's special or just send us a message:</p>
        <form action="/mail.php" target="_blank">
          <p><input class="init-input" type="text" placeholder="Name" required name="Name"></p>
          <p><input class="init-input" type="number" placeholder="How many people" required name="People"></p>
          <p><input class="init-input" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
          <p><input class="init-input" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
          <p><button class="init-blackbutton" type="submit">SEND MESSAGE</button></p>
        </form>
      </div>
    </div>
  </div>