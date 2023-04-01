
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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <?=form_open('/admin/package-add-category')?>
                      <div class="row">
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-4 col-form-label" for="title"
                                >Package Category Name:</label
                              >
                              <div class="col-sm-8">
                                <input class="form-control text-light" type="text" name="title" value="<?=esc(old('title'))?>" required/>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 col-form-label" for="title"
                                >Meta Description:</label
                              >
                              <div class="col-sm-8">
                                <input class="form-control text-light" type="text" name="meta_desc" value="<?=esc(old('meta_desc'))?>" required />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-12 text-center">
                                <button
                                  type="submit"
                                  onclick="return confirm('Are You Sure?')"
                                  class="btn btn-primary btn-md"
                                >
                                  Add New
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Package Category List</h4>
                    <?php if($response->errors==false):?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Category Title</th>
                            <th>Created at</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($response->msg as $item):?>
                          <tr>
                            <td>
                              <a class="text-light text-decoration-none" href="<?=site_url('/admin/package-category-details/'.$item->id)?>"
                                ><?=$item->title?></a
                              >
                            </td>

                            <td><?=date('j M Y',strtotime($item->created_at->date))?></td>
                            <td>
                            <?=form_open('/admin/package-category-update/'.$item->id)?>
                              <input type="hidden" name="status" value="<?=($item->status==1)?"0":"1"?>">
                              <button onclick="return confirm('Are you Sure?')" class="btn <?=($item->status=="1")?"btn-outline-danger":"btn-outline-success"?> " type="sub
                              ">
                                <?=($item->status=="1")?"Hidden":"Activate"?>
                              </button>
                          </form>
                            </td>
                        
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                    <?php else:?>
                      <h2 class="card-title"><?=$response->msg?></h4>
                    <?php endif?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>
          <!-- partial:partials/_footer.html -->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
