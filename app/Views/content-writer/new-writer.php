
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
                    <h4 class="card-title">New Content Writer Member</h4>
                    <p class="card-description">Member Details</p>
                   
                      <?=form_open('/admin/add-content-writer',"class='forms-sample'")?>
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          name="user_name"
                          value="<?=esc(old('user_name'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Moblie</label>
                        <input
                          type="tel"
                          class="form-control bg-light"
                          id="title"
                          name="mobile"
                          pattern="017+[0-9]{8}|018+[0-9]{8}|013+[0-9]{8}|014+[0-9]{8}|019+[0-9]{8}|015+[0-9]{8}|016+[0-9]{8}"
                          value="<?=old('mobile')?>"
                         required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Email</label>
                        <input
                          type="email"
                          class="form-control bg-light"
                          id="email"
                          name="email"
                          value="<?=esc(old('email'))?>"                          
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Password</label>
                        <input
                          type="password"
                          class="form-control bg-light"
                          id="password"
                          name="password"
                          value="<?=esc(old('password'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Confirm Password</label>
                        <input
                          type="password"
                          class="form-control bg-light"
                          id="password"
                          name="conpass"
                          value="<?=esc(old('conpass'))?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="title">Address</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          name="address"
                          value="<?=esc(old('address'))?>"
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
