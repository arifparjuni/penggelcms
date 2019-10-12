    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-12">

                <?= form_error('name_jenis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="<?= base_url('article/jenis'); ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newjenisModal">Add New Jenis</a>

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Jenis</th>
                                        <th scope="col">Slug Jenis</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Jenis</th>
                                        <th scope="col">Slug Jenis</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($jenis as $je) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $je['name_jenis']; ?></td>
                                            <td><?= $je['slug_jenis']; ?></td>
                                            <td><?= $je['urutan']; ?></td>
                                            <td><?= $je['date']; ?></td>
                                            <td>
                                                <a class="badge badge-success" href="<?= base_url('article/editJenis/') . $je['id_jenis']; ?>">Edit</a>
                                                <a class="badge badge-danger" href="<?= base_url('article/deleteJenis/') . $je['id_jenis']; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
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

    <!-- model add-->
    <div class="modal fade" id="newjenisModal" tabindex="-1" role="dialog" aria-labelledby="newjenisModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newjenisModalLabel">Add New Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('article/jenis'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name_jenis" name="name_jenis" placeholder="Name jenis">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>