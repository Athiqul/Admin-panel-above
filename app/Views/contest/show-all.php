
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
          <?php if($res->totalApplied):?>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?=$todayApplied?></h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span
                            class="mdi mdi-arrow-top-right icon-item"
                          ></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">
                     Today Applied
                    </h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?=$totalApplied?> </h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span
                            class="mdi mdi-arrow-top-right icon-item"
                          ></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">
                    <?=($type=='show')?'Total Applied':'Email Failed'?>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php endif?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contest Participant List</h4>
                     <?php if($res->errors==false):?>
                    <div class="table-responsive">
                      <table id="callbackTable" class="table display">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Institute</th>
                            <th>Contest</th>
                            <th>Mail Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($res->msg as $item):?>
                          <tr>
                            <td>
                              <a href="<?=site_url('/admin/candidate-details/').$item->id?>"  class="text-decoration-none text-light" > <?=$item->participant_name?></a>
                            </td>
                            <td><?=$item->mobile?></td>
                            <td><?=$item->email?></td>
                            <td><?=$item->institute?></td>
                            <td><?=($item->contest_type=='1')?'Front End':'UI/UX'?></td>
                            <td>
                              <a href="<?=site_url('/admin/email-sent/').$item->id?>" class="btn  <?=($item->mail_receive=='1')?'btn-outline-success':'btn-outline-danger'?>">
                              <?=($item->mail_receive=='1')?'Received':'Not Received'?>
                          </a>
                            </td>
                          </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                    </div>
                    <?php else:?>
                      <h6>No records found</h6>
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
                          <a class="nav-link active text-light" href="<?=site_url('/admin/contest-applicant?page='.$previous )?>">Previous</a>
                        </li>
                        <?php endif?>
                        <?php for($i=1;$i<=$page;$i++):?>
                        <li class="nav-item">
                          <a  class="nav-link text-light<?=($current==$i)?"bg-primary":""?>" href="<?=site_url('/admin/contest-applicant?page='.$i)?>"><?=$i?></a>
                        </li>
                      <?php endfor?>
                       <?php if((int)$current<(int)$page):?>
                        <li class="page-item">
                        <?php
                          $current=(int)$current+1;
                          ?>
                          <a class="nav-link text-light" href="<?=site_url('/admin/contest-applicant?page='.$current )?>">Next</a>
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
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>