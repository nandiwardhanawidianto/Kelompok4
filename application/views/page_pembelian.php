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

    <h3 style="text-align: center;">Daftar Obat</h3>
    <?php if ($this->session->userdata('role', 'user')) { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_obat" style="margin-bottom: 15px">Tambah Data Obat</button>
    <?php } ?>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama Obat</th>
                <th scope="col">Golongan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Bentuk</th>
                <?php if ($this->session->userdata('role', 'user')) { ?>
                    <th scope="col">Beli</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
                <tr>
                    <td><?php echo $dat->obat ?></td>
                    <td><?php echo $dat->golongan ?></td>
                    <td><?php echo $dat->kategori ?></td>
                    <td><?php echo $dat->bentuk ?></td>
                    <?php if ($this->session->userdata('role', 'user')) { ?>
                        <td>
                        <div class="col-lg-5 col-5 text-lg-left">
                            <h3 class="h6 mb-0">SpaceJet Flex ticket<br>
                                <small>Rp<?php echo $dat->harga ?></small><!--QUERYY HARGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
                            </h3>
                            </div>
                            <div class="product-price d-none"><?php echo $dat->harga ?></div><!--QUERYY HARGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                            <label for="pass-quantity" class="pass-quantity">Quantity</label>
                            <input class="form-control" type="number" value="0" min="0">
                            </div>
                            <span class="product-line-price" id="Total harga">0<!--QUERYY HARGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
                            </span>

                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_obat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>index.php/obat_con/add_obat">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" class="form-control" placeholder="Nama Obat" name="obat" required>
                    </div>
                    <div class="form-group">
                        <label>Golongan</label>
                        <input type="text" class="form-control" placeholder="Golongan" name="golongan" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" placeholder="Kategori" name="kategori" required>
                    </div>
                    <div class="form-group">
                        <label>Bentuk</label>
                        <input type="text" class="form-control" placeholder="Bentuk" name="bentuk" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<?php $id = 1; foreach ($data as $dat) {?>
    <div class="modal fade" id="edit<?php echo $dat->id_obat ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/obat_con/edit_obat">
                        <input type="hidden" class="form-control" name="id_obat" value="<?php echo $dat->id_obat ?>" required>
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" placeholder="Nama Obat" name="obat" value="<?php echo $dat->obat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Golongan</label>
                            <input type="text" class="form-control" placeholder="Golongan" name="golongan" value="<?php echo $dat->golongan ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" placeholder="Kategori" name="kategori" value="<?php echo $dat->kategori ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Bentuk</label>
                            <input type="text" class="form-control" placeholder="Bentuk" name="bentuk" value="<?php echo $dat->bentuk ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        

<?php } ?>
<div class="border-bottom border-gainsboro">
        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
          <p class="text-uppercase"><strong>Total Harga</strong></p>
          <p class="totals-value font-weight-bold cart-total"id="cart-total">0</p>
        </div>
</div>

<div id ="container"> 
<button onclick="myFunction()">Chekout</button>
</div>

<script>
function myFunction() {
  alert("Chekout Berhasil");
}
</script>

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
    document.getElementById("Total Harga").innerHTML =Total;  //JavaScript Error ==================================
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