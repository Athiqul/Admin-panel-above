
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
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Team Member Update</h4>
                    <p class="card-description">Team Member Details</p>
                    <?=form_open_multipart("/admin/update-member/".$response->msg->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          
                          name="name"
                          value="<?=esc(old('name',$response->msg->name))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Designation</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="designation"
                          value="<?=esc(old('designation',$response->msg->designation))?>"
                          required
                        />
                      </div>
                    
                    
                      <button type="submit" class="btn btn-primary me-2">
                        Submit
                      </button>
                     
                    </form>
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
          <!-- partial:partials/_footer.html -->
     

