<div class="modal modal-warning fade" id="modal-user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Akun</h4>
            </div>
            <form method="POST" action="<?= site_url('auth/updateAkun'); ?>">
              <div class="modal-body">
                <table class="form-group">
                  <input type="hidden" name="id" value="<?= $this->session->userdata('user_id'); ?>">
                  <tr>
                    <td>Nama Akun</td>
                    <td>&emsp;</td>
                    <td><input class="form-control" type="text" name="nama" style="color: black; width: 250%;" value="<?= $this->session->userdata('nama'); ?>" required></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="text" name="username" style="color: black; width: 250%;" value="<?= $this->session->userdata('username'); ?>" required></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td>&emsp;</td>
                    <td><input class="form-control"  type="password" name="password" style="color: black; width: 250%;" required></td>
                  </tr>
                  <tr>
                    <td>Level</td>
                    <td>&emsp;</td>
                    <td>
                      <input type="hidden" name="level" value="<?= $this->session->userdata('level'); ?>">
                      <input class="form-control"  type="text" name="level" style="color: black; width: 250%;" value="<?= $this->session->userdata('level'); ?>" disabled></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline">Simpan</button>
              </div>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>