
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
                    <h4 class="card-title">Update Package</h4>
                    <p class="card-description">Package Details</p>
                    <?=form_open_multipart("/admin/package-update/".$response->id,'class="forms-sample"')?>
                    
                      <div class="form-group">
                        <label for="title">package Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          
                          name="title"
                          value="<?=esc(old('title',$response->title))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="form-control bg-light" name="package_cat_id" required>
                         
                         <?php foreach($cat->msg as $item):?>
                          <option value="<?=$item->id?>" <?=$item->id==$response->package_cat_id?'selected':''?> ><?=$item->title?></option>
                          <?php endforeach?>
                        </select>
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
     

