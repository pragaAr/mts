<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="<?= base_url('assets/logo') ?>/m-icon.png" type="image/x-icon" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/assets/plugin/sweetalert2/sweetalert2.min.css">

  <title>Mitra Teknik Sejati - <?= $title ?></title>

</head>

<body style="background-color:gainsboro">
  <div class="flashrole" data-flashdata="<?= $this->session->flashdata('flashrole'); ?>"></div>
  <div class="userlogout" data-flashdata="<?= $this->session->flashdata('userlogout'); ?>"></div>
  <div class="wrongdata" data-flashdata="<?= $this->session->flashdata('wrongdata'); ?>"></div>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8">
        <div class="card mt-3">
          <div class="text-center mt-3">
            <img src="<?= base_url('assets/logo/cvmts.png') ?>" alt="CV MTS">
          </div>
          <div class="card-body mx-3">
            <form action="<?= base_url('admin/auth') ?>" method="POST">
              <hr>
              <p class="font-weight-bold">Silahkan login dahulu..</p>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username anda.." required oninvalid="this.setCustomValidity('Username wajib di isi!')" oninput="setCustomValidity('')" autocomplete="off" autofocus>
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password anda.." required oninvalid="this.setCustomValidity('Password wajib di isi!')" oninput="setCustomValidity('')">
              </div>
              <div class="text-center" style="margin-top:2.5rem !important; margin-bottom:2rem !important;">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
            </form>
            <div class="text-center">
              <p>Made with <span class="text-danger">❤</span> <br>
                <?= date('Y') ?> -
                <span class="font-weight-bold">Mitra Teknik Sejati</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/admin') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url('assets/admin') ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url('assets/admin') ?>/assets/js/core/bootstrap.min.js"></script>

  <!-- Sweet Alert -->
  <script src="<?= base_url('assets/admin') ?>/assets/plugin/sweetalert2/sweetalert2.min.js"></script>

  <script>
    const flashrole = $('.flashrole').data('flashdata');

    if (flashrole) {
      Swal.fire({
        icon: 'error',
        title: 'Eheemmm!!',
        text: flashrole,
      });
    }

    const wrongdata = $('.wrongdata').data('flashdata');

    if (wrongdata) {
      Swal.fire({
        icon: 'error',
        title: 'Ops!',
        text: wrongdata,
      });
    }

    const userlogout = $('.userlogout').data('flashdata');

    if (userlogout) {
      Swal.fire({
        icon: 'success',
        title: 'Anda telah keluar',
        text: userlogout,
      });
    }
  </script>
</body>

</html>