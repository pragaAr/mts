<div class="main-panel">
  <div class="inserted" data-flashdata="<?= $this->session->flashdata('inserted'); ?>"></div>
  <div class="updated" data-flashdata="<?= $this->session->flashdata('updated'); ?>"></div>
  <div class="deleted" data-flashdata="<?= $this->session->flashdata('deleted'); ?>"></div>
  <div class="failedupload" data-flashdata="<?= $this->session->flashdata('failedupload'); ?>"></div>
  <div class="content">
    <div class="page-inner">
      <div class="page-header d-flex justify-content-between">
        <h4 class="page-title"><?= $title ?></h4>
        <span class="op-7" id="jam"></span>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Data <?= $title ?></h4>
              <button type="button" class="btn btn-primary addMerk-btn" data-toggle="modal" data-target="#addMerk" style="padding: 0.5rem 1.2rem;">
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataMerk" class="display table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Merk</th>
                      <th>Gambar</th>
                      <th>Date Add</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($merk as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->nama_merk) ?></td>
                        <td>
                          <img src=" <?= base_url('assets/upload/merk/') . $data->merk_img ?>" style="max-width:110px;">
                        </td>
                        <td><?= date('d-m-Y', strtotime($data->merkAdd)) ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-merk" title="Ubah Data" data-id="<?= $data->id_merk ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/merk/delete/') . $data->id_merk ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                      <?php $no++ ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- addMerk -->
  <form action="<?= base_url('admin/merk') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addMerk" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Tambah Data Merk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="merk">
                Merk
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control text-capitalize" name="merk" placeholder="Merk.." required oninvalid="this.setCustomValidity('Merk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="gambarmerk">
                Gambar Merk
                <span class="text-danger">*</span>
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="gambarmerk" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar Merk wajib di isi!')" oninput="setCustomValidity('')">
                <label class="custom-file-label" for="customFile">Pilih gambar</label>
              </div>
              <p class="text-danger font-weight-bold mt-2">
                <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
              </p>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-dark float-right" style="padding: 0.5rem 1.2rem;">
                Simpan
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- editMerk -->
  <form action="<?= base_url('admin/merk/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editMerk" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data Merk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="merkname">
                Merk
                <span class="text-danger">*</span>
              </label>
              <input type="hidden" class="form-control idmerk" name="idmerk" readonly>
              <input type="text" class="form-control text-capitalize merkname" name="merkname" placeholder="Merk.." required oninvalid="this.setCustomValidity('Merk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="gambarmerkedit">
                Gambar Merk Saat ini
              </label>
              <div class="row">
                <div class="col-lg-12">
                  <img src="" alt="" class="img-thumbnail gambarmerkedit" style="max-height:150px;">
                  <input type="hidden" class="form-control oldmerkimg" name="oldmerkimg" readonly>
                </div>
                <div class="col-lg-12 mt-3">
                  <label for="gambarnew">
                    Gambar Merk Baru
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="gambarnew">
                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                  </div>
                  <p class="text-danger font-weight-bold mt-2">
                    <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                  </p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-dark float-right" style="padding: 0.5rem 1.2rem;">
                Simpan
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>