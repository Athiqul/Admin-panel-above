
<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Admin Panel|Above IT<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<?= $this->include('Assets/navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('topbar') ?>
<?= $this->include('Assets/topbar') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>          <div class="content-wrapper">
           

   <h4 class="text-center align-content-center">Welcome <?=session()->get('username')?> Sir !! Have a Wonderful Day </h4>
          
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('Assets/footer') ?>
        <?= $this->endSection() ?>
          <!-- partial -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    
  
