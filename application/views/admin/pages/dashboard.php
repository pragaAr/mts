   <div class="main-panel">
     <div class="userlogin" data-flashdata="<?= $this->session->flashdata('userlogin'); ?>"></div>
     <div class="content">
       <div class="panel-header bg-primary-gradient">
         <div class="page-inner py-5">
           <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
             <div>
               <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
             </div>
             <div class="ml-md-auto py-md-0">
               <span class="text-white op-7" id="jam"></span>
             </div>
           </div>
         </div>
       </div>
       <div class="page-inner mt--5">
         <div class="row mt--2">
           <div class="col-md-4">
             <div class="card full-height">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <span class="stamp stamp-md bg-secondary mr-3">
                     <i class="fas fa-toolbox"></i>
                   </span>
                   <div>
                     <h5 class="mb-1">
                       <b>
                         <a href="<?= base_url('admin/product') ?>"><?= $product ?>
                           <small>Product</small>
                         </a>
                       </b>
                     </h5>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-4">
             <div class="card full-height">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <span class="stamp stamp-md bg-success mr-3">
                     <i class="fas fa-list-ol"></i>
                   </span>
                   <div>
                     <h5 class="mb-1">
                       <b>
                         <a href="<?= base_url('admin/category') ?>"><?= $category ?>
                           <small>Kategori</small>
                         </a>
                       </b>
                     </h5>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-4">
             <div class="card full-height">
               <div class="card-body">
                 <div class="d-flex align-items-center">
                   <span class="stamp stamp-md bg-info mr-3">
                     <i class="fas fa-tags"></i>
                   </span>
                   <div>
                     <h5 class="mb-1">
                       <b>
                         <a href="<?= base_url('admin/merk') ?>"><?= $merk ?>
                           <small>Merk</small>
                         </a>
                       </b>
                     </h5>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>