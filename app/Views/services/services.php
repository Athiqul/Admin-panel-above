
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
                    <h4 class="card-title">Services List</h4>
                    <?php if($response->errors==false):?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($response->msg as $item):?>
                          <tr>

                            <td>
                              <a href="<?=site_url('/admin/show-service/'.$item->id)?>" class="text-light text-decoration-none">
                                <?=$item->title?></a
                              >
                            </td>
                           
                            <td><?=date('j M Y',strtotime($item->created_at->date))?></td>

                            <td>
                              <?=form_open('/admin/update-service/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button class="btn <?=($item->status=="1")?"btn-outline-success":"btn-outline-danger"?> " type="sub
                              ">
                                <?=($item->status=="1")?"Activated":"Hidden"?>
                              </button>
                          </form>
                            </td>
                          </tr>
                         <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                    <?php else: ?>
                      <h2 class="card-title"><?=$response->msg?></h4>
                    <?php endif?>
                  </div>
                  <?php if($page>1):?>
                  <div class="card-footer d-flex justify-content-center">
                   
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <?php if($current>1):?>
                        <li class="page-item">
                          <?php
                          $previous=(int)$current-1;
                          ?>
                          <a class="nav-link active text-light" href="<?=site_url('/admin/services?page='.$previous )?>">Previous</a>
                        </li>
                        <?php endif?>
                        <?php for($i=1;$i<=$page;$i++):?>
                        <li class="nav-item">
                          <a  class="nav-link text-light<?=($current==$i)?"bg-primary":""?>" href="<?=site_url('/admin/services?page='.$i)?>"><?=$i?></a>
                        </li>
                      <?php endfor?>
                       <?php if((int)$current<(int)$page):?>
                        <li class="page-item">
                        <?php
                          $current=(int)$current+1;
                          ?>
                          <a class="nav-link text-light" href="<?=site_url('/admin/services?page='.$current )?>">Next</a>
                        </li>
                        <?php endif?>
                      </ul>
                    </nav>
                  </div>
                  <?php endif?>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
         
          <!-- partial -->
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>

      

    
    
