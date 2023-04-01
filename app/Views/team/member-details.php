
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
                    <h4 class="card-title">Team Member Details</h4>
                    <div class="row">
                      <div class="col-12">
                        <img
                          class="img-fluid mb-4"
                          src="<?=site_url('/admin/member-image/'.$response->msg->image)?>"
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
                        <h4>Name</h4>
                        <p class="text-muted"><?=$response->msg->name?></p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Designation</h4>
                        <p class="text-muted">
                         <?=$response->msg->designation?>
                        </p>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <h4>Added date</h4>
                        <p class="text-muted">
                        <?=date('j M Y',strtotime($response->msg->created_at->date))?>
                        </p>
                      </div>
                   
                      <div class="col-lg-6 col-sm-12">
                        <h4>Status</h4>
                        <p class="text-muted">
                         <?=($response->msg->status==1)?"Activated":"Deactive"?>
                        </p>
                      </div>
                   
                    
                      
                    </div>
                    <div class="row">
                      <div class="col-4 text-center mt-4">
                        <div class="form-group">
                          <a
                            class="btn btn-outline-primary"
                            href="<?=site_url('/admin/update-member/'.$response->msg->id)?>"
                            >Edit</a
                          >
                          
                        </div>
                      </div>
           
<div class="col-4 text-center mt-4">
<?=form_open('/admin/update-member/'.$response->msg->id)?>
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
           <div class="modal" id="imgModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Change Image
                    </h5>
                  </div>
                  <div class="modal-body">
                    <?=form_open_multipart('/admin/update-member-image/'.$response->msg->id)?>
                    
                      <div class="form-group">
                        <input type="hidden" name="image" value="<?=$response->msg->image?>">
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
            <!-- Modal end -->
       
          <!-- content-wrapper ends -->
         
          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
    
msg->