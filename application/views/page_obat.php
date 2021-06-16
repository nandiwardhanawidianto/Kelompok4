<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/main_con/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Obat</li>
    </ol>
</nav>

<!-- Table -->
<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">
    <h3 style="text-align: center;">Daftar Obat</h3>
    <?php if ($this->session->userdata('role'=="admin")) { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_obat" style="margin-bottom: 15px">Tambah Data Obat</button>
    <?php } ?>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama Obat</th>
                <th scope="col">Golongan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Bentuk</th>
                <?php if ($this->session->userdata('role'=="admin")) { ?>
                    <th scope="col">Control</th>
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
                    <?php if ($this->session->userdata('role'=="admin")) { ?>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $dat->id_obat ?>">Edit</button>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/obat_con/delete_obat/<?php echo $dat->id_obat ?>" onClick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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

<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>