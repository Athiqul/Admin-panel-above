<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Admin Panel|Above IT<?= $this->endSection() ?>
<?= $this->section('custom-css') ?>
<script src="https://cdn.tiny.cloud/1/b69tdpiu66ovx82jjhzsf0eooi7hehgia7avmhbdiy1s6rx4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<?= $this->endSection() ?>
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
                    <h4 class="card-title">Service Update</h4>
                    <p class="card-description">Service Details</p>
                    <?=form_open_multipart('/admin/update-service/'.$service->msg->id)?>
                      <div class="form-group">
                        <label for="title">Service Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="title"
                          value="<?= trim(esc(old('title',$service->msg->title)))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="desc">Service Description</label>
                        <textarea
                          rows="5"
                          class="form-control bg-light"
                          id="desc"
                         
                          name="desc"
                          value="<?= trim(esc(old('desc',$service->msg->desc)))?>"
                          required
                        ><?= old('desc',$service->msg->desc)?>
                    </textarea>
                      </div>
                     
                      <p class="card-description">Meta Information</p>
                      <div class="form-group">
                        <label for="meta-tag">Meta Tags</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="meta-tag"
                         
                          name="meta_tag"
                          value="<?=trim( esc(old('meta_tag',$service->msg->meta_tag)))?>"
                          required
                        />

                      </div>
                      <div class="form-group">
                        <label for="meta_desc">Meta Description</label>
                        <textarea
                          rows="5"
                          class="form-control bg-light"
                          id="meta_desc"
                         
                          name="meta_desc"
                          
                          required
                        ><?=trim(esc(old('meta_tag',$service->msg->meta_tag)))?>
                    </textarea>
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

        <?= $this->section('custom-js') ?>
        <script>
  tinymce.init({
    selector: '#desc',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>
        <?= $this->endSection() ?>
    