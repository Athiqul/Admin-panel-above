<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Admin Panel|Above IT<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<?= $this->include('assets/navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('topbar') ?>
<?= $this->include('assets/topbar') ?>
<?= $this->endSection() ?>
<?= $this->section('alert') ?>
<?= $this->include('assets/alert') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Content Writer List</h4>

                    <div class="table-responsive">
                    <?php if($response->errors==false):?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Designation</th>                                                       
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($response->msg as $item):?>
                          <tr>
                            <td>
                              <a class="text-light text-decoration-none" href="<?=site_url('/admin/show-user/'.$item->id)?>">
                                <?=$item->user_name?></a
                              >
                            </td>
                            <td><?=$item->role==1?"Content Writer":""?></td>
                            
                            <td><?=$item->email?></td>
                            <td><?=$item->mobile?></td>
                           

                            <td>
                              <?=form_open('/admin/update-profile/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button <?=(session()->get('role')=='1')? "disabled":""?> onclick="return confirm('Are you Sure?')" class="btn <?=($item->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item->status=="1")?"Deactive":"Activate"?>
                              </button>
                          </form>
                            </td>
                            
                          </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                    
                    <?php else: ?>
                      <h2 class="card-title"><?=$response->msg?></h4>
                    <?php endif?>
                  </div>
                </div>
              
                   
          
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         

          
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>