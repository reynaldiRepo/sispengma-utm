</div>
<div class="app-wrapper-footer">
	<div class="app-footer">
		<div class="app-footer__inner">
			<div class="app-footer-right">
				<p> copyright &copy sispengma 2019</p>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>


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


<!-- modal logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="mb-0">Anda Yakin Mau Logout ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a href="<?= base_url('logout'); ?>" type="button" class="btn btn-primary">Logout</a>
			</div>
		</div>
	</div>
</div>
<!-- =========================================== -->


<!-- modal insert gedung -->
<div class="modal fade" id="insertGedung" tabindex="-2" role="form" aria-labelledby="exampleModalLabel"
	style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Gedung</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form">
					<?php echo form_open_multipart("Admin/add_gedung") ?>
					<label>Kode Gedung</label>
					<select required class="form-control" name="kode_gedung">
						<option value="">Kode Gedung</option>
						<?php foreach (range('A', 'Z') as $char){
                        if(in_array($char, $list_ged) == false){ ?>
						<option value="<?= $char?>"><?= $char?></option>
						<?php } 
                    } ?>
					</select>
					<br>
					<label>Gedung Untuk</label>
					<select required class="form-control" name="sex_gedung">
						<option value="">Jenis Kelamin</option>
						<option value="1">Laki - Laki</option>
						<option value="2">Perempuan</option>
					</select><br>
					<button type="submit" class="btn btn-success">Tambah
						</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- =============================== -->




<!-- modal insert kamar -->
<div class="modal fade" id="insertKamar" tabindex="-2" role="form" aria-labelledby="exampleModalLabel"
	style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kamar Gedung <?= $gedung?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning">Format Kode Kamar [0]=Kode Gedung, [1]=Lantai ke-, [2]=Urutan Kamar
					ke-. ex: A101</div>
				<div class="form">
					<?php echo form_open_multipart("Admin/add_kamar/".$gedung) ?>
					<label>Kode Gedung</label>
					<input readonly class="form-control" name="kode_gedung" value="<?= $gedung?>">
					<br>
					<label>Kamar Lantai -</label>
					<select required class="form-control" name="lantai">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="3">4</option>
					</select><br>
					<label>Kondisi Kamar</label>
					<select required class="form-control" name="kondisi">
						<option value="1">Layak</option>
						<option value="2">Cukup Layak</option>
						<option value="3">Tidak Layak</option>
					</select><br>
					<button type="submit" class="btn btn-success">Tambah</button>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- =============================== -->

<!-- modal pilih kamar -->
<div class="modal fade" id="pilihKamar" tabindex="-2" role="form" aria-labelledby="exampleModalLabel"
	style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pilih Kamar Mahasiswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<table style="width: 100%;" id="example"
					class="table table-hover table-striped table-bordered dataTable dtr-inline">
					<thead>
						<tr role="row">
							<th>Kode Kamar</th>
							<th>Jumlah Penghuni</th>
							<th>kondisi</th>
							<th>Gedung Untuk</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($kamar as $k){?>
					<tr>
						<td><?= $k->id_kamar?></td>
						<td><?= $k->penghuni?></td>
						<td><?= $k->keterangan?></td>
						<td><?= $k->ket_kelamin?></td>
						<td><button class="btn btn-success" onclick="pilih('<?= $k->id_kamar?>')" data-dismiss="modal">Pilih Kamar</button></td>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- =============================== -->



<!-- modal upload file -->
<div class="modal fade" id="uploadFile" tabindex="-2" role="form" aria-labelledby="exampleModalLabel"
	style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?php echo form_open_multipart("$mylevel/up_file")?>
			<div class="modal-body">
				<div class="form-group">
					<label>Name File</label>
					<input type="text" class="form-control" name="file_name" required>
				</div>
				<div class="form-group">
					<label>Choose File</label>
					<input type="file" class="form-control" name="file" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info form-control">Upload File</button>
				</div>
			</div>
			</form>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- =============================== -->
<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/main.js"></script>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script>
function pilih(id) {
	$("#placeforkamar").val(id);
}
</script>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
		    $('#nim').autocomplete({
                source: "<?php echo base_url('admin/get_pendaftar');?>",
                select: function (event, ui) {
                    $('[name="nim"]').val(ui.item.nim); 
                }
            });

		});

		$(document).ready(function(){
		    $('#nimMus').autocomplete({
                source: "<?php echo base_url('admin/get_penghuni_json');?>",
                select: function (event, ui) {
                    $('[name="nimMus"]').val(ui.item.nim); 
                }
            });

		});
</script>

</body>

</html>
