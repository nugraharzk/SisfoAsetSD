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
				<table id="kibB" class="table table-hover table-striped">
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
              <?php foreach ($asset as $kibb) { ?>
              <tr>
                <td><?= $kibb->id_barang; ?></td>
                <td style="width: 20%;">
                  <a href="" class="btnInfo" data-toggle="modal" data-target="#modal-info" 
                    data-id="<?= $kibb->id_barang; ?>" 
                    data-reg="<?= $kibb->reg; ?>" 
                    data-nama="<?= $kibb->nama_barang; ?>" 
                    data-type="<?= $kibb->type; ?>" 
                    data-ukuran="<?= $kibb->ukuran; ?>" 
                    data-bahan="<?= $kibb->bahan; ?>" 
                    data-tahun="<?= $kibb->tahun_peroleh; ?>" 
                    data-nomor_mesin="<?= $kibb->nomor_mesin; ?>" 
                    data-peroleh="<?= $kibb->cara_peroleh ?>" 
                    data-dana="<?= $kibb->sumber_dana ?>" 
                    data-sbarang="<?= $kibb->status_barang; ?>"
                    data-kondisi="<?= $kibb->kondisi; ?>"
                    data-penggunaan="<?= $kibb->penggunaan; ?>" 
                    data-harga="<?= $kibb->harga; ?>"
                    data-kontrak="<?= $kibb->kontrak; ?>"
                    data-ctt_baik="<?= $kibb->catatan_barang_baik; ?>"
                    data-ctt_ringan="<?= $kibb->catatan_barang_rusak_ringan; ?>"
                    data-ctt_berat="<?= $kibb->catatan_barang_rusak_berat; ?>"
                    data-data_inven="<?= $kibb->data_diinventarisasi; ?>"
                    data-nilai_inven="<?= $kibb->nilai_inventarisasi; ?>"
                    data-posisi="<?= $kibb->posisi; ?>"
                    data-masa="<?= $kibb->masa_manfaat; ?>"
                    data-penyusutan="<?= $kibb->penyusutan_akhir; ?>"
                    data-pemakai_barang="<?= $kibb->pemakai_barang; ?>"
                    data-korelasi="<?= $kibb->korelasi_dapodik; ?>">
                    <?= $kibb->nama_barang; ?>
                  </a>
                </td>
                <td><?= $kibb->harga; ?></td>
                <td><?= $kibb->masa_manfaat; ?></td>
                <td><?= $kibb->penyusutan_akhir; ?></td>
                <td>
                  <?php if($this->session->userdata('level') == 'Admin'){ ?>
                  <button type="button" class="btn btn-warning btnEdit" data-toggle="modal" data-target="#modal-warning" 
          data-id="<?= $kibb->id_barang; ?>" 
          data-reg="<?= $kibb->reg; ?>" 
          data-nama="<?= $kibb->nama_barang; ?>" 
          data-type="<?= $kibb->type; ?>" 
          data-ukuran="<?= $kibb->ukuran; ?>" 
          data-bahan="<?= $kibb->bahan; ?>" 
          data-tahun="<?= $kibb->tahun_peroleh; ?>" 
          data-nomor_mesin="<?= $kibb->nomor_mesin; ?>" 
          data-peroleh="<?= $kibb->cara_peroleh ?>" 
          data-dana="<?= $kibb->sumber_dana ?>" 
          data-sbarang="<?= $kibb->status_barang; ?>"
          data-kondisi="<?= $kibb->kondisi; ?>"
          data-penggunaan="<?= $kibb->penggunaan; ?>" 
          data-harga="<?= $kibb->harga; ?>"
          data-kontrak="<?= $kibb->kontrak; ?>"
          data-ctt_baik="<?= $kibb->catatan_barang_baik; ?>"
          data-ctt_ringan="<?= $kibb->catatan_barang_rusak_ringan; ?>"
          data-ctt_berat="<?= $kibb->catatan_barang_rusak_berat; ?>"
          data-data_inven="<?= $kibb->data_diinventarisasi; ?>"
          data-nilai_inven="<?= $kibb->nilai_inventarisasi; ?>"
          data-posisi="<?= $kibb->posisi; ?>"
          data-masa="<?= $kibb->masa_manfaat; ?>"
          data-penyusutan="<?= $kibb->penyusutan_akhir; ?>"
          data-pemakai_barang="<?= $kibb->pemakai_barang; ?>"
          data-masa_manfaat="<?= $kibb->masa_manfaat; ?>"
          data-korelasi="<?= $kibb->korelasi_dapodik; ?>">
                      Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-id="<?= $kibb->id_barang; ?>">Hapus</button>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
			</div>

      <div class="box-footer clearfix">
        <a class="btn btn-success pull-left" href="<?= site_url('asset/printLaporan'); ?>">Print Laporan</a>
      </div>
		</div>
	</section>

	<div class="modal modal-warning fade" id="modal-warning">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Aset KIB B</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/editKibB'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbNama" type="text" name="nama_barang" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbReg" type="text" name="reg" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Type</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbType"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Ukuran</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbUkuran"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Bahan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbBahan"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbTahun"  type="text" name="tahun_peroleh" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Nomor Mesin</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbNomorMesin"  type="text" name="nomor_mesin" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Cara Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbPeroleh"  type="text" name="cara_peroleh" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbDana"  type="text" name="sumber_dana" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbBarang"  type="text" name="status_barang" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbKondisi"  type="text" name="kondisi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbPenggunaan"  type="text" name="penggunaan" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbHarga"  type="text" name="harga" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Kontrak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbKontrak"  type="text" name="kontrak" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Baik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbBaik"  type="text" name="catatan_barang_baik" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Ringan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbRingan"  type="text" name="catatan_barang_rusak_ringan" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Berat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbBerat"  type="text" name="catatan_barang_rusak_berat" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Data Diinventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbDInven"  type="text" name="data_diinventarisasi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Nilai Inventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbNInven"  type="text" name="nilai_inventarisasi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Posisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbPosisi"  type="text" name="posisi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Pemakai Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbPemakai"  type="text" name="pemakai_barang" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbKorelasi"  type="text" name="korelasi_dapodik" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbMasaManfaat" type="text" name="masa_manfaat" style="color: black; width: 380%;"></td>
                  </tr>
                  <input type="hidden" name="id_barang" class="kibbId">
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
                <button type="button" class="btn btn-outline btnDelete" data-id="<?= $kibb->id_barang; ?>">Ya</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Informasi Aset KIB B</h4>
            </div>
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bNama" type="text" name="nama_barang" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bReg" type="text" name="reg" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Type</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bType"  type="text" name="type" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Ukuran</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bUkuran"  type="text" name="type" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Bahan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bBahan"  type="text" name="type" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bTahun"  type="text" name="tahun_peroleh" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Nomor Mesin</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bNomorMesin"  type="text" name="nomor_mesin" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Cara Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bPeroleh"  type="text" name="cara_peroleh" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bDana"  type="text" name="sumber_dana" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bBarang"  type="text" name="status_barang" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bKondisi"  type="text" name="kondisi" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bPenggunaan"  type="text" name="penggunaan" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bHarga"  type="text" name="harga" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Kontrak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bKontrak"  type="text" name="kontrak" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Baik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bBaik"  type="text" name="catatan_barang_baik" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Ringan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bRingan"  type="text" name="catatan_barang_rusak_ringan" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Berat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bBerat"  type="text" name="catatan_barang_rusak_berat" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Data Diinventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bDInven"  type="text" name="data_diinventarisasi" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Nilai Inventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bNInven"  type="text" name="nilai_inventarisasi" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Posisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bPosisi"  type="text" name="posisi" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Pemakai Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bPemakai"  type="text" name="pemakai_barang" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_bKorelasi"  type="text" name="korelasi_dapodik" style="color: black; width: 380%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbMasaManfaat" type="text" name="masa_manfaat" style="color: black; width: 380%;" disabled=""></td>
                  </tr>
                  <tr>
                    <td>Penyusutan Akhir</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibbPenyusutan" type="text" name="penyusutan_akhir" style="color: black; width: 380%;" disabled=""></td>
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Aset KIB B</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/tambahkibb'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>ID Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="id_barang" style="color: black; width: 380%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="nama_barang" style="color: black; width: 380%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="reg" style="color: black; width: 380%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Type</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Ukuran</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Bahan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="type" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="tahun_peroleh" style="color: black; width: 380%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nomor Mesin</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="nomor_mesin" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Cara Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="cara_peroleh" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="sumber_dana" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="status_barang" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="kondisi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="penggunaan" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="harga" style="color: black; width: 380%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Kontrak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="kontrak" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Baik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="catatan_barang_baik" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Ringan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="catatan_barang_rusak_ringan" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Catatan Barang Rusak Berat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="catatan_barang_rusak_berat" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Data Diinventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="data_diinventarisasi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Nilai Inventarisasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="nilai_inventarisasi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Posisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="posisi" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Pemakai Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="pemakai_barang" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="korelasi_dapodik" style="color: black; width: 380%;"></td>
                  </tr>
                  <tr>
                    <td>Masa Manfaat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="masa_manfaat" style="color: black; width: 380%;"></td>
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