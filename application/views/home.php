<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div><?= $menu ?>
                    <div class="page-title-subheading">Selamat Datang Di Sistem Informasi Penghuni Asrama Universitas Trunojoyo Madura
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php foreach($berita as $ber){ ?>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-lg-2 col-sm-1 p-2 mb-2  bg-arielle-smile ml-3 mr-3 justify-content-center align-items-center" style="border-radius : 10px; box-shadow: 6px 8px 5px grey;">
                        <center>
						<?php 
						$date = explode(" ",$ber->post_date);
						$tgl = $date[1];
						$bulan = $date[2];
						$thn = $date[3];
						?>
						
						<h1 class="text text-white text-lg" style="font-size : 76px"><b><?= $tgl?></b></h1>
						<em class="text text-white text-lg"> <?= $bulan." ".$thn?> </em>
						</center>
                    </div>
					<div class="col-sm-9">
						<a href="<?= base_url("Asrama/detail_berita/".$ber->id_berita)?>"><h3 class="text text-dark text-lg"><b><?= $ber->judul_berita?></b></h3></a>
						<p><?= substr($ber->isi,0, 500)."......." ?><a href="<?= base_url("Asrama/detail_berita/".$ber->id_berita)?>">read_more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
</div>

