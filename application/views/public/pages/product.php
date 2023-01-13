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
          <a href="<?= base_url('home/#contact') ?>" class="nav__link">Contact Us</a>
        </li>
      </ul>
      <div class="nav__close" id="nav-close">
        <i class="ri-close-line"></i>
      </div>
    </div>
    <div class="nav__btns">
      <!-- Theme change button -->
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
      All Products
    </h2>
    <form action="<?= base_url('home/products') ?>" class="form__search_product" method="post">
      <input type="text" class="form__control" name="product-name" placeholder="Search Products" autocomplete="off">
      <input type="submit" class="search__btn" name="submit"></input>
    </form>
    <?php if (!empty($product)) { ?>
      <div class="product__container grid">
        <?php foreach ($product as $product) : ?>
          <article class="product__card">
            <img src="<?= base_url('assets/upload/product/') . $product->product_img ?>" alt="Product img" class="product__img">
            <h3 class="subproduct__title"><?= ucwords($product->product_name) ?></h3>
            <a href="https://wa.me/6285226213166?text=Saya%20ingin%20mendapatkan%20info%20product%20<?= ucwords($product->product_name) ?>%20" class="product__button" target="_blank">
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