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
                    <h4 class="card-title">New Package</h4>
                    <p class="card-description">Package Details</p>
                  
                      <?=form_open('/admin/add-package',"class='forms-sample'")?>
                      <div class="form-group">
                        <label for="title">Package Title</label>
                        <input
                          type="text"
                          class="form-control bg-light"
                          id="title"
                          name="title"
                          value="<?=old('title')?>"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="form-control bg-light" name="package_cat_id" required>
                         
                         <?php foreach($response->msg as $item):?>
                          <option value="<?=$item->id?>"><?=$item->title?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="desc">List of Services</label>
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
        
    <!-- service Row js -->
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
    <!-- <script src="../../js/select2.min.js"></script> -->
    <?= $this->endSection() ?>
        <?= $this->section('footer') ?>
        <?= $this->include('assets/footer') ?>
        <?= $this->endSection() ?>