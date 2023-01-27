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
      <?php if (!empty($iduri)) { ?>
        <?= ucwords($name->category_name) ?> Categories
      <?php } else { ?>
        Unknown Categories
      <?php } ?>
    </h2>
    <form action="<?= base_url('home/subcategory/') . $id ?>" class="form__search_product" method="post">
      <input type="text" class="form__control" name="sub-name" placeholder="Search Category" autocomplete="off">
      <input type="submit" class="search__btn" name="submit"></input>
    </form>
    <?php if (!empty($category)) { ?>
      <div class="ourproduct__container">
        <?php foreach ($category as $category) : ?>
          <article class="ourproduct__card">
            <a href="<?= base_url('home/subcategorydetail/') . $category->id_subcategory ?>">
              <img src="<?= base_url('assets/upload/sub-category/') . $category->sub_img ?>" alt="Sub Category img" class="ourproduct__img">
              <h3 class="ourproduct__title"><?= ucwords($category->sub_name) ?></h3>
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