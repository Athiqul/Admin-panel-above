<?php $role=session()->get('role')?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div
          class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
        >
          <a class="sidebar-brand brand-logo" href="<?=site_url('/admin')?>"
            ><img src="../../images/logo.svg" alt="logo"
          /></a>
          <a class="sidebar-brand brand-logo-mini" href="<?=site_url('/admin')?>"
            ><img src="../../images/logo-mini.svg" alt="logo"
          /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img
                    class="img-xs rounded-circle"
                    src="/images/admin.svg"
                    alt=""
                  />
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=session()->get('username')?></h5>
                  <span><?=session()->get('role')=='1'?"Content Writer":"Admin"?></span>
                </div>
              </div>
              
            
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url('/admin')?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if($role=='0'):?>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#services"
              aria-expanded="false"
              aria-controls="services"
            >
              <span class="menu-icon">
                <i class="mdi mdi-access-point"></i>
              </span>
              <span class="menu-title">Services</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="services">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('admin/add-service')?>"
                    >Add Services
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/services')?>"
                    >Services List</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#packages"
              aria-expanded="false"
              aria-controls="packages"
            >
              <span class="menu-icon">
                <i class="mdi mdi-dropbox"></i>
              </span>
              <span class="menu-title">Packages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="packages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/add-package')?>"
                    >New Package</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/packages-list')?>"
                    >Packages</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/package-category-list')?>"
                    >Category List</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#products"
              aria-expanded="false"
              aria-controls="products"
            >
              <span class="menu-icon">
                <i class="mdi mdi-layers"></i>
              </span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/all-products')?>"
                    >Products List</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/add-product')?>"
                    >New Product</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#team"
              aria-expanded="false"
              aria-controls="products"
            >
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="menu-title">Team</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="team">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/add-member')?>"
                    >New Member</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/team-members')?>">Team List</a>
                </li>
              </ul>
            </div>
          </li>
          <?php endif?>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#content-writer"
              aria-expanded="false"
              aria-controls="content-writer"
            >
              <span class="menu-icon">
                <i class="mdi mdi-border-color"></i>
              </span>
              <span class="menu-title">Content Writer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="content-writer">
              <ul class="nav flex-column sub-menu">
                <?php if($role=='0'):?>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/add-content-writer')?>"
                    >New Writer</a
                  >
                </li>
                <?php endif?>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="<?=site_url('/admin/content-writers')?>"
                    >Content Writer</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#blog"
              aria-expanded="false"
              aria-controls="content-writer"
            >
              <span class="menu-icon">
                <i class="mdi mdi-book-open-page-variant"></i>
              </span>
              <span class="menu-title">Blog</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/add-blog')?>">New Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/blog-list')?>">Blog List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/blog-category-list')?>">Category</a>
                </li>
              </ul>
            </div>
          </li>
          <?php if($role=='0'):?>
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#review"
              aria-expanded="false"
              aria-controls="content-writer"
            >
              <span class="menu-icon">
                <i class="mdi mdi-thumb-up"></i>
              </span>
              <span class="menu-title">Review</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="review">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/create-review')?>"
                    >New Review</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/customer-reviews')?>"
                    >Review List</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url('/admin/pending-request')?>">
              <span class="menu-icon">
                <i class="mdi mdi-phone-classic"></i>
              </span>
              <span class="menu-title">CallBack</span>
            </a>
          </li>
         
          <li class="nav-item menu-items">
            <a
              class="nav-link"
              data-bs-toggle="collapse"
              href="#review"
              aria-expanded="false"
              aria-controls="content-writer"
            >
              <span class="menu-icon">
                <i class="mdi mdi-trophy"></i>
              </span>
              <span class="menu-title">Contest</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="review">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/contest-applicant')?>"
                    >All Applicant</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=site_url('/admin/candidate-email-failed')?>"
                    >Not Received</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <?php endif?>
        </ul>
      </nav>