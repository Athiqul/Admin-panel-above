
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
                    <h4 class="card-title">Service Details</h4>
                    <div class="row">
                      <div class="col-12">
                        <img
                          class="img-fluid mb-4"
                          src="<?=site_url('/admin/service-image/'.$service->msg->image)?>"
                          alt="image"
                          srcset=""
                        />
                        <button
                          id="imgModalBtn"
                          class="btn btn-primary m-4"
                          type="button"
                        >
                          Change Image
                        </button>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Title</h4>
                        <p class="text-muted"><?=$service->msg->title?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Sub Title</h4>
                        <p class="text-muted"><?=$service->msg->sub_title??''?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Description</h4>
                        <p class="text-muted">
                         <?=$service->msg->desc?>
                        </p>
                      </div>
                      <p class="card-description my-4">Meta Details</p>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Meta Tags</h4>
                        <p class="text-muted"><?=$service->msg->meta_tag?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Meta Description</h4>
                        <p class="text-muted">
                          <?=$service->msg->meta_desc?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Created at</h4>
                        <p class="text-muted">
                          <?=date('j M Y',strtotime($service->msg->created_at->date))?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Updated at</h4>
                        <p class="text-muted">
                          <?=date('j M Y',strtotime($service->msg->updated_at->date))?>
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center mt-4">
                        <div class="form-group">
                          <a
                            class="btn btn-outline-primary"
                            href="<?=site_url('/admin/update-service/'.$service->msg->id)?>"
                            >Edit</a
                          >
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <!-- image Modal -->
              <div class="modal" id="imgModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Change Image
                    </h5>
                  </div>
                  <div class="modal-body">
                    <?=form_open_multipart('/admin/update-service-image/'.$service->msg->id)?>
                    <form class="forms-sample">
                      <div class="form-group">
                        <input type="hidden" name="image" value="<?=$service->msg->image?>">
                        <label>Image upload</label>
                        <input
                          type="file"
                          name="img"
                          class="file-upload-default"
                        />
                        <div class="input-group col-xs-12">
                          <input
                            type="text"
                            class="form-control file-upload-info bg-light"
                            disabled=""
                            placeholder="Upload Image"
                          />
                          <span class="input-group-append">
                            <button
                              class="file-upload-browse btn btn-primary"
                              type="button"
                            >
                              Upload
                            </button>
                          </span>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary me-2">
                        Submit
                      </button>
                      <button
                        type="button"
                        class="btn btn-secondary"
                        id="imgModalClose"
                      >
                        Close
                      </button>
                    </form>
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
    