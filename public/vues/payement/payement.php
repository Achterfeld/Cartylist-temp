<?php require_once './../../../config.php' ?>

<?php include "./../includes/header.php" ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-name="Gold Tier"
          data-description="Access for a year"
          data-amount="5000"
          data-currency="cad"
          data-locale="auto"
          data-label="Subscribe"></script>

</form>
<?php include "./../includes/footer.php" ?>

