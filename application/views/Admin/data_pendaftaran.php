<?php 
if($level == 100){
$mylevel = "User";
}
if($level == 999){
$mylevel = "Musahil";
}
if($level == 1337){
$mylevel = "Admin";
}
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div><?= $menu ?>
                    <div class="page-title-subheading">Data Pendaftar Asrama Universitas Trunojoyo Madura
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        NIM
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Prodi
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Manage Pendaftar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pendaftar as $pend){ ?>
                                <tr>
                                    <td>
                                        <?= $pend->nim?>
                                    </td>
                                    <td>
                                        <?= $pend->nama?>
                                    </td>
                                    <td>
                                        <?= $pend->ket_jurusan?>
                                    </td>
                                    <td>
                                        <?php if($pend->masuk == "NOT"){echo "Belum Dapat Kamar";}else{echo "Sudah Dapat Kamaar";}?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info">Manage Pendaftar</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/main.js"></script>
