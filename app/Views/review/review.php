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
                    <h4 class="card-title">Client Review</h4>

                    
                    <?php if($response->errors==false):?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Client</th>
                            <th>Company</th>
                            <th>Created At</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($response->msg as $item):?>
                          <tr>

                            <td>
                              <a href="<?=site_url('/admin/show-review/'.$item->id)?>" class="text-light text-decoration-none">
                                <?=$item->customer_name?></a
                              >
                            </td>
                            <td><?=$item->company?></td>
                            <td><?=date('j M Y',strtotime($item->created_at->date))?></td>
                            <td>
                              <?=form_open('/admin/update-review/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button onclick="return confirm('Are you Sure?')" class="btn <?=($item->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item->status=="1")?"Hidden":"Activate"?>
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
                          <a class="nav-link active text-light" href="<?=site_url('/admin/customer-reviews?page='.$previous )?>">Previous</a>
                        </li>
                        <?php endif?>
                        <?php for($i=1;$i<=$page;$i++):?>
                        <li class="nav-item">
                          <a  class="nav-link text-light<?=($current==$i)?"bg-primary":""?>" href="<?=site_url('/admin/customer-reviews?page='.$i)?>"><?=$i?></a>
                        </li>
                      <?php endfor?>
                       <?php if((int)$current<(int)$page):?>
                        <li class="page-item">
                        <?php
                          $current=(int)$current+1;
                          ?>
                          <a class="nav-link text-light" href="<?=site_url('/admin/customer-reviews?page='.$current )?>">Next</a>
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
          <!-- partial:partials/_footer.html -->
          <!-- partial:partials/_footer.html -->

          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>