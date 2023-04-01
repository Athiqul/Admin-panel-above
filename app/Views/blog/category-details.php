
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
                    <h4 class="card-title">Category Details</h4>
                    <div class="row">
                      <div class="col-12">
                     
                      <div class="col-lg-6 col-sm-12">
                        <h4>Category Name</h4>
                        <p class="text-muted"><?=$response->msg->cat_name?></p>
                      </div>
                    
                      <div class="col-lg-6 col-sm-12">
                        <h4>Meta Tags</h4>
                        <p class="text-muted">
                         <?=$response->msg->meta_tag?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Meta Description</h4>
                        <p class="text-muted">
                         <?=$response->msg->meta_desc?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Status</h4>
                        <p class="text-muted">
                         <?=($response->msg->status==1)?"Activated":"Deactive"?>
                        </p>
                      </div>
                     
                      <p class="card-description my-4">Created At</p>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Date</h4>
                        <p class="text-muted"><?=date('j M Y',strtotime($response->msg->created_at->date))?></p>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-4 text-center mt-4">
                        <div class="form-group">
                          <a
                            class="btn btn-outline-primary"
                            href="<?=site_url('/admin/blog-category-update/'.$response->msg->id)?>"
                            >Edit</a
                          >
                          
                        </div>
                      </div>
       
<div class="col-4 text-center mt-4">
<?=form_open('/admin/blog-category-update/'.$response->msg->id)?>
                              <input type="hidden" name="status" value="<?=($response->msg->status==1)?"0":"1"?>">
                              <button onclick="return confirm('Are you Sure?')" class="btn <?=($response->msg->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($response->msg->status=="1")?"Hidden":"Activate"?>
                              </button>
                          </form>
</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!-- image Modal -->
          <div class="card">

          <div class="card-body">
                    <h4 class="card-title">Blog List</h4>

                    <div class="table-responsive">
                    <?php if($blogList->errors==false):?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>                    
                            <th>Created</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($blogList->msg as $item):?>
                          <tr>
                            <td>
                              <a class="text-light text-decoration-none" href="<?=site_url('/admin/show-blog/'.$item[0]->id)?>">
                                <?=$item[0]->title?></a
                              >
                            </td>
                           
                            
                            <td><?=date('j M Y',strtotime($item[0]->created_at->date))?></td>
                       

                            <td>
                              <?=form_open('/admin/blog-update/'.$item[0]->id)?>
                              <input type="hidden" name="status" value="<?=($item[0]->status==1)?"0":"1"?>">
                              <button onclick="return confirm('Are you Sure?')" class="btn <?=($item[0]->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item[0]->status=="1")?"Hidden":"Activate"?>
                              </button>
                          </form>
                            </td>
                            
                          </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                    
                    <?php else: ?>
                      <h2 class="card-title"><?=$blogList->msg?></h4>
                    <?php endif?>
                  </div>
                </div>
          </div>
       
          <!-- content-wrapper ends -->
         
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
    
