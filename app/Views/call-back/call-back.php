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
                    <h4 class="card-title">Call-Back List </h4>
                      <a class="btn btn-link text-decoration-none bg-success bg-light " href="<?=site_url('/admin/pending-request?filter=solved')?>">Show Solved Request</a>
                    <div class="table-responsive">
                      <?php if($response->errors==false):?>
                      <table id="callbackTable" class="table display">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($response->msg as $item):?>
                          <tr>
                            <td>
                             <?=$item->customer_name?>
                            </td>
                            <td><?=$item->mobile?></td>
                            <td><?=$item->email?></td>
                            <td><?=date('j M Y',strtotime($item->created_at->date))?></td>
                            <td>
                              <?=form_open('/admin/update-request/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button  onclick="return confirm('Are you Sure?')" class="btn <?=($item->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item->status=="1")?"pending":"Solved"?>
                              </button>
                          </form>
                            </td>
                          </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                      <?php else:?>
                        <h6>No pending call Request</h6>
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
                          <a class="nav-link active text-light" href="<?=site_url('/admin/pending-request?page='.$previous )?>">Previous</a>
                        </li>
                        <?php endif?>
                        <?php for($i=1;$i<=$page;$i++):?>
                        <li class="nav-item">
                          <a  class="nav-link text-light<?=($current==$i)?"bg-primary":""?>" href="<?=site_url('/admin/pending-request?page='.$i)?>"><?=$i?></a>
                        </li>
                      <?php endfor?>
                       <?php if((int)$current<(int)$page):?>
                        <li class="page-item">
                        <?php
                          $current=(int)$current+1;
                          ?>
                          <a class="nav-link text-light" href="<?=site_url('/admin/pending-request?page='.$current )?>">Next</a>
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
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>