
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
                    <h4 class="card-title">New Team Member Add</h4>
                    <p class="card-description">Provide Information about team member</p>
                    <?=form_open_multipart('/admin/add-member')?>
                    
                      <div class="form-group">
                        <label for="title">Team Member Name</label>
                        <input
                          type="text"
                          class="form-control text-light"
                          id="title"
                          name="name"
                          value="<?=esc(old('name'))?>"
                          required
                        />
                      </div>
                    
                      <div class="form-group">
                        <label for="title">Designation</label>
                        <input
                          type="text"
                          class="form-control text-light"
                          id="brand"
                         name="designation"
                         value="<?=esc(old('designation'))?>"
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
