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
              <button type="button" class="btn btn-primary addSubcategory-btn" data-toggle="modal" data-target="#addSubcategory" style="padding: 0.5rem 1.2rem;">
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
                      <th>Sub Kategori</th>
                      <th>Gambar</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($sub as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->category_name) ?></td>
                        <td><?= ucwords($data->sub_name) ?></td>
                        <td>
                          <img src=" <?= base_url('assets/upload/sub-category/') . $data->sub_img ?>" style="max-width:110px;">
                        </td>
                        <td><?= date('d-m-Y', strtotime($data->subAdd)) ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-subcategory" title="Ubah Data" data-id="<?= $data->id_subcategory ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/subcategory/delete/') . $data->id_subcategory ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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

  <!-- addSubcategory -->
  <form action="<?= base_url('admin/subcategory') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addSubcategory" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Tambah Data SubCategory</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="categoryid">
                Kategory
                <span class="text-danger">*</span>
              </label>
              <select name="categoryid" id="categoryid" class="form-control select2" style="width:100%;" required oninvalid="this.setCustomValidity('Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                <option value="" selected disabled>-Pilih Kategori-</option>
                <?php foreach ($cat as $cat) : ?>
                  <option value="<?= $cat->id_category ?>"><?= ucwords($cat->category_name) ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subcategory">
                Sub Kategori
                <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control text-capitalize" name="subcategory" placeholder="Sub Kategori.." required oninvalid="this.setCustomValidity('Sub Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="gambarsub">
                Gambar Sub Kategori
                <span class="text-danger">*</span>
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="gambarsub" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar Sub Kategori wajib di isi!')" oninput="setCustomValidity('')">
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

  <!-- editSubcategory -->
  <form action="<?= base_url('admin/subcategory/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editSubcategory" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data SubCategory</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="categoryidedit">
                Kategory
                <span class="text-danger">*</span>
              </label>
              <select name="categoryidedit" id="categoryidedit" class="form-control select2 categoryidedit" style="width:100%;" required oninvalid="this.setCustomValidity('Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                <option value="" selected disabled>-Pilih Kategori-</option>
                <?php foreach ($catedit as $cat) : ?>
                  <option value="<?= $cat->id_category ?>"><?= ucwords($cat->category_name) ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subname">
                Kategori
                <span class="text-danger">*</span>
              </label>
              <input type="hidden" class="form-control idcategory" name="idcategory" readonly>
              <input type="text" class="form-control text-capitalize subname" name="subname" placeholder="Kategori.." required oninvalid="this.setCustomValidity('Kategori wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
              <input type="hidden" name="subid" class="form-control subid" readonly>
            </div>
            <div class="form-group">
              <label for="gambarsubedit">
                Gambar Sub Kategori Saat ini
              </label>
              <div class="row">
                <div class="col-lg-12">
                  <img src="" alt="" class="img-thumbnail gambarsubedit" style="max-height:150px;">
                  <input type="hidden" class="form-control oldsubimg" name="oldsubimg" readonly>
                </div>
                <div class="col-lg-12 mt-3">
                  <label for="gambarnew">
                    Gambar Sub Kategori Baru
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