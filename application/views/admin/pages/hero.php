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
              <button type="button" class="btn btn-primary addHero-btn" data-toggle="modal" data-target="#addHero" style="padding: 0.5rem 1.2rem;">
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataMerk" class="display table table-bordered" style="width:100%">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Hedaing</th>
                      <th>Content</th>
                      <th>Gambar 1</th>
                      <th>Gambar 2</th>
                      <th>Gambar 3</th>
                      <th>Date Add</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($hero as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->hero_heading) ?></td>
                        <td><?= ucwords($data->hero_content) ?></td>
                        <td class="text-center">
                          <img src=" <?= base_url('assets/upload/web-img/hero/') . $data->hero_img_1 ?>" style="max-width:140px;">
                        </td>
                        <td class="text-center">
                          <img src=" <?= base_url('assets/upload/web-img/hero/') . $data->hero_img_2 ?>" style="max-width:140px;">
                        </td>
                        <td class="text-center">
                          <img src=" <?= base_url('assets/upload/web-img/hero/') . $data->hero_img_3 ?>" style="max-width:140px;">
                        </td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($data->heroAdd)) ?></td>
                        <td class="text-center">
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-hero" title="Ubah Data" data-id="<?= $data->id_hero ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/hero/delete/') . $data->id_hero ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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

  <!-- addHero -->
  <form action="<?= base_url('admin/hero') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addHero" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Tambah Data About</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="pl-3 pr-3">
              <div class="form-group">
                <label for="heroheading">
                  Heading
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control text-capitalize" name="heroheading" placeholder="Heading.." required oninvalid="this.setCustomValidity('Heading wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="herocontent">
                  Content
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control text-capitalize" name="herocontent" placeholder="Content.." required oninvalid="this.setCustomValidity('Content wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="hero1">
                  Gambar 1
                  <span class="text-danger">*</span>
                </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="hero1" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar 1 wajib di isi!')" oninput="setCustomValidity('')">
                  <label class="custom-file-label" for="customFile">Pilih gambar</label>
                </div>
                <p class="text-danger font-weight-bold mt-2">
                  <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                </p>
              </div>
              <div class="form-group">
                <label for="hero2">
                  Gambar 2
                  <span class="text-danger">*</span>
                </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="hero2" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar About wajib di isi!')" oninput="setCustomValidity('')">
                  <label class="custom-file-label" for="customFile">Pilih gambar</label>
                </div>
                <p class="text-danger font-weight-bold mt-2">
                  <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                </p>
              </div>
              <div class="form-group">
                <label for="hero3">
                  Gambar 3
                  <span class="text-danger">*</span>
                </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="hero3" accept="image/png, image/jpeg, image/jpg">
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
    </div>
  </form>

  <!-- editHero -->
  <form action="<?= base_url('admin/hero/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editHero" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data Hero</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="pl-3 pr-3">
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <label for="heroheadingedit">
                    Heading
                    <span class="text-danger">*</span>
                  </label>
                  <input type="hidden" class="form-control idhero" name="idhero" readonly>
                  <input type="text" class="form-control text-capitalize heroheadingedit" name="heroheadingedit" placeholder="Heading.." required oninvalid="this.setCustomValidity('Heading wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-12">
                  <label for="herocontentedit">
                    Content
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize herocontentedit" name="herocontentedit" placeholder="Content.." required oninvalid="this.setCustomValidity('Content wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="hero1now">
                    Gambar 1 Saat ini
                    <span class="text-danger">*</span>
                  </label>
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="" alt="" class="img-thumbnail hero1now" style="max-height:180px;">
                      <input type="hidden" class="form-control oldhero1" name="oldhero1" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="hero1edit">
                    Gambar 1 Baru
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="hero1edit">
                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                  </div>
                  <p class="text-danger font-weight-bold mt-2">
                    <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                  </p>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="hero2now">
                    Gambar 2 Saat ini
                    <span class="text-danger">*</span>
                  </label>
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="" alt="" class="img-thumbnail hero2now" style="max-height:180px;">
                      <input type="hidden" class="form-control oldhero2" name="oldhero2" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="hero2edit">
                    Gambar 2 Baru
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="hero2edit">
                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                  </div>
                  <p class="text-danger font-weight-bold mt-2">
                    <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                  </p>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="hero3now">
                    Gambar 3 Saat ini
                    <span class="text-danger">*</span>
                  </label>
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="" alt="" class="img-thumbnail hero3now" style="max-height:180px;">
                      <input type="hidden" class="form-control oldhero3" name="oldhero3" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="hero3edit">
                    Gambar 3 Baru
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="hero3edit">
                    <label class="custom-file-label" for="customFile">Pilih gambar</label>
                  </div>
                  <p class="text-danger font-weight-bold mt-2">
                    <i>pastikan file gambar ber-extensi .jpg/.jpeg/.png</i>
                  </p>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <button type="submit" class="btn btn-dark float-right" style="padding: 0.5rem 1.2rem;">
                    Simpan
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>