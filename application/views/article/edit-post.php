    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= form_open_multipart(); ?>
        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
        <input type="hidden" name="id_post" value="<?= $post['id_post']; ?>">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="title" id="title" name="title" class="form-control" placeholder="Enter title" value="<?= $post['title']; ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">Image</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('./assets/article/img/post/') . $post['image']; ?>" class="img-thumbnail">
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
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="publish">Publish</option>
                        <option value="Draft" <?php if ($post['status'] == 'Draft') {
                                                    echo "selected";
                                                } ?>>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Wilayah</label>
                    <select class="form-control" name="id_kategori" id="id_kategori">
                        <?php foreach ($kategori as $ka) : ?>
                            <option value="<?= $ka['id_kategori']; ?>" <?php if ($post['id_kategori'] == $ka['id_kategori']) {
                                                                                echo "selected";
                                                                            } ?>>
                                <?= $ka['name_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control tinymce" name="body" id="body" cols="150" rows="13"><?= $post['body']; ?></textarea>
                <?= form_error('body', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->