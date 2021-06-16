<!-- Breadcrumb -->
<style>
.item {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.btn-pay {
  background-color: #C800Da;
  border: 0;
  color: #fff;
  font-weight: 600;
}

.fa-ticket {
  color: #0e1fa1;
}
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/main_con/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
    </ol>
</nav>

<!-- Table -->

<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">

    <h3 style="text-align: center;">List Pembelian Obat</h3>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
                <tr>
                    <td><?php echo $dat->User_pembeli ?></td>
                    <td><?php echo $dat->Harga ?></td>
                </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
</div>


<!--inibaruuuuuuuu -inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-inibaruuuuuuuu-->


    

  </div>
</div><!-- container -->
<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
} );
$(document).ready(function() {

/* Set rates */
var taxRate = 0.05;
var fadeTime = 300;

/* Assign actions */
$('.pass-quantity input').change(function() {
  updateQuantity(this);
});

$('.remove-item button').click(function() {
  removeItem(this);
});


/* Recalculate cart */
function recalculateCart() {
  var subtotal = 0;

  /* Sum up row totals */
  $('.item').each(function() {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });

  /* Calculate totals */
  var tax = subtotal * taxRate;
  var total = subtotal;

  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(total.toFixed(2));
    $('.cart-total').html(total);
    if (total == 0) {
      $('.checkout').fadeOut(fadeTime);
    } else {
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function() {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}

});
</script>