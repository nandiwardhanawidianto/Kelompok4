<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/main_con/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Rumah Sakit</li>
    </ol>
</nav>

<!-- Table -->
<div class="mx-auto" style="width: 75%; margin-top: 50px; margin-bottom: 50px;">
    <h3 style="text-align: center;">Daftar Rumah Sakit</h3>
    <?php if ($this->session->userdata('role')=='admin') { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_rs" style="margin-bottom: 15px">Tambah Data Rumah Sakit</button>
    <?php } ?>
    <table class="table table-hover table-dark" style="margin-top: 25px;" id="table">
        <thead class="thead-dark">       
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Alamat</th>
                <th scope="col">No-Telp</th>
                <?php if ($this->session->userdata('role')=='admin') { ?>
                    <th scope="col">Control</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $id = 1; foreach ($data as $dat) { ?>
                <tr>
                    <td><?php echo $dat->nama ?></td>
                    <td><?php echo $dat->provinsi ?></td>
                    <td><?php echo $dat->alamat ?></td>
                    <td><?php echo $dat->no_telp ?></td>
                    <?php if ($this->session->userdata('role')=='admin') { ?>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $dat->id_rs ?>">Edit</button>
                            <a type="button" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/rs_con/delete_rs/<?php echo $dat->id_rs ?>" onClick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_rs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Rumah Sakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url(); ?>index.php/rs_con/add_rs">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Rumah Sakit" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No-Telp</label>
                        <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" required>
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
    <div class="modal fade" id="edit<?php echo $dat->id_rs ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Rumah Sakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url(); ?>index.php/rs_con/edit_rs">
                        <input type="hidden" class="form-control" name="id_rs" value="<?php echo $dat->id_rs ?>" required>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Rumah Sakit" name="nama" value="<?php echo $dat->nama ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" value="<?php echo $dat->provinsi ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $dat->alamat ?>" required>
                        </div>
                        <div class="form-group">
                            <label>No-Telp</label>
                            <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" value="<?php echo $dat->no_telp ?>" required>
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
<div id="googleMap" style="width:100%;height:380px;"></div>

<script type="text/javascript">
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>