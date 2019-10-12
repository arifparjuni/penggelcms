    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-12">

                <?= form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('image', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('deskription', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="<?= base_url('article/addPost'); ?>" class="btn btn-primary mb-3">Add New post</a>
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($post as $ps) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ps['title']; ?></td>
                                            <td><img src="<?= base_url('./assets/article/img/post/') . $ps['image']; ?>" width="100" alt=""></td>
                                            <td><?= $ps['status']; ?></td>
                                            <td><?= $ps['name_kategori']; ?></td>
                                            <td>
                                                <a class="badge badge-success" href="<?= base_url('article/editPost/') . $ps['id_post']; ?>">Edit</a>
                                                <a class="badge badge-danger" href="<?= base_url('article/deletePost/') . $ps['id_post']; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->