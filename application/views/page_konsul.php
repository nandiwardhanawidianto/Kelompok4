
<!-- Table -->
<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">
    <h3 style="text-align: center;">Daftar Konsul</h3>
	<?php if ($this->session->userdata('role')=="admin") { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_konsul" style="margin-bottom: 15px">Tambah Data Konsul</button>
	<?php } else { ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_konsul" style="margin-bottom: 15px">Tambah Data Konsul user</button>
	<?php }; ?>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Alamat</th>
                <th scope="col">Konsul</th>
                <?php if ($this->session->userdata('role')=='admin') { ?>
                    <th scope="col">Control</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
                <tr>
                    <td><?php echo $dat->nama ?></td>
                    <td><?php echo $dat->alamat ?></td>
                    <td><?php echo $dat->konsul ?></td>
                    <?php if ($this->session->userdata('username')==$dat->username) { ?>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $dat->id_konsul ?>">Edit</button>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/konsul_con/delete_konsul/<?php echo $dat->id_konsul ?>" onClick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_konsul">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Konsul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>index.php/konsul_con/add_konsul">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control" placeholder="Nama konsul" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Konsul</label>
                        <input type="text" class="form-control" placeholder="Konsul" name="konsul" required>
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
    <div class="modal fade" id="edit<?php echo $dat->id_konsul ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Konsul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/konsul_con/edit_konsul">
                        <input type="hidden" class="form-control" name="id_konsul" value="<?php echo $dat->id_konsul ?>" required>
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" placeholder="Nama Pasien" name="nama" value="<?php echo $dat->nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $dat->alamat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Konsul</label>
                            <input type="text" class="form-control" placeholder="Konsul" name="konsul" value="<?php echo $dat->konsul ?>" required>
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