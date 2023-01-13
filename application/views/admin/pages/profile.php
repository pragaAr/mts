<div class="main-panel">
  <div class="inserted" data-flashdata="<?= $this->session->flashdata('inserted'); ?>"></div>
  <div class="updated" data-flashdata="<?= $this->session->flashdata('updated'); ?>"></div>
  <div class="samefailed" data-flashdata="<?= $this->session->flashdata('samefailed'); ?>"></div>
  <div class="failed" data-flashdata="<?= $this->session->flashdata('failed'); ?>"></div>
  <div class="content">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between">
        <h4 class="page-title"><?= $title ?></h4>
        <span class="op-7" id="jam"></span>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="row no-gutters">
              <div class="col-lg-4 col-md-4 d-flex justify-content-center align-items-center mb-2 mt-2">
                <img src="<?= base_url('assets/admin') ?>/assets/img/user-image/default.png" alt="..." class="img-thumbnail" style="max-width:280px;">
              </div>
              <div class="col-lg-8 col-md-8 mb-2 mt-2">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold mb-3"><u><?= ucwords($profile->nama_user) ?></u></h5>
                  <hr>
                  <table class="table-borderless" style="width:100%;">
                    <tr>
                      <td>
                        <p>Username</p>
                      </td>
                      <td>
                        <p>:</p>
                      </td>
                      <td>
                        <p><?= $profile->username ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>No Telepon</p>
                      </td>
                      <td>
                        <p>:</p>
                      </td>
                      <td>
                        <p><?= $profile->notelp ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Created</p>
                      </td>
                      <td>
                        <p>:</p>
                      </td>
                      <td>
                        <p><?= date('d-F-Y H:i:s', strtotime($profile->userAdd)) ?></p>
                      </td>
                    </tr>
                  </table>

                  <?php if ($profile->userUpdate == null) { ?>
                    <p class="card-text mt-2"><small class="text-muted">Last updated at --</small></p>
                  <?php } else { ?>
                    <p class="card-text mt-1"><small class="text-muted">Last updated at <?= date('d-F-Y H:i:s', strtotime($profile->userUpdate)) ?></small></p>
                  <?php } ?>

                  <button type="button" class="btn btn-secondary edit-profile mt-1" style="padding: 0.5rem 1.2rem;" data-toggle="modal" data-target="#editProfile" data-id="<?= $profile->id_user ?>">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- editProfile -->
  <form action="<?= base_url('admin/profile/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editProfile" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data Profile</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="namauser">
                Nama User
                <span class="text-danger">*</span>
              </label>
              <input type="hidden" class="form-control iduser" name="iduser" readonly>
              <input type="text" class="form-control text-capitalize namauser" name="namauser" placeholder="Nama Pengguna.." required oninvalid="this.setCustomValidity('Nama Pengguna wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="notelp">
                No Telepon
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control notelp" name="notelp" placeholder="No Telepon.." required oninvalid="this.setCustomValidity('No Telepon wajib di isi!')" oninput="setCustomValidity('')" autocomplete=" off">
            </div>
            <div class="form-group">
              <label for="username">
                Username
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control username" name="username" placeholder="Username.." required oninvalid="this.setCustomValidity('Username wajib di isi!')" oninput="setCustomValidity('')" autocomplete=" off">
            </div>
            <div class="form-group">
              <label for="currentpassword">
                Password Saat Ini
                <span class="text-danger">*</span>
              </label>
              <input type="password" class="form-control currentpassword" name="currentpassword" placeholder="Password Saat Ini.." autocomplete=" off">
            </div>
            <div class="form-group">
              <label for="newpassword">
                Password Baru
                <span class="text-danger">*</span>
              </label>
              <input type="password" class="form-control newpassword" name="newpassword" placeholder="Password Baru.." minlength="5" required readonly oninvalid="this.setCustomValidity('Password Baru wajib di isi!')" oninput="setCustomValidity('')" autocomplete=" off">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-dark btn-update-profile float-right" style="padding: 0.5rem 1.2rem;">
                Simpan
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>