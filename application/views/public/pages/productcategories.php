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
      All Product Categories
    </h2>
    <form action="<?= base_url('home/productcategories') ?>" class="form__search_product" method="POST">
      <input type="text" class="form__control" name="category-name" placeholder="Search Category" autocomplete="off">
      <input type="submit" class="search__btn" name="submit"></input>
    </form>
    <?php if (!empty($category)) { ?>
      <div class="ourproduct__container">
        <?php foreach ($category as $category) : ?>
          <article class="ourproduct__card">
            <img src="<?= base_url('assets/upload/category/') . $category->category_img ?>" alt="img category" class="ourproduct__img">
            <h3 class="ourproduct__title"><?= ucwords($category->category_name) ?></h3>
            <a href="<?= base_url('home/subcategory/') . $category->id_category ?>" class="ourproduct__button">Details</a>
          </article>
        <?php endforeach ?>
      </div>
      <?= $this->pagination->create_links(); ?>
    <?php } else { ?>
      <div class="product__notfound">
        <h4 style="margin-top:2rem;">
          kategori tidak tersedia..<br>Silahkan cari kategori lainnya..
        </h4>
      </div>
    <?php } ?>
  </section>
</main>