<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">
      
      <div class="box box-default">
        
        <div class="box-header with-border">
          <h3 class="box-title"><?= $page_title ?></h4>
          <a href="" data-toggle="modal" data-target="#modal-success" class="btn btn-success pull-right">Tambah Asset</a>
        </div>

        <div class="box-body">
          <table id="kibA" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tahun</th>
                <th>Status</th>
                <th>Harga</th>
                <?php if($this->session->userdata('level') == 'Admin'){ ?>
                <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($asset as $kiba) { ?>
              <tr>
                <td><?= $kiba->id_barang; ?></td>
                <td style="width: 20%;">
                  <a href="" class="btnInfo" data-toggle="modal" data-target="#modal-info" 
                    data-id="<?= $kiba->id_barang; ?>" 
                    data-reg="<?= $kiba->reg; ?>" 
                    data-nama="<?= $kiba->nama_barang; ?>" 
                    data-luas="<?= $kiba->luas; ?>" 
                    data-tahun="<?= $kiba->tahun_peroleh; ?>" 
                    data-alamat="<?= $kiba->alamat; ?>" 
                    data-penggunaan="<?= $kiba->penggunaan; ?>" 
                    data-peroleh="<?= $kiba->cara_peroleh ?>" 
                    data-hak="<?= $kiba->status_hak; ?>" 
                    data-harga="<?= $kiba->harga; ?>"
                    data-dana="<?= $kiba->sumber_dana; ?>"
                    data-sbarang="<?= $kiba->status_barang; ?>"
                    data-kondisi="<?= $kiba->kondisi; ?>"
                    data-korelasi="<?= $kiba->korelasi_dapodik; ?>"
                    data-asal="<?= $kiba->asal_sekolah; ?>">
                    <?= $kiba->nama_barang; ?>
                  </a>
                </td>
                <td><?= $kiba->tahun_peroleh; ?></td>
                <td><?= $kiba->status_hak; ?></td>
                <td><?= $kiba->harga; ?></td>
                <td>
                  <?php if($this->session->userdata('level') == 'Admin'){ ?>
                  <button type="button" class="btn btn-warning btnEdit" data-toggle="modal" data-target="#modal-warning" 
                      data-id="<?= $kiba->id_barang; ?>" 
                      data-reg="<?= $kiba->reg; ?>" 
                      data-nama="<?= $kiba->nama_barang; ?>" 
                      data-luas="<?= $kiba->luas; ?>" 
                      data-tahun="<?= $kiba->tahun_peroleh; ?>" 
                      data-alamat="<?= $kiba->alamat; ?>" 
                      data-penggunaan="<?= $kiba->penggunaan; ?>" 
                      data-peroleh="<?= $kiba->cara_peroleh ?>" 
                      data-hak="<?= $kiba->status_hak; ?>" 
                      data-harga="<?= $kiba->harga; ?>"
                      data-dana="<?= $kiba->sumber_dana; ?>"
                      data-sbarang="<?= $kiba->status_barang; ?>"
                      data-kondisi="<?= $kiba->kondisi; ?>"
                      data-korelasi="<?= $kiba->korelasi_dapodik; ?>"
                      data-asal="<?= $kiba->asal_sekolah; ?>">
                      Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-id="<?= $kiba->id_barang; ?>">Hapus</button>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>


    </section>

      <div class="modal modal-warning fade" id="modal-warning">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Aset KIB A</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/editKibA'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaNama" type="text" name="nama_barang" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaReg" type="text" name="reg" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Luas</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaLuas"  type="text" name="luas" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaTahun"  type="text" name="tahun_peroleh" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaAlamat"  type="text" name="alamat" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaPenggunaan"  type="text" name="penggunaan" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Cara Perolehan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaPerolehan"  type="text" name="perolehan" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Hak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaHak"  type="text" name="status_hak" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaHarga"  type="text" name="harga" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaDana"  type="text" name="sumber_dana" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaBarang"  type="text" name="status_barang" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaKondisi"  type="text" name="kondisi" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaKorelasi"  type="text" name="korelasi_dapodik" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Asal Sekolah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kibaAsal"  type="text" name="asal_sekolah" style="color: black; width: 250%;"></td>
                  </tr>
                  <input type="hidden" name="id_barang" class="kibaId">
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
                <button type="button" class="btn btn-outline btnDelete" data-id="<?= $kiba->id_barang; ?>">Ya</button>
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
              <h4 class="modal-title">Informasi Aset KIB A</h4>
            </div>
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aNama" type="text" name="nama_barang" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aReg" type="text" name="reg" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Luas</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aLuas"  type="text" name="luas" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aTahun"  type="text" name="tahun_peroleh" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aAlamat"  type="text" name="alamat" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aPenggunaan"  type="text" name="penggunaan" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Cara Perolehan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aPerolehan"  type="text" name="perolehan" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Hak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aHak"  type="text" name="status_hak" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aHarga"  type="text" name="harga" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aDana"  type="text" name="sumber_dana" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aBarang"  type="text" name="status_barang" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aKondisi"  type="text" name="kondisi" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aKorelasi"  type="text" name="korelasi_dapodik" style="color: black; width: 250%;" disabled></td>
                  </tr>
                  <tr>
                    <td>Asal Sekolah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control kib_aAsal"  type="text" name="asal_sekolah" style="color: black; width: 250%;" disabled></td>
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

      <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Aset KIB A</h4>
            </div>
            <form method="POST" action="<?= site_url('asset/tambahKibA'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <tr>
                    <td>ID Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="id_barang" style="color: black; width: 250%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nama Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="nama_barang" style="color: black; width: 250%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Nomor Registrasi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="reg" style="color: black; width: 250%;" required=""></td>
                  </tr>
                  <tr>
                    <td>Luas</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="luas" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Tahun Peroleh</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="tahun_peroleh" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="alamat" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Penggunaan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="penggunaan" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Cara Perolehan</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="cara_peroleh" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Hak</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="status_hak" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="harga" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Sumber Dana</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="sumber_dana" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Status Barang</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="status_barang" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="kondisi" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Korelasi Dapodik</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="korelasi_dapodik" style="color: black; width: 250%;"></td>
                  </tr>
                  <tr>
                    <td>Asal Sekolah</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="asal_sekolah" style="color: black; width: 250%;"></td>
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


    <!-- /.content -->
  </div>