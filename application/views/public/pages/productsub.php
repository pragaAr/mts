<header class="header" id="header">
  <nav class="nav container">
    <a href="<?= base_url('home') ?>" class="nav__logo">
      <img src="<?= base_url('assets/logo/mts-logo.png') ?>" alt="" class="nav__logo-img">
    </a>
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="<?= base_url('home/#home') ?>" class="nav__link">Home</a>
        </li>
        <li class="nav__item">
          <a href="<?= base_url('home/#about') ?>" class="nav__link">About</a>
        </li>
        <li class="nav__item">
          <a href="<?= base_url('home/#category') ?>" class="nav__link">Category</a>
        </li>
        <li class="nav__item">
          <a href="<?= base_url('home/#products') ?>" class="nav__link active-link">Products</a>
        </li>
        <li class="nav__item">
          <a href="<?= base_url('home/#brands') ?>" class="nav__link">Brands</a>
        </li>
        <li class="nav__item">
          <a href="<?= base_url('home/#contact') ?>" class="nav__link">Contact</a>
        </li>
      </ul>
      <div class="nav__close" id="nav-close">
        <i class="ri-close-line"></i>
      </div>
    </div>
    <div class="nav__btns">
      <i class="ri-moon-line change-theme" id="theme-button"></i>

      <div class="nav__toggle" id="nav-toggle">
        <i class="ri-menu-line"></i>
      </div>
    </div>
  </nav>
</header>

<main class="main">
  <section class="product section container" id="products">
    <h2 class="section__title-center">
      <?php if (!empty($iduri)) { ?>
        <?= ucwords($name->sub_name) ?> List
      <?php } else { ?>
        Unknown Sub Categories
      <?php } ?>
    </h2>
    <form action="<?= base_url('home/subcategorydetail/') . $id ?>" class="form__search_product" method="post">
      <input type="text" class="form__control" name="product-name" placeholder="Search Product" autocomplete="off">
      <input type="submit" class="search__btn" name="submit"></input>
    </form>

    <?php if (!empty($sub)) { ?>
      <div class="ourproduct__container grid">
        <?php foreach ($sub as $sub) : ?>
          <article class="ourproduct__card">
            <img src="<?= base_url('assets/upload/product/') . $sub->product_img ?>" alt="Product img" class="ourproduct__img">
            <h3 class="ourproduct__title"><?= ucwords($sub->product_name) ?></h3>
            <a href="https://wa.me/628122564507?text=Saya%20ingin%20mendapatkan%20info%20product%20<?= ucwords($sub->product_name) ?>%20" class="ourproduct__button" target="_blank">
              <i class="ri-whatsapp-line"></i>
              Ask Now
            </a>
          </article>
        <?php endforeach ?>
      </div>
      <?= $this->pagination->create_links(); ?>
    <?php } else { ?>
      <div class="product__notfound">
        <h4 style="margin-top:2rem;">
          product tidak tersedia..<br>Silahkan cari product lainnya..
        </h4>
      </div>
    <?php } ?>
  </section>
</main>