    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?php echo form_open_multipart(); ?>
        <input type="hidden" name="id_about" value="<?= $about['id_about']; ?>">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter roel" value="<?= $about['title']; ?>">
                    <small class="form-text text-danger"><?= form_error('title'); ?></small>
                </div>
                <div class="form-group">
                    <label for="deskription">Deskription</label>
                    <textarea class="form-control" name="deskription" id="deskription" cols="30" rows="5"><?= $about['deskription']; ?></textarea>
                    <small class="form-text text-danger"><?= form_error('deskription'); ?></small>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Image</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('./assets/article/img/about/') . $about['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right" name="edit">Edit</button>
                <a href="<?= base_url('article/about'); ?>" class="btn btn-success float-left">Cancle</a>
            </div>
        </div>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->