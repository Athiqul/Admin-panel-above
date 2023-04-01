
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
                    <h4 class="card-title">New Blog</h4>
                    <p class="card-description">Blog  Details</p>
                    <?=form_open_multipart('/admin/add-blog')?>
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                         name="title"
                         value="<?=esc(old('title'))?>"
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
                        >  <?=esc(old('desc'))?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Select Blog Categories</label>
                        <select
                          class="js-example-basic-multiple"
                          multiple="multiple"
                          style="width: 100%"
                          name="cat_id[]"
                          required
                        >
                          <option value="">Choose Category</option>
                          <?php foreach($response->msg as $item):?>
                            <option value="<?=$item->id?>"><?=$item->cat_name?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Image upload</label>
                        <input
                          type="file"
                          name="image"
                          class="file-upload-default bg-light"
                          required
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
                      <p class="card-description">Meta Information</p>
                      <div class="form-group">
                        <label for="meta-tag">Meta Tags</label>
                        <input
                          type="text"
                          class="form-control bg-light"
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
                          class="form-control bg-light"
                          id="desc"
                          name="meta_desc"
                          required
                        ><?=esc(old('meta_desc'))?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="desc">Publish Date</label>
                        <input type="date" class="form-control bg-light" name="date" value="<?=esc(old('date'))?>" required id="desc" />
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
 
    <!-- partial:partials/_footer.html -->
    <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
          <!-- partial:partials/_footer.html -->
     