<header class="header" id="header">
  <nav class="nav container">
    <a href="<?= base_url('home') ?>" class="nav__logo">
      <img src="<?= base_url('assets/logo/mts-logo.png') ?>" alt="" class="nav__logo-img">
    </a>
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="#home" class="nav__link active-link">Home</a>
        </li>
        <li class="nav__item">
          <a href="#about" class="nav__link">About</a>
        </li>
        <li class="nav__item">
          <a href="#category" class="nav__link">Category</a>
        </li>
        <li class="nav__item">
          <a href="#products" class="nav__link">Product</a>
        </li>
        <li class="nav__item">
          <a href="#brands" class="nav__link">Brands</a>
        </li>
        <li class="nav__item">
          <a href="#contact" class="nav__link">Contact Us</a>
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
  <section class="home" id="home">
    <div class="home__container container grid">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="<?= base_url('assets/upload/web-img/hero/') . $hero->hero_img_1 ?>" class="hero__img" alt="slide 1">
          </div>
          <div class="swiper-slide">
            <img src="<?= base_url('assets/upload/web-img/hero/') . $hero->hero_img_2 ?>" class="hero__img" alt="slide 2">
          </div>
          <div class="swiper-slide">
            <img src="<?= base_url('assets/upload/web-img/hero/') . $hero->hero_img_3 ?>" class="hero__img" alt="slide 3">
          </div>
        </div>
      </div>
      <div class="home__data">
        <h1 class="home__title">
          <?= ucwords($hero->hero_heading) ?>
        </h1>
        <p class="home__description">
          <?= ucwords($hero->hero_content) ?>
        </p>
        <a href="#about" class="button button--flex">
          Explore <i class="ri-arrow-right-down-line button__icon"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="about section container" id="about">
    <div class="about__container grid">
      <img src="<?= base_url('assets/upload/web-img/about/') . $about->about_img ?>" alt="" class="about__img">
      <div class="about__data">
        <h2 class="section__title about__title">
          <?= ucwords($about->about_heading) ?>
        </h2>
        <p class="about__description">
          <?= ucwords($about->about_content) ?>
        </p>
        <div class="about__details">
          <?php if ($about->desc_1 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_1) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
          <?php if ($about->desc_2 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_2) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
          <?php if ($about->desc_3 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_3) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
          <?php if ($about->desc_4 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_4) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
          <?php if ($about->desc_5 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_5) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
          <?php if ($about->desc_6 != "") { ?>
            <p class="about__details-description">
              <i class="ri-checkbox-fill about__details-icon"></i>
              <?= ucfirst($about->desc_6) ?>
            </p>
          <?php } else { ?>

          <?php } ?>
        </div>
        <a href="#products" class="button--link button--flex">
          See our product
          <i class="ri-arrow-right-down-line button__icon"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="product section container" id="category">
    <h2 class="section__title-center">
      Product Categories
    </h2>
    <div class="product__container grid">
      <?php foreach ($category as $category) : ?>
        <article class="product__card">
          <img src="<?= base_url('assets/upload/category/') . $category->category_img ?>" alt="img category" class="product__img">
          <h3 class="product__title"><?= ucwords($category->category_name) ?></h3>
          <a href="<?= base_url('home/subcategory/') . $category->id_category ?>" class="product__button">Details</a>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="d-flex">
      <a href="<?= base_url('home/productcategories') ?>" class="see__all__btn">See All Categories</a>
    </div>
  </section>

  <section class="product section container" id="products">
    <h2 class="section__title-center">
      Product
    </h2>
    <div class="product__container grid">
      <?php foreach ($product as $product) : ?>
        <article class="product__card">
          <img src="<?= base_url('assets/upload/product/') . $product->product_img ?>" alt="img product" class="product__img">
          <h3 class="subproduct__title"><?= ucwords($product->product_name) ?></h3>
          <a href="<?= base_url('home/product/') . $product->id_product ?>" class="product__button">Details</a>
        </article>
      <?php endforeach; ?>
    </div>
    <div class="d-flex">
      <a href="<?= base_url('home/products') ?>" class="see__all__btn">See All Product</a>
    </div>
  </section>

  <section class="brand section" id="brands">
    <h2 class="section__title-center brand__title">
      Product Brands
    </h2>
    <div class="brand__container container">
      <div class="slide-container">
        <div class="swiper-brand">
          <div class="swiper-wrapper">
            <?php foreach ($merk as $merk) : ?>
              <div class="swiper-slide">
                <div class="brand__content">
                  <div class="brand__card">
                    <img src="<?= base_url('assets/upload/merk/') . $merk->merk_img ?>" alt="" class="card-img">
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="brand__pagination"></div>
      </div>
    </div>
  </section>

  <section class="contact section container" id="contact">
    <div class="mailsuccess" data-flashdata="<?= $this->session->flashdata('mailsuccess'); ?>"></div>
    <div class="mailfailed" data-flashdata="<?= $this->session->flashdata('mailfailed'); ?>"></div>
    <div class="contact__container grid">
      <div class="contact__box">
        <h2 class="section__title">
          Contact us by phone <br> or send us an email
        </h2>
        <div class="contact__data">
          <div class="contact__information">
            <h3 class="contact__subtitle">Call us for support you need</h3>
            <a href="https://wa.me/628122564507" target="_blank" class="contact__description">
              <i class="ri-phone-line contact__icon"></i>
              0812-2564-507
            </a>
            <br>
            <br>
            <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=mtekniksejati@gmail.com" target="_blank" class="contact__description">
              <i class="ri-mail-add-line contact__icon"></i>
              mtekniksejati@gmail.com
            </a>
          </div>
        </div>
      </div>
      <form action="<?= base_url('home/sendMail') ?>" class="contact__form" method="post">
        <div class="contact__inputs">
          <div class="contact__content">
            <input type="text" name="yourname" class="contact__input" required>
            <label for="yourname" class="contact__label">Your Name</label>
          </div>
          <div class="contact__content">
            <input type="email" name="yourmail" class="contact__input" required>
            <label for="yourmail" class="contact__label">Email</label>
          </div>
          <div class="contact__content">
            <input type="text" name="yoursubject" class="contact__input" required>
            <label for="yoursubject" class="contact__label">Subject</label>
          </div>
          <div class="contact__content contact__area">
            <textarea type="text" name="yourmessage" class="contact__input" maxlength="150" required></textarea>
            <label for="yourmessage" class="contact__label">Message</label>
          </div>
        </div>
        <button class="button button--flex" type="submit">
          Send Message
          <i class="ri-arrow-right-up-line button__icon"></i>
        </button>
      </form>
    </div>
  </section>
</main>