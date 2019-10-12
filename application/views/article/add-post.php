    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?= form_open_multipart('article/addPost'); ?>
        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="title" id="title" name="title" class="form-control"
                        placeholder="Enter title">
                    <?= form_error('title','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="image">Upload</span>
                </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="image">Choose file Image</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option>Publish</option>
                        <option>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="id_kategori" id="id_kategori">
                        <?php foreach($kategori as $ka) : ?>
                        <option value="<?= $ka['id_kategori']; ?>"><?= $ka['name_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control tinymce" id="body"></textarea>
                <?= form_error('body','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <br>
        </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
