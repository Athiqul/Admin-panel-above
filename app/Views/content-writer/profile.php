
<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Admin Panel|Above IT<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<?= $this->include('assets/navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('topbar') ?>
<?= $this->include('assets/topbar') ?>
<?= $this->endSection() ?>

<?=$this->section('alert')?>
<?=$this->include('assets/alert')?>
<?= $this->endSection()?>
<?= $this->section('content') ?>



          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Profile</h4>
                    <div class="row">
                      <div class="col-12">
                       
                      <div class="col-lg-6 col-sm-12">
                        <h4>User Name</h4>
                        <p class="text-muted"><?=$response->msg->info[0]->user_name?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Email:</h4>
                        <p class="text-muted">
                         <?=$response->msg->info[0]->email?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Mobile:</h4>
                        <p class="text-muted">
                         <?=$response->msg->info[0]->mobile?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>User Role</h4>
                        <p class="text-muted">
                         <?=$response->msg->info[0]->role=="1"?"Content-Writer":""?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Status</h4>
                        <p class="text-muted">
                         <?=($response->msg->info[0]->status==1)?"Activated":"Deactive"?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Last Login</h4>
                        <p class="text-muted">
                         <?=($response->msg->last_login=="")?"Still Not Logged In":date('j M Y',strtotime($response->msg->last_login->updated_at->date))?>
                        </p>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                        <h4>Number of Blogs</h4>
                        <p class="text-muted">
                         <?=$response->msg->total_blog?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Address</h4>
                        <p class="text-muted">
                         <?=$response->msg->info[0]->address?>
                        </p>
                      </div>
                      
                    </div>
                    <div class="row">
                      
          


<?php if(session()->get('role')=='0'):?>
    <div class="col-4 text-center mt-4">
                        <div class="form-group">
                          <a
                            class="btn btn-outline-primary"
                            href="<?=site_url('/admin/update-profile/'.$response->msg->info[0]->id)?>"
                            >Edit</a
                          >
                          
                        </div>
                      </div>
    <div class="col-4 text-center mt-4">
<?=form_open('/admin/update-profile/'.$response->msg->info[0]->id)?>
                              <input type="hidden" name="status" value="<?=($response->msg->info[0]->status=="1")?"0":"1"?>">
                              <button onclick="return confirm('Are you Sure?')" class="btn <?=($response->msg->info[0]->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($response->msg->info[0]->status=="1")?"Hidden":"Activate"?>
                              </button>
                          </form>
</div>
<div class="col-4 text-center mt-4">
<div class="form-group">
                          <a
                            class="btn btn-outline-info"
                            href="<?=site_url('/admin/update-password/'.$response->msg->info[0]->id)?>"
                            >Update Password</a
                          >
                          
                        </div>
</div>
<?php endif?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
            <!-- Modal end -->
       
          <!-- content-wrapper ends -->
         
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
    
