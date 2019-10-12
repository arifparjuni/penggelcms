    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-md-8">
        <form action="" method="post">
                <input type="hidden" name="id" value="<?= $subMenuById['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $subMenuById['title']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>" <?php if($subMenuById['menu_id'] == $m['id']) {echo "selected"; } ?>>
                                <?= $m['menu']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $subMenuById['url']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $subMenuById['icon']; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-secondary float-left">back</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
        </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

