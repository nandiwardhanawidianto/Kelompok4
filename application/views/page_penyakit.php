<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/main_con/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Penyakit</li>
    </ol>
</nav>

<!-- Table -->
<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">
    <h3 style="text-align: center;">Daftar Penyakit</h3>
    <?php if ($this->session->userdata('role'=="admin")) { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_penyakit" style="margin-bottom: 15px">Tambah Data Penyakit</button>
    <?php } ?>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama Penyakit</th>
                <th scope="col">Gejala</th>
                <th scope="col">Tingat Berbahaya</th>
                <th scope="col">Obat</th>
                <?php if ($this->session->userdata('role'=='admin')) { ?>
                    <th scope="col">Control</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
                <tr>
                    <td><?php echo $dat->penyakit ?></td>
                    <td><?php echo $dat->gejala ?></td>
                    <td><?php echo $dat->tingkat_berbahaya ?></td>
                    <td><?php echo $dat->obat ?></td>
                    <?php if ($this->session->userdata('role'=="admin")) { ?>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $dat->id_penyakit ?>">Edit</button>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/penyakit_con/delete_penyakit/<?php echo $dat->id_penyakit ?>" onClick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_penyakit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>index.php/penyakit_con/add_penyakit">
                    <div class="form-group">
                        <label>Nama Penyakit</label>
                        <input type="text" class="form-control" placeholder="Nama Penyakit" name="penyakit" required>
                    </div>
                    <div class="form-group">
                        <label>Gejala</label>
                        <input type="text" class="form-control" placeholder="Gejala" name="gejala" required>
                    </div>
                    <div class="form-group">
                        <label>Tingkat Berbahaya</label>
                        <input type="text" class="form-control" placeholder="Tingkat Berbahaya" name="tingkat_berbahaya" required>
                    </div>
                    <div class="form-group">
                        <label>Obat</label>
                        <input type="text" class="form-control" placeholder="Obat" name="obat" required>
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
<?php $id = 1; foreach ($data as $dat ) {?>
    <div class="modal fade" id="edit<?php echo $dat->id_penyakit ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/penyakit_con/edit_penyakit">
                        <input type="hidden" class="form-control" name="id_penyakit" value="<?php echo $dat->id_penyakit ?>" required>
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input type="text" class="form-control" placeholder="Nama Penyakit" name="penyakit" value="<?php echo $dat->penyakit ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gejala</label>
                            <input type="text" class="form-control" placeholder="Gejala" name="gejala" value="<?php echo $dat->gejala ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tingkat Berbahaya</label>
                            <input type="text" class="form-control" placeholder="Tingkat Berbahaya" name="tingkat_berbahaya" value="<?php echo $dat->tingkat_berbahaya ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Obat</label>
                            <input type="text" class="form-control" placeholder="Obat" name="obat" value="<?php echo $dat->obat ?>" required>
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