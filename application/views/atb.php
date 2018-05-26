<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<?= $page_title ?>
        	<small><?= $page_desc ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?=$page_title?></li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $page_title ?></h4>
				<?php if($this->session->userdata('level') == 'Admin'){ ?>
				<a href="" data-toggle="modal" data-target="#modal-success" class="btn btn-primary pull-right">Tambah Asset</a>
				<?php } ?>
			</div>

			<div class="box-body">
				<table id="kir" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Masa Manfaat</th>
                <th>Penyusutan Akhir</th>
                <?php if($this->session->userdata('level') == 'Admin'){ ?>
                <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($asset as $kir) { ?>
              <tr>
                <td><?= $kir->id_barang; ?></td>
                <td style="width: 20%;">
                  <a href="" class="btnInfo" data-toggle="modal" data-target="#modal-info" 
                    data-id="<?= $kir->id_barang; ?>" 
                    data-nama="<?= $kir->nama_barang; ?>" 
                    data-tahun="<?= $kir->tahun_peroleh; ?>" 
                    data-jumlah="<?= $kir->jumlah; ?>" 
                    data-masa="<?= $kir->masa_manfaat; ?>" 
					          data-penyusutan="<?= $kir->penyusutan_akhir; ?>" 
                    data-harga="<?= $kir->harga; ?>">
                    <?= $kir->nama_barang; ?>
                  </a>
                </td>
                <td>Rp.<?= $kir->harga; ?></td>
                <td><?= $kir->masa_manfaat; ?> Tahun</td>
                <td>Rp.<?= $kir->penyusutan_akhir; ?></td>
                <td>
                  <?php if($this->session->userdata('level') == 'Admin'){ ?>
                  <button type="button" class="btn btn-warning btnEdit" data-toggle="modal" data-target="#modal-warning" 
          data-id="<?= $kir->id_barang; ?>" 
          data-nama="<?= $kir->nama_barang; ?>" 
          data-tahun="<?= $kir->tahun_peroleh; ?>" 
          data-jumlah="<?= $kir->jumlah; ?>" 
          data-masa="<?= $kir->masa_manfaat; ?>" 
					data-harga="<?= $kir->harga; ?>">
                      Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-id="<?= $kir->id_barang; ?>">Hapus</button>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
			</div>

      <div class="box-footer clearfix">
        
      </div>
		</div>
	</section>

	<div class="modal modal-warning fade" id="modal-warning">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Aset ATB</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/editAtb'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kirNama" type="text" name="nama_barang" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Tahun Beli</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kirTahun"  type="text" name="tahun_peroleh" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Jumlah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kirJumlah"  type="text" name="jumlah" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kirHarga"  type="text" name="harga" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kirMasaManfaat"  type="text" name="masa_manfaat" style="color: black; width: 200%;"></td>
                  </tr>
                  <input type="hidden" name="id_barang" class="kirId">
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Hapus Aset</h4>
              </div>
              <div class="modal-body">
                <h4>Apa Anda Yakin ?</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-outline btnDelete" data-id="<?= $kir->id_barang; ?>">Ya</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Informasi Aset ATB</h4>
            </div>
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_Nama" type="text" name="nama_barang" style="color: black; width: 200%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Tahun Beli</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_Tahun"  type="text" name="tahun_peroleh" style="color: black; width: 200%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Jumlah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_Jumlah"  type="text" name="jumlah" style="color: black; width: 200%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_Harga"  type="text" name="harga" style="color: black; width: 200%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_MasaManfaat"  type="text" name="masa_manfaat" style="color: black; width: 200%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Penyusutan Akhir</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kir_Penyusutan"  type="text" name="penyusutan_akhir" style="color: black; width: 200%;" disabled></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
              </div>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-primary fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Aset ATB</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/tambahAtb'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>ID Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="id_barang" style="color: black; width: 200%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="nama_barang" style="color: black; width: 200%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Tahun Beli</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="tahun_peroleh" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Jumlah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="jumlah" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="harga" style="color: black; width: 200%;"></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="masa_manfaat" placeholder="Dalam Tahun" style="color: black; width: 200%;"></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>