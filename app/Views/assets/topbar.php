<nav class="navbar p-0 fixed-top d-flex flex-row">
          <div
            class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center"
          >
            <a class="navbar-brand brand-logo-mini" href="<?=site_url('/admin')?>"
              ><img src="./images/logo-mini.svg" alt="logo"
            /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button
              class="navbar-toggler navbar-toggler align-self-center"
              type="button"
              data-toggle="minimize"
            >
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100"></ul>
            <ul class="navbar-nav navbar-nav-right">
            <?php
                 $noti=pendingCallback();
                 if($noti->errors==true)
                 {
                      $count='';
                 }
                 else{
                  $count=$noti->total;
                 }
                 
                 ?>
              <li class="nav-item dropdown border-left">
                <a
                  class="nav-link count-indicator dropdown-toggle"
                  id="notificationDropdown"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"><?=$count?></span>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                  aria-labelledby="notificationDropdown"
                >
                
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <?php if($noti->errors==false):?>
                    <?php foreach($noti->msg as $item):?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?=site_url('/admin/pending-request')?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-bell-alert-outline text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1"><?=$item->customer_name?></p>
                      <p class="text-muted ellipsis mb-0">
                        Call Back Request not solved
                      </p>
                    </div>
                  </a>
                  <?php endforeach?>
                  <?php endif?>
                
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link"
                  id="profileDropdown"
                  href="#"
                  data-bs-toggle="dropdown"
                >
                  <div class="navbar-profile">
                    <img
                      class="img-xs rounded-circle"
                      src="/images/admin.svg"
                      alt=""
                    />
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                     <?=session()->get('username')?>
                    </p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                  aria-labelledby="profileDropdown"
                >
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?=site_url('/admin/show-user/'.session()->get('user_id'))?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-account text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Profile</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?=site_url('/admin/update-password/'.session()->get('user_id'))?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-lock text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                     <p class="preview-subject mb-1" >Password Change</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?=site_url('/login/exit')?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  
                </div>
              </li>
            </ul>
            <button
              class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
              type="button"
              data-toggle="offcanvas"
            >
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>