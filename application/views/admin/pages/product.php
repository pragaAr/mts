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
              <button type="button" class="btn btn-primary addProduct-btn" data-toggle="modal" data-target="#addProduct" style="padding: 0.5rem 1.2rem;">
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataProduk" class="display table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Tipe</th>
                      <th>Nama</th>
                      <th>Merk</th>
                      <th>Kategori</th>
                      <th>Sub Kategori</th>
                      <th>Satuan-Jumlah</th>
                      <th>Gambar</th>
                      <th>Date Add</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($product as $data) : ?>
                      <tr>
                        <td><?= $no ?>.</td>
                        <td><?= ucwords($data->product_type) ?></td>
                        <td><?= ucwords($data->product_name) ?></td>
                        <td><?= ucwords($data->nama_merk) ?></td>
                        <td><?= ucwords($data->category_name) ?></td>
                        <td><?= ucwords($data->sub_name) ?></td>
                        <td><?= ucwords($data->satuan) ?>-<?= $data->jumlah ?></td>
                        <td>
                          <img src=" <?= base_url('assets/upload/product/') . $data->product_img ?>" style="max-width:110px;">
                        </td>
                        <td><?= date('d-m-Y', strtotime($data->productAdd)) ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="" class="btn btn-warning btn-sm edit-product" title="Ubah Data" data-id="<?= $data->id_product ?>">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= base_url('admin/product/delete/') . $data->id_product ?>" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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

  <!-- addProduct -->
  <form action="<?= base_url('admin/product') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addProduct" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Tambah Data Product</h4>
            <button type="button" class="close addProduct-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="pl-3 pr-3">
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="tipeproduk">
                    Tipe Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize" name="tipeproduk" placeholder="Tipe Produk.." required oninvalid="this.setCustomValidity('Tipe Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="namaproduk">
                    Nama Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize" name="namaproduk" placeholder="Nama Produk.." required oninvalid="this.setCustomValidity('Nama Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="merkproduk">
                    Merk Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="merkproduk" id="merkproduk" class="form-control select2" style="width:100%;" required oninvalid="this.setCustomValidity('Merk Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                    <option value="" selected disabled>-Pilih Merk-</option>
                    <?php foreach ($merk as $merk) : ?>
                      <option value="<?= $merk->id_merk ?>"><?= ucwords($merk->nama_merk) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-lg-6">
                  <label for="kategoriproduk">
                    Kategori Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="kategoriproduk" id="kategoriproduk" class="form-control select2" style="width:100%;" required oninvalid="this.setCustomValidity('Kategori Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                    <option value="" selected disabled>-Pilih Kategori-</option>
                    <?php foreach ($cat as $cat) : ?>
                      <option value="<?= $cat->id_category ?>"><?= ucwords($cat->category_name) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="subkategoriproduk">
                    Sub Kategori Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="subkategoriproduk" id="subkategoriproduk" class="form-control select2" style="width:100%;" autocomplete="off">
                    <option value="" selected disabled>-Pilih Sub Kategori-</option>
                    <?php foreach ($sub as $sub) : ?>
                      <option value="<?= $sub->id_subcategory ?>"><?= ucwords($sub->sub_name) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-lg-6">
                  <label for="satuanproduk">
                    Satuan Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize" name="satuanproduk" placeholder="Pcs/Dos/Pak/etc.." required oninvalid="this.setCustomValidity('Satuan Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-4">
                  <label for="jumlahproduk">
                    Jumlah Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" class="form-control text-capitalize" name="jumlahproduk" placeholder="Jumlah Produk.." required oninvalid="this.setCustomValidity('Jumlah Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-8">
                  <label for="keterangan">
                    Keterangan
                    <span class="text-danger">*</span>
                  </label>
                  <textarea name="keterangan" class="form-control text-capitalize" placeholder="Keterangan.." style="height: calc(2.25rem + 2px) !important; min-height: calc(2.25rem + 2px) !important;"></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-12">
                  <label for="gambarproduk">
                    Gambar Produk
                    <span class="text-danger">*</span>
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="gambarproduk" required oninvalid="this.setCustomValidity('Gambar Produk wajib di isi!')" oninput="setCustomValidity('')">
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

  <!-- editProduct -->
  <form action="<?= base_url('admin/product/update') ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editProduct" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Update Data Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="pl-3 pr-3">
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="tipeprodukedit">
                    Tipe Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="hidden" class="form-control idproduk" name="idproduk" readonly>
                  <input type="text" class="form-control text-capitalize tipeprodukedit" name="tipeprodukedit" placeholder="Tipe Produk.." required oninvalid="this.setCustomValidity('Tipe Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-6">
                  <label for="namaprodukedit">
                    Nama Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize namaprodukedit" name="namaprodukedit" placeholder="Nama Produk.." required oninvalid="this.setCustomValidity('Nama Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="merkprodukedit">
                    Merk Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="merkprodukedit" id="merkprodukedit" class="form-control select2 merkprodukedit" style="width:100%;" required oninvalid="this.setCustomValidity('Merk Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                    <option value="" selected disabled>-Pilih Merk-</option>
                    <?php foreach ($editmerk as $merk) : ?>
                      <option value="<?= $merk->id_merk ?>"><?= ucwords($merk->nama_merk) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-lg-6">
                  <label for="kategoriprodukedit">
                    Kategori Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="kategoriprodukedit" id="kategoriprodukedit" class="form-control select2 kategoriprodukedit" style="width:100%;" required oninvalid="this.setCustomValidity('Kategori Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                    <option value="" selected disabled>-Pilih Kategori-</option>
                    <?php foreach ($editcat as $cat) : ?>
                      <option value="<?= $cat->id_category ?>"><?= ucwords($cat->category_name) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="subkategoriprodukedit">
                    Sub Kategori Produk
                    <span class="text-danger">*</span>
                  </label>
                  <select name="subkategoriprodukedit" id="subkategoriprodukedit" class="form-control select2 subkategoriprodukedit" style="width:100%;" autocomplete="off">
                    <option value="" selected disabled>-Pilih Sub Kategori-</option>
                    <?php foreach ($editsub as $sub) : ?>
                      <option value="<?= $sub->id_subcategory ?>"><?= ucwords($sub->sub_name) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-lg-6">
                  <label for="satuanprodukedit">
                    Satuan Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="text" class="form-control text-capitalize satuanprodukedit" name="satuanprodukedit" placeholder="Pcs/Dos/Pak/etc.." required oninvalid="this.setCustomValidity('Satuan Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-4">
                  <label for="jumlahprodukedit">
                    Jumlah Produk
                    <span class="text-danger">*</span>
                  </label>
                  <input type="number" class="form-control jumlahprodukedit" name="jumlahprodukedit" placeholder="Jumlah Produk.." required oninvalid="this.setCustomValidity('Jumlah Produk wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off">
                </div>
                <div class="form-group col-lg-8">
                  <label for="keteranganedit">
                    Keterangan
                    <span class="text-danger">*</span>
                  </label>
                  <textarea name="keterangan" class="form-control text-capitalize keteranganedit" placeholder="Keterangan.." style="height: calc(2.25rem + 2px) !important; min-height: calc(2.25rem + 2px) !important;"></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="gambarproductedit">
                    Gambar Kategori Saat ini
                  </label>
                  <div class="row">
                    <div class="col-lg-12">
                      <img src="" alt="" class="img-thumbnail gambarproductedit" style="max-width:180px;">
                      <input type="hidden" class="form-control oldprodimg" name="oldprodimg" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="gambarprodnew">
                    Gambar Kategori Baru
                  </label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="gambarprodnew">
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