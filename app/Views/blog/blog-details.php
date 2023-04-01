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
                    <h4 class="card-title">Blog Details</h4>
                    <div class="row">
                        <div class="col-12">
                            <img class="img-fluid mb-4" src="<?= site_url('/admin/blog-image/' . $response->msg->blog->image) ?>" alt="image" srcset="" />
                            <?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
                            <button id="imgModalBtn" class="btn btn-primary m-4" type="button">
                                Change Image
                            </button>
                            <?php endif?>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Blog Title</h4>
                            <p class="text-light"><?= $response->msg->blog->title ?></p>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <h4>Description</h4>
                            <p class="text-light">
                                <?= $response->msg->blog->desc ?>
                            </p>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Meta Tags</h4>
                            <p class="text-light">
                                <?= $response->msg->blog->meta_tag ?>
                            </p>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <h4>Meta Description</h4>
                            <p class="text-light">
                                <?= $response->msg->blog->meta_desc ?>
                            </p>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <h4>Publish Date</h4>
                            <p class="text-light">
                                <?= date('j M Y',strtotime($response->msg->blog->publish_at))  ?>
                            </p>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Status</h4>
                            <p class="text-light">
                                <?= ($response->msg->blog->status == 1) ? "Activated" : "Deactive" ?>
                            </p>
                        </div>

                        <p class="card-description my-4">Category List</p>
                        <div class="col-lg-6 col-sm-12">
                            <h4>Category Names</h4>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category Title</th>
                                            <?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
                                            <th>Remove</th>
                                            <?php endif?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($response->msg->categories as $item) : ?>
                                            <tr>
                                                <td>
                                                    <a class="text-light text-decoration-none" href="<?= site_url('/admin/blog-category-details/' . $item->id) ?>"><?= $item->cat_name ?></a>
                                                </td>
                                                <?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
                                                <td>
                                                    <?= form_open('/admin/blog-category-remove/' . $response->msg->blog->id) ?>
                                                    <input type="hidden" name="cat_id[]" value="<?=$item->id?>">
                                                    <button type="submit" onclick="return confirm('Are you Sure to delete this Category?')" class="btn btn-danger btn-icon-text">
                                                        <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                        Delete
                                                    </button>
                                                    </form>

                                                </td>
                                                <?php endif?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                   
                                </table>
                            </div>

                        </div>
                        <?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
                        <p class="mt-5">Add Category</p>
                        <?=form_open('/admin/blog-add-category/'.$response->msg->blog->id)?>
                        <div class="form-group">
                                            <label>Select Blog Categories</label>
                                            <select class="js-example-basic-multiple" multiple="multiple" style="width: 100%" name="cat_id[]" required>
                                                <option value="">Choose Category</option>
                                                <?php foreach ($response->msg->noselectcat as $item) : ?>
                                                    <option value="<?= $item->id ?>"><?= $item->cat_name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">
                       Add Category
                      </button>
                                                </form>
                                                <?php endif?>

                    </div>
                    <?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
                    <div class="row">
                        <div class="col-4 text-center mt-4">
                            <div class="form-group">
                                <a  class="btn btn-outline-primary" href="<?= site_url('/admin/blog-update/' . $response->msg->blog->id) ?>">Edit</a>

                            </div>
                        </div>

                        <div class="col-4 text-center mt-4">
                            <?= form_open('/admin/blog-update/' . $response->msg->blog->id) ?>
                            <input type="hidden" name="status" value="<?= ($response->msg->blog->status == 1) ? "0" : "1" ?>">
                            <button  onclick="return confirm('Are you Sure?')" class="btn <?= ($response->msg->blog->status == "1") ? "btn-outline-danger" : "btn-outline-success" ?> " type="sub
                              ">
                                <?= ($response->msg->blog->status == "1") ? "Hidden" : "Activate" ?>
                            </button>
                            </form>
                        </div>
                    </div>
                    <?php  endif?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- image Modal -->
<?php if($response->msg->blog->user_id==session()->get('user_id') || session()->get('role')=='0'):?>
<div class="modal" id="imgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Change Image
                </h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('/admin/update-blog-image/' . $response->msg->blog->id) ?>

                <div class="form-group">
                    <input type="hidden" name="image" value="<?= $response->msg->blog->image ?>">
                    <label>Image upload</label>
                    <input type="file" name="img" class="file-upload-default" />
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info bg-light" disabled="" placeholder="Upload Image" />
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">
                                Upload
                            </button>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">
                    Submit
                </button>
                <button type="button" class="btn btn-secondary" id="imgModalClose">
                    Close
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif?>
<!-- Modal end -->

<!-- content-wrapper ends -->

<?= $this->endSection() ?>
<?= $this->section('footer') ?>
<?= $this->include('assets/footer') ?>
<?= $this->endSection() ?>