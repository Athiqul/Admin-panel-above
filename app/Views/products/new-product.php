
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
                    <h4 class="card-title">New Product</h4>
                    <p class="card-description">Product Details</p>
                    <?=form_open_multipart('/admin/add-product')?>
                    
                      <div class="form-group">
                        <label for="title">Product Title</label>
                        <input
                          type="text"
                          class="form-control text-light"
                          id="title"
                          name="title"
                          value="<?=esc(old('title'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="desc">Product Description</label>
                        <textarea
                          rows="5"
                          class="form-control text-light"
                          id="desc"
                         name="desc"
                         value="<?=esc(old('desc'))?>"
                         required
                        ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="title">Product Brand</label>
                        <input
                          type="text"
                          class="form-control text-light"
                          id="brand"
                         name="brand"
                         value="<?=esc(old('brand'))?>"
                         required
                        />
                      </div>
                      <div class="form-group">
                        <label>Image upload</label>
                        <input
                          type="file"
                          name="image"
                          class="file-upload-default "
                          required
                        />
                        <div class="input-group col-xs-12">
                          <input
                            type="text"
                            class="form-control file-upload-info text-light"
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
                      <p class="card-description">Meta Information</p>
                      <div class="form-group">
                        <label for="meta-tag">Meta Tags</label>
                        <input
                          type="text"
                          class="form-control text-light"
                          id="meta-tag"
                         name="meta_tag"
                         value="<?=esc(old('meta_tag'))?>"
                         required
                        />
                      </div>
                      <div class="form-group">
                        <label for="desc">Meta Description</label>
                        <textarea
                          rows="5"
                          class="form-control text-light"
                          id="desc"
                         name="meta_desc"
                         value="<?=esc(old('title'))?>"
                         required
                        ></textarea>
                      </div>
                    
                      <button type="submit" class="btn btn-primary me-2">
                        Submit
                      </button>
                      <button class="btn btn-dark" type="reset">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between"
            >
              <span
                class="text-muted d-block text-center text-sm-left d-sm-inline-block"
                >Copyright ©Above IT - 2023</span
              >
            </div>
         
            <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
