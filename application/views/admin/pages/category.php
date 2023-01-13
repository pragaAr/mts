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
              <button type="button" class="btn btn-primary addCategory-btn" data-toggle="modal" data-target="#addCategory" style="padding: 0.5rem 1.2rem;">
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataCategory" class="display table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Gambar</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($category as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->category_name) ?></td>
                        <td>
                          <img src="<?= base_url('assets/upload/category/') . $data->category_img ?>" style="max-width:110px;">
                        </td>
                        <td><?= date('d-m-Y', strtotime($data->categoryAdd)) ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-category" title="Ubah Data" data-id="<?= $data->id_category ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/category/delete/') . $data->id_category ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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

  <!-- addCategory -->
  <form action="<?= base_url('admin/category') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addCategory" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Tambah Data Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="category">
                Kategori
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control text-capitalize" name="category" placeholder="Kategori.." required oninvalid="this.setCustomValidity('Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="gambarkategori">
                Gambar Kategori
                <span class="text-danger">*</span>
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="gambarkategori" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar Kategori wajib di isi!')" oninput="setCustomValidity('')">
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

  <!-- editCategory -->
  <form action="<?= base_url('admin/category/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editCategory" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="categoryname">
                Kategori
                <span class="text-danger">*</span>
              </label>
              <input type="hidden" class="form-control idcategory" name="idcategory" readonly>
              <input type="text" class="form-control text-capitalize categoryname" name="categoryname" placeholder="Kategori.." required oninvalid="this.setCustomValidity('Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="gambaredit">
                Gambar Kategori Saat ini
              </label>
              <div class="row">
                <div class="col-lg-12">
                  <img src="" alt="" class="img-thumbnail gambaredit" style="max-height:150px;">
                  <input type="hidden" class="form-control oldcategoryimg" name="oldcategoryimg" readonly>
                </div>
                <div class="col-lg-12 mt-3">
                  <label for="gambaredit">
                    Gambar Kategori Baru
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
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-dark float-right" style="padding: 0.5rem 1.2rem;">
              Simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>