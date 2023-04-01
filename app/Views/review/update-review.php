
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
                    <h4 class="card-title">Update Review</h4>
                    <p class="card-description">Review Details</p>
                    <?=form_open_multipart("/admin/update-review/".$review->msg->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          
                          name="customer_name"
                          value="<?=esc(old('customer_name',$review->msg->customer_name))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Company</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="company"
                          value="<?=esc(old('company',$review->msg->company))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Quotes</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="quote"
                          value="<?=esc(old('quote',$review->msg->quote))?>"
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
     

