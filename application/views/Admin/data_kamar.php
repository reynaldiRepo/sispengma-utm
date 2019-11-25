
<?= $this->session->flashdata('message'); ?>

<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon">
					<i class="pe-7s-home icon-gradient bg-tempting-azure">
					</i>
				</div>
				<div><?= $menu ?>
					<div class="page-title-subheading">Data Kamar di Gedung (<?= $gedung?>) Asrama Universitas Trunojoyo Madura
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-xl-4">
			<div class="card mb-2 widget-content bg-midnight-bloom">
				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading">Tambah Data Kamar</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white">
							<span>
								<button class="btn btn-info" data-toggle="modal" data-target="#insertKamar">
									GO
								</button>
							</span>
						</div>
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
						<table style="width: 100%;" id="example"
							class="table table-hover table-striped table-bordered dataTable dtr-inline">
							<thead>
								<tr role="row">
									<th>Kode Kamar</th>
									<th>Layak</th>
									<th>Jumlah Penghuni</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($kamar as $k){ ?>
								<tr role="row" class="odd">
									<td><?= $k->id_kamar?></td>
									<td>
										<?php echo form_open_multipart("Admin/update_kondisi/".$gedung."/".$k->id_kamar)?>
										<select name ="kondisi" >
											<?php foreach ($kondisi as $kon) { ?>
												<option value = "<?= $kon->id_kondisi ?>"
												<?php if($k->kondisi == $kon->id_kondisi){echo "selected";} ?>>
													<?= $kon->keterangan?>
												</option>
											<?php } ?>
										</select>
										<button type="submit" class="btn btn-info">Update</button>
										</form>
									</td>
									<td><?= $k->penghuni?></td>
									<td>
										<a href="<?= base_url("Admin/daftar_penghuni_kamar/".$gedung."/".$k->id_kamar)?>" class="btn btn-success">
											Daftar Penghuni
										</a>
										<button class="btn btn-info" <?php if($k->penghuni != 0){echo "disabled";}?>
										onclick = "del('<?= $k->id_kamar?>')"
										>
											Delete Kamar
										</button>
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

<script>
function del(id) {
    var con = confirm("Delete This Data");
    if(con == true){
        location.href="<?= base_url('Admin/delete_kamar/'.$gedung.'/')?>"+id;
    }else{
        console.log("close");
    }
}
</script>