
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
                    <h4 class="card-title">Update Package Category</h4>
                    <p class="card-description"> Package Category Details</p>
                    <?=form_open_multipart("/admin/package-category-update/".$response->msg->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Category Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          
                          name="title"
                          value="<?=esc(old('title',$response->msg->title))?>"
                          required
                        />
                      </div>
                   
                    
                      <div class="form-group">
                        <label for="title">Meta Description </label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="meta_desc"
                          value="<?=esc(old('meta_desc',$response->msg->meta_desc))?>"
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
     

