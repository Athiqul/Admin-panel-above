
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
                    <h4 class="card-title">Update Blog</h4>
                    <p class="card-description">Blog Details</p>
                    <?=form_open_multipart("/admin/blog-update/".$response->msg->blog->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          
                          name="title"
                          value="<?=esc(old('title',$response->msg->blog->title))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="desc">Description:</label>
                        <textarea
                          rows="50"
                          cols="150"
                          class=" bg-light"
                          id="desc"
                          name="desc"
                          style="resize:both;"
                         
                          required
                        >  <?=esc(old('desc',$response->msg->blog->desc))?></textarea>
                      </div>
                    
                      <div class="form-group">
                        <label for="title">Meta Description </label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         
                          name="meta_desc"
                          value="<?=esc(old('meta_desc',$response->msg->blog->meta_desc))?>"
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
                          value="<?=esc(old('meta_tag',$response->msg->blog->meta_tag))?>"
                          required
                        />
                      </div>

                      <div class="form-group">
                        <label for="desc">Publish Date</label>
                        <input type="date" class="form-control bg-light" name="date" value="<?=esc(old('date',$response->msg->blog->publish_at))?>" required id="desc" />
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
     

