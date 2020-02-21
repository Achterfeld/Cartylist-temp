<?php require_once './../../config.php' ?>

<?php include "./includes/header.php" ?>

<button id="checkout-button">Pay</button>

<script src="https://js.stripe.com/v3"></script>
<script>
var stripe = Stripe('<?php echo $stripe['publishable_key']; ?>');

var checkoutButton = document.querySelector('#checkout-button');
checkoutButton.addEventListener('click', function () {
  stripe.redirectToCheckout({
    items: [{
      // Define the product and SKU in the Dashboard first, and use the SKU
      // ID in your client-side code.
      sku: 'sku_Gltrh8elnSx1XP',
      quantity: 1
    }],
    successUrl: 'http://localhost:3000/public/vues/index.php',
    cancelUrl: 'http://localhost:3000/public/vues/payement.php'
  }).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  console.log(result.error.message);
});
});
</script>
<?php include "./includes/footer.php" ?>


