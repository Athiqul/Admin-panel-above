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
                    <h4 class="card-title">Package Details</h4>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h4>Package Title</h4>
                            <p class="text-light"><?= $response->msg->package[0]->title ?></p>
                        </div>
                      
                        <div class="col-lg-12 col-sm-12">
                            <h4>Category</h4>
                            <p class="text-light">
                            <?= $response->msg->package[0]->category?>
                            </p>
                        </div>
                        
                        <div class="col-lg-6 col-sm-12">
                            <h4>Status</h4>
                            <p class="text-light">
                                <?= ($response->msg->package[0]->status == 1) ? "Activated" : "Deactive" ?>
                            </p>
                        </div>

                        <p class="card-description my-4">Service List</p>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Services</h4>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Remove</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($response->msg->services as $item) : ?>
                                            <tr>
                                                <td>
                                                   <?= $item->services ?></a>
                                                </td>

                                                <td>
                                                    <?= form_open('/admin/package-service-remove/' .$item->id) ?>
                                                    <input type="hidden" name="service_id[]" value="<?=$item->id?>">
                                                    <button type="submit" onclick="return confirm('Are you Sure to delete this Service?')" class="btn btn-danger btn-icon-text">
                                                        <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                        Delete
                                                    </button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <?= form_open('/admin/package-service-update/' .$item->id) ?>
                                                    <input type="hidden" name="status" value="<?=($item->status=='1')?'0':'1'?>">
                                                    <button type="submit" onclick="return confirm('Are you Sure ?')" class="btn <?=($item->status=='1')?'btn-danger':'btn-success'?> btn-icon-text">
                                                        <i class="mdi  btn-icon-prepend"></i>
                                                       <?=($item->status=='1')?'Inactive':'Active'?>
                                                    </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                   
                                </table>
                            </div>

                        </div>
                        <div class="mt-5"></div>
                       <?=form_open('/admin/package-add-service/'.$response->msg->package[0]->id)?>
                        <div class="form-group">
                        <label for="desc">Add More Services</label>
                        <div id="inputFormRow">
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control bg-light"
                              placeholder="Services"
                              name="services[]"
                            />
                            <div class="input-group-append">
                              <button
                                id="removeRow"
                                class="btn btn-danger"
                                style="height: -webkit-fill-available"
                              >
                                Remove
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">
                          Add Row
                        </button>
                      </div>
                      <button type="submit" onclick="return confirm('Do you want to add these services?')" class="btn btn-primary me-2">
                        Submit
                      </button>

                                        </form>

                    </div>
                    <div class="row mt-5">
                        <div class="col-4 text-center mt-4">
                            <div class="form-group">
                                <a class="btn btn-outline-primary" href="<?= site_url('/admin/package-update/' . $response->msg->package[0]->id) ?>">Edit</a>

                            </div>
                        </div>

                        <div class="col-4 text-center mt-4">
                            <?= form_open('/admin/blog-update/' . $response->msg->package[0]->id) ?>
                            <input type="hidden" name="status" value="<?= ($response->msg->package[0]->status == 1) ? "0" : "1" ?>">
                            <button onclick="return confirm('Are you Sure?')" class="btn <?= ($response->msg->package[0]->status == "1") ? "btn-outline-danger" : "btn-outline-success" ?> " type="sub
                              ">
                                <?= ($response->msg->package[0]->status == "1") ? "Hidden" : "Activate" ?>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal end -->

<!-- content-wrapper ends -->


<script type="text/javascript">
      // add row
      $("#addRow").click(function () {
        var html = "";
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html +=
          '<input type="text" name="services[]" class="form-control bg-light" placeholder="Services" />';
        html += '<div class="input-group-append">';
        html +=
          '<button id="removeRow" class="btn btn-danger" style="height: -webkit-fill-available">Remove</button>';
        html += "</div>";
        html += "</div>";

        $("#newRow").append(html);
      });

      // remove row
      $(document).on("click", "#removeRow", function () {
        $(this).closest("#inputFormRow").remove();
      });
    </script>

<?= $this->endSection() ?>
<?= $this->section('footer') ?>
<?= $this->include('assets/footer') ?>
<?= $this->endSection() ?>