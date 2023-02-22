 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2">
   <div class="sidebar-wrapper scrollbar scrollbar-inner">
     <div class="sidebar-content">
       <ul class="nav nav-primary">
         <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/dashboard') ?>">
             <i class="fas fa-home"></i>
             <p>Dashboard</p>
           </a>
         </li>

         <li class="nav-section">
           <span class="sidebar-mini-icon">
             <i class="fa fa-ellipsis-h"></i>
           </span>
           <h4 class="text-section">Web Content</h4>
         </li>
         <li class="nav-item <?= $this->uri->segment(2) == 'hero' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/hero') ?>">
             <i class="fas fa-image"></i>
             <p>Hero</p>
           </a>
         </li>
         <li class="nav-item <?= $this->uri->segment(2) == 'about' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/about') ?>">
             <i class="fas fa-window-restore"></i>
             <p>About</p>
           </a>
         </li>
         <hr>
         <li class="nav-section">
           <span class="sidebar-mini-icon">
             <i class="fa fa-ellipsis-h"></i>
           </span>
           <h4 class="text-section">Product</h4>
         </li>

         <li class="nav-item <?= $this->uri->segment(2) == 'category' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/category') ?>">
             <i class="fas fa-list-ol"></i>
             <p>Kategori</p>
           </a>
         </li>
         <li class="nav-item <?= $this->uri->segment(2) == 'merk' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/merk') ?>">
             <i class="fas fa-tags"></i>
             <p>Merk</p>
           </a>
         </li>
         <li class="nav-item <?= $this->uri->segment(2) == 'product' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
           <a href="<?= base_url('admin/product') ?>">
             <i class="fas fa-toolbox"></i>
             <p>Produk</p>
           </a>
         </li>
         <hr>
         <li class="nav-item mt-2">
           <a href="<?= base_url('admin/auth/logout') ?>">
             <i class="fas fa-sign-out-alt text-danger"></i>
             <p class="text-danger font-weight-bold">Logout</p>
           </a>
         </li>
       </ul>
     </div>
   </div>
 </div>
 <!-- End Sidebar -->