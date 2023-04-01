<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Above IT</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="css/vendor.bundle.base.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/logo-mini.svg" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div
            class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg"
          >
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <img src="images/logo.svg" alt="" class="img-fluid" style="height:120px">
                <h3 class="card-title text-left mb-3 ">Login</h3>
                <?php if(session()->has('errors')):?>
<div class="container mt-5">
  <?php foreach(session()->get('errors') as $item):?>
    <div
                  class="alert alert-danger alert-dismissible fade show"
                  role="alert"
                >
                  <strong>Warning!</strong> <?=$item?>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                  ></button>
                </div>
  <?php endforeach?>
</div>
<?php endif?>
<?php if(session()->has('warning')):?>
  <div
                  class="alert alert-danger alert-dismissible fade show"
                  role="alert"
                >
                  <strong>Warning!</strong> <?=session()->get('warning')?>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                  ></button>
                </div>
<?php endif?>
                <?=form_open('/login/verify')?>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control  bg-light" name="email" value="<?=old('email')?>" required/>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control text-dark bg-light" name="password" value="<?=old('password')?>" required />
                  </div>
                  <div class="text-center">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block enter-btn"
                    >
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="js/vendor.bundle.base.js"></script>
    <!-- End plugin js for this page -->
  </body>
</html>
