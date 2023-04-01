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
                    <h4 class="card-title">Contestant Information</h4>
                    <div class="row">
                      <div class="col-lg-6 col-sm-12">
                        <h4>Name:</h4>
                        <p class="text-muted"><?=$res->msg->participant_name?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Mobile:</h4>
                        <p class="text-muted"><?=$res->msg->mobile?></p>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                        <h4>Email:</h4>
                        <p class="text-muted"><?=$res->msg->email?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Opinion:</h4>
                        <p class="text-muted"><?=$res->msg->participant_name?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Birth Year:</h4>
                        <p class="text-muted"><?=$res->msg->yob?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Institute:</h4>
                        <p class="text-muted"><?=$res->msg->institute?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Address:</h4>
                        <p class="text-muted"><?=$res->msg->address?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Refferal:</h4>
                        <p class="text-muted"><?=$res->msg->referrer?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Interest to work with us:</h4>
                        <p class="text-muted"><?=($res->msg->joining=='1')?'YES':'NO'?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Mail Status:</h4>
                        <p class="text-muted"><?=($res->msg->mail_receive=='1')?'YES':'NO'?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center mt-4">
                        <div class="form-group">
                          <a
                            class="btn btn-outline-primary"
                            href="../services/new-service.html"
                            >Edit</a
                          >
                          <a
                            class="btn btn-outline-secondary"
                            href="../services/services.html"
                            >close</a
                          >
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            id="modalBtn"
                          >
                            Delete
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="deleteModal" id="dltModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Delete Product
                    </h5>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button
                      type="button"
                      class="btn btn-secondary"
                      id="closeButton"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal end -->
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
