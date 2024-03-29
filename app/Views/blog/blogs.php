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
                    <h4 class="card-title">Blog List</h4>

                    <div class="table-responsive">
                    <?php if($response->errors==false):?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Added By</th>                           
                            <th>Created</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($response->msg as $item):?>
                          <tr>
                            <td>
                              <a class="text-light text-decoration-none" href="<?=site_url('/admin/show-blog/'.$item->id)?>">
                                <?=$item->title?></a
                              >
                            </td>
                            <td><?=$item->user_name?></td>
                            
                            <td><?=date('j M Y',strtotime($item->created_at))?></td>
                       

                            <td>
                              <?=form_open('/admin/blog-update/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button <?=($item->user_id!=session()->get('user_id') && session()->get('role')=='1')?"disabled":""?> onclick="return confirm('Are you Sure?')" class="btn <?=($item->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item->status=="1")?"Hidden":"Activate"?>
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
              
                   
                  <?php if($page>1):?>
                  <div class="card-footer d-flex justify-content-center">
                   
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <?php if($current>1):?>
                        <li class="page-item">
                          <?php
                          $previous=(int)$current-1;
                          ?>
                          <a class="nav-link active text-light" href="<?=site_url('/admin/blog-list?page='.$previous )?>">Previous</a>
                        </li>
                        <?php endif?>
                        <?php for($i=1;$i<=$page;$i++):?>
                        <li class="nav-item">
                          <a  class="nav-link text-light<?=($current==$i)?"bg-primary":""?>" href="<?=site_url('/admin/blog-list?page='.$i)?>"><?=$i?></a>
                        </li>
                      <?php endfor?>
                       <?php if((int)$current<(int)$page):?>
                        <li class="page-item">
                        <?php
                          $current=(int)$current+1;
                          ?>
                          <a class="nav-link text-light" href="<?=site_url('/admin/blog-list?page='.$current )?>">Next</a>
                        </li>
                        <?php endif?>
                      </ul>
                    </nav>
                  </div>
                  <?php endif?>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>