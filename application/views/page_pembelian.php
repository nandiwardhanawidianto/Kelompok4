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

#container{
    text-align: right;
}
#btnchekout{
    padding : 10px;
    margin :20 px;
}

</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/main_con/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembelian</li>
    </ol>
</nav>

<!-- Tableeeee -->
<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">
<a class="nav-link" href="<?php echo base_url(); ?>index.php/pembelian_con/index3">List Pembelian</a>
    <h3 style="text-align: center;">Daftar Obat</h3>

    <table class="table table-hover table-dark" style="margin-top: 25px;" id="mytable">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama Obat</th>
                <th scope="col">Golongan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Bentuk</th>
                <th scope="col">Harga</th>
                <?php if ($this->session->userdata('role', 'user')) { ?>
                    <th scope="col">Beli</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
              
                <tr class='uwu'>
            
                    <td class='ovat'><?php echo $dat->obat ?></td>
                    <td><?php echo $dat->golongan ?></td>
                    <td><?php echo $dat->kategori ?></td>
                    <td><?php echo $dat->bentuk ?></td>
                    <?php if ($this->session->userdata('role', 'user')) { ?>
                        <td>
                        <div class="col-lg-5 col-5 text-lg-left">
                        
                            </div>
                            <div class="product-price d-none"><?php echo $dat->harga ?></div>
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                            <label for="pass-quantity" class="pass-quantity">Quantity</label>
                            <input class="form-control" type="number" value="0" min="0">
                            </div>
                            <span class="product-line-price">0
                            </span>

                        </td>
                    <?php } ?>

                </tr>
                
            <?php } ?>
        </tbody>
        
    </table>
    
</div>
<div class="border-bottom border-gainsboro">
        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
          <p class="text-uppercase"><strong>Total Harga</strong></p>
          <p class="totals-value font-weight-bold cart-total"id="cart-total">0</p>
        </div>
</div>


<div id ="container"> 
<button onclick="myFunction()">Chekout</button>
</div>

<div>
  <form id="dynForm" method="POST" action="<?php echo base_url(); ?>index.php/pembelian_con/add_pesanan" >
  <input type="hidden" class="form-control" placeholder="Nama Obat" name="ovvat" id='abc' value=''>
  <input type="hidden" class="form-control" placeholder="jumlah" name="jumllah"  id='ccc'value='' >
  <input type="hidden" class="form-control" placeholder="harga" name="hargaa"  id='ddd' value=''>
  </form>
</div>





<script type="text/javascript">


$(document).ready( function () {
    $('#table').DataTable();
    
} );

function myFunction() {
  $("tr.uwu").each(function() {
      var obat    = $('.ovat').html();
      var jumlah  = $('.pass-quantity input').val();
      var harga   = $('.totals-value').html();
      document.getElementById("abc").value = obat;
      document.getElementById("ccc").value = jumlah;
      document.getElementById("ddd").value = harga;
      document.getElementById("dynForm").submit();
      alert('Pembelian berhasil');
  });
    };


$(document).ready(function() {
 
/* Set rates */
var fadeTime = 300;

/* Assign actions */
$('.pass-quantity input').change(function() {
  updateQuantity(this);
});




/* Recalculate cart      

    */

function recalculateCart() {
  var subtotal = 0;
  var tes = 0;
  var total;
  /* Sum up row totals */
  $('.product-line-price').each(function() {
    subtotal += parseFloat($(this).text());
  });
  /* ======================================== */

  var isi = [];
  $('.form-control').each(function() {
    isi.push(parseFloat($(this).val()));
  });


  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('.totals-value').html(subtotal);
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



});
</script>