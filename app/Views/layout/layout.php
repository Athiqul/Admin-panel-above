<!DOCTYPE html>
<html lang="en">

<head>
<head>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title><?=$this->renderSection('title')?></title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href=/css/materialdesignicons.min.css />
    <link rel="stylesheet" href="/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/css/jquery-jvectormap.css" />

    <link rel="stylesheet" href="/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/css/owl.theme.default.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/select2-bootstrap.min.css">
    <!-- End layout styles -->
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="shortcut icon" href="/images/logo-mini.svg" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- More Css Added  -->
    <?=$this->renderSection('custom-css')?>
  </head>
</head>

<body>
<div class="container-scroller">
        <?=$this->renderSection('navbar')?>
        <div class="container-fluid page-body-wrapper">
        <?=$this->renderSection('topbar')?>
        <div class="main-panel">
        <?= $this->renderSection('alert') ?>
        <?= $this->renderSection('content') ?>
        <?=$this->renderSection('footer')?>
        </div>
        </div>
        </div>
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/js/Chart.min.js"></script>
    <script src="/js/progressbar.min.js"></script>
    <script src="/js/jquery-jvectormap.min.js"></script>
    <script src="/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/misc.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
   
    <script src="/js/dashboard.js"></script>
    <script src="/js/file-upload.js"></script>
   
    <script src="/js/select2.min.js"></script>
    <script src="/js/select2.js"></script>
    <script src="/js/modal.js"></script>
    <?=$this->renderSection('custom-js')?>
    <!-- End custom js for this page -->
</body>

</html>