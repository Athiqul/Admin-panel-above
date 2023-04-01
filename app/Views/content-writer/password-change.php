
<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>Admin Panel|Above IT<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<?= $this->include('assets/navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('topbar') ?>
<?= $this->include('assets/topbar') ?>
<?= $this->endSection() ?>

<?=$this->section('alert')?>
<?=$this->include('assets/alert')?>
<?= $this->endSection()?>
<?= $this->section('content') ?>
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?=$response->msg->info[0]->user_name?> Password Change</h4>
                    <p class="card-description">Member Details</p>
                   
                      <?=form_open('/admin/update-password/'.$response->msg->info[0]->id,"class='forms-sample'")?>
                     
                     
                    
                      <div class="form-group">
                        <label for="title">New Password</label>
                        <input
                          type="password"
                          class="form-control bg-light"
                          id="password"
                          name="password"
                          value="<?=esc(old('password'))?>"
                          required
                        />
                      </div>
                 
                      <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary me-2">
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
