<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header">
            <h3>Laporan</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                </tr>
                <?php
                $no = 0;
                foreach ($pengaduan as $row) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['tgl_pengaduan'] ?></td>
                        <td><?= $row['isi_laporan'] ?></td>
                        <td>
                            <?php
                            if ($row['foto'] != "") {
                            ?>
                                <img src="/upload/berkas/<?= $row['foto'] ?>" alt="" width="50" height="50">
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
