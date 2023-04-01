
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
                    <h4 class="card-title">New Review</h4>
                    <p class="card-description">Review Details</p>
                    <?=form_open_multipart("/admin/create-review",'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          placeholder="Customer Name"
                          name="customer_name"
                          value="<?=esc(old('customer_name'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Company</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          placeholder="Company"
                          name="company"
                          value="<?=esc(old('company'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Quotes</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          placeholder="Quotes"
                          name="quote"
                          value="<?=esc(old('quote'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label>Image upload</label>
                        <input
                          type="file"
                          name="image"
                          class="file-upload-default bg-light"
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
                      <button class="btn btn-dark">Cancel</button>
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
     

