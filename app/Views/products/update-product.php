
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
                    <h4 class="card-title">Update Product</h4>
                    <p class="card-description">Product Details</p>
                    <?=form_open_multipart("/admin/update-product/".$response->msg->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Title</label>
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
                        <label for="title">Brand</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="brand"
                          value="<?=esc(old('brand',$response->msg->brand))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Description </label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="desc"
                          value="<?=esc(old('desc',$response->msg->desc))?>"
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
                      <div class="form-group">
                        <label for="title">Meta Tags </label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="meta_tag"
                          value="<?=esc(old('meta_tag',$response->msg->meta_tag))?>"
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
     

