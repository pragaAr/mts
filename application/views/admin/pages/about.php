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
              <button type="button" class="btn btn-primary addAbout-btn" data-toggle="modal" data-target="#addAbout" style="padding: 0.5rem 1.2rem;">
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
                      <th>Desc 1</th>
                      <th>Desc 2</th>
                      <th>Desc 3</th>
                      <th>Desc 4</th>
                      <th>Desc 5</th>
                      <th>Desc 6</th>
                      <th>Gambar</th>
                      <th>Date Add</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($about as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->about_heading) ?></td>
                        <td><?= ucwords($data->about_content) ?></td>
                        <td><?= ucfirst($data->desc_1) ?></td>
                        <td><?= ucfirst($data->desc_2) ?></td>
                        <td><?= ucfirst($data->desc_3) ?></td>
                        <td><?= ucfirst($data->desc_4) ?></td>
                        <td><?= ucfirst($data->desc_5) ?></td>
                        <td><?= ucfirst($data->desc_6) ?></td>
                        <td class="text-center">
                          <img src=" <?= base_url('assets/upload/web-img/about/') . $data->about_img ?>" style="max-height:220px;">
                        </td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($data->aboutAdd)) ?></td>
                        <td class="text-center">
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-about" title="Ubah Data" data-id="<?= $data->id_about ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/about/delete/') . $data->id_about ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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

  <!-- addAbout -->
  <form action="<?= base_url('admin/about') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addAbout" data-backdrop="static">
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
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="heading">
                    Heading
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize" name="heading" placeholder="Heading.." required oninvalid="this.setCustomValidity('Heading wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="content">
                    Content
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize" name="content" placeholder="Content.." required oninvalid="this.setCustomValidity('Content wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc1">Desc 1</label>
                  <input type="text" class="form-control text-capitalize" name="desc1" placeholder="Desc 1.." required oninvalid="this.setCustomValidity('Desc 1 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc2">Desc 2</label>
                  <input type="text" class="form-control text-capitalize" name="desc2" placeholder="Desc 2.." required oninvalid="this.setCustomValidity('Desc 2 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc3">Desc 3</label>
                  <input type="text" class="form-control text-capitalize" name="desc3" placeholder="Desc 3.." required oninvalid="this.setCustomValidity('Desc 3 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc4">Desc 4</label>
                  <input type="text" class="form-control text-capitalize" name="desc4" placeholder="Desc 4.." required oninvalid="this.setCustomValidity('Desc 4 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc5">Desc 5</label>
                  <input type="text" class="form-control text-capitalize" name="desc5" placeholder="Desc 5.." autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc6">Desc 6</label>
                  <input type="text" class="form-control text-capitalize" name="desc6" placeholder="Desc 6.." autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <label for="gambarabout">
                    Gambar About
                    <span class="text-danger">*</span>
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="gambarabout" accept="image/png, image/jpeg, image/jpg" required oninvalid="this.setCustomValidity('Gambar About wajib di isi!')" oninput="setCustomValidity('')">
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

  <!-- editAbout -->
  <form action="<?= base_url('admin/about/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editAbout" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data About</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="pl-3 pr-3">
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="headingedit">
                    Heading
                    <span class="text-danger">*</span>
                  </label>
                  <input type="hidden" class="form-control idabout" name="idabout" readonly>
                  <input type="text" class="form-control text-capitalize headingedit" name="headingedit" placeholder="Heading.." required oninvalid="this.setCustomValidity('Heading wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="contentedit">
                    Content
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize contentedit" name="contentedit" placeholder="Content.." required oninvalid="this.setCustomValidity('Content wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc1edit">Desc 1</label>
                  <input type="text" class="form-control text-capitalize desc1edit" name="desc1edit" placeholder="Desc 1.." required oninvalid="this.setCustomValidity('Desc 1 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc2edit">Desc 2</label>
                  <input type="text" class="form-control text-capitalize desc2edit" name="desc2edit" placeholder="Desc 2.." required oninvalid="this.setCustomValidity('Desc 2 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc3edit">Desc 3</label>
                  <input type="text" class="form-control text-capitalize desc3edit" name="desc3edit" placeholder="Desc 3.." required oninvalid="this.setCustomValidity('Desc 3 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc4edit">Desc 4</label>
                  <input type="text" class="form-control text-capitalize desc4edit" name="desc4edit" placeholder="Desc 4.." required oninvalid="this.setCustomValidity('Desc 4 wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="desc5edit">Desc 5</label>
                  <input type="text" class="form-control text-capitalize desc5edit" name="desc5edit" placeholder="Desc 5.." autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="desc6edit">Desc 6</label>
                  <input type="text" class="form-control text-capitalize desc6edit" name="desc6edit" placeholder="Desc 6.." autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="gambaraboutedit">
                    Gambar About Saat ini
                    <span class="text-danger">*</span>
                  </label>
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="" alt="" class="img-thumbnail gambaraboutedit" style="max-height:250px;">
                      <input type="hidden" class="form-control oldaboutimg" name="oldaboutimg" readonly>
                    </div>
                  </div>

                </div>
                <div class="form-group col-lg-6">
                  <label for="gambaredit">
                    Gambar About Baru
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