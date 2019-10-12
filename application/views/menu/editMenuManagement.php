    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $menu['id']; ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" class="form-control" id="menu"
                            placeholder="Enter roel" value="<?= $menu['menu']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="edit">Edit</button>
                    <a href="<?= base_url('menu'); ?>" class="btn btn-success float-left">Cancle</a>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

