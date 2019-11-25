<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div><?= $menu ?>
                    <div class="page-title-subheading">Insert Data Penghuni
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
                        <?= $this->session->flashdata('message'); ?>
                        <h2 class="card-title">Masukan Penghuni Baru</h2>
                        <div class="form-group">
                            <?php echo form_open_multipart("Admin/add_penghuni")?>
                            <label>Nim Mahasiswa</label>
                            <input required type="text" class="form-control" name="nim" id="nim">
                            <br>
                            <label>Kamar</label>
                            <span class="d-flex"><input readonly type="text" class="form-control" name="kamar" id="placeforkamar" style="width:80%">
                            <br><div class="btn btn-warning" style="width:20%" data-toggle="modal" data-target="#pilihKamar">Pilih Kamar</div></span><br>
                            <input type="submit" class="btn btn-info btn-lg" style="width:100%">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
