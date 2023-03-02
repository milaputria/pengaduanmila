<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="fw-bold text-white">Masyarakat</h3>
                    <a href="" data-toggle="modal" data-target="#fMasyarakat" data-masyarakat="add" class="btn btn-primary"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>telp</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                            # code...
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#fMasyarakat" data-masyarakat="<?= $data ?>" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>||
                                    <a href="/masyarakat/delete/<?= $row['id_masyarakat'] ?>" onclick="return confirm('Yakin mau hapus data ?')" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty(session()->getFlashdata("message"))) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata("message") ?>
        </div>
    <?php endif ?>
    <div class="modal fade" id="fMasyarakat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-label="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Masyarakat</h5>
                    <button type="button" class="close" aria-label="Close"></button>
                </div>
                <form action="" id="editMasyarakat" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="number" name="nik" id="nik" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input type="number" name="telp" id="telp" value="" class="form-control">
                        </div>
                        <div class="form-group" id="ubahpassword">
                            <label for="">ubahpassword</label>
                            <input type="checkbox" name="ubahpassword" id="ubahpassword" value="" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $("#fMasyarakat").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('masyarakat');

            if (data != "add") {
                const barisdata = data.split(",");
                $("#nik").val(barisdata[1]);
                $("#nama").val(barisdata[2]);
                $("#username").val(barisdata[3]);
                $("#password").val(barisdata[4]);
                $("#telp").val(barisdata[5]);
                $("#editMasyarakat").attr('action', barisdata[6]);
                $("#ubahpassword").show();
            } else {

                $("#nik").val("");
                $("#nama").val("");
                $("#username").val("");
                $("#password").val("");
                $("#telp").val("");
                $("#editMasyarakat").attr('action', "masyarakat");
                $("#ubahpassword").hide();
            }
        });
    })
</script>
<?= $this->endSection() ?>