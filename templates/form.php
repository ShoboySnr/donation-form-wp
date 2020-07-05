<?php 
include_once(SLD_PLUGIN_DIR.'/utils/currency.php'); 


?>
<div id="donateform">
  <div class="form-container">
    <form>
      <div class="d-group">
        <label for="emailaddress">Email address</label>
        <input type="email" name="emailaddress" id="emailaddress" placeholder="Email address" />
      </div>
      <div class="d-group">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name"/>
      </div>
      <div class="d-group">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name"/>
      </div>
       <div class="d-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"/>
      </div>
      <div class="d-group">
        <div class="radio-group">
          <?php 
            $count = 0;
            $amounts = explode(', ', $atts['amount']);
            foreach($amounts as $amount) {
              $count++;
              // $format = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
              // $string = $format->formatCurrency($amount, $atts['currency']);
          ?>
          <label for="amount<?= $count ?>" class="radio-group-class">
            <input type="radio" name="amount" id="amount<?= $count ?>" value="<?= $amount ?>" > <?= $atts['currency']; ?><?= number_format($amount, 2); ?>
          </label>
          <?php 
          }  
          ?>
          <label for="other_amount" class="radio-group-class">
            <input type="radio" name="amount" id="other_amount" value="other" > Other 
          </label>
        </div>
      </div>
      <div class="d-group" style="display: none" id="show_other_amount">
        <input type="number" name="amount_2" id="amount_2" placeholder="Enter a custom amount in Naira"  />
      </div>
      <div id="error"></div>
      <div class="d-group">
        <input type="hidden" name="currency" id="currency" value="<?= $atts['currency']; ?>" />
        <input type="hidden" name="plugin_dir" id="plugin_dir" value="<?= SLD_PLUGIN_URL ?>" />
        <button type="button" class="submit-button" id="submit-button">Donate Now </button>
      </div>
    </form>
  </div>
</div>