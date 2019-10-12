    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-12">

                <?= form_error('name_kategori', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="<?= base_url('article/kategori'); ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newkategoriModal">Add New kategori</a>

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Kategori</th>
                                        <th scope="col">Slug Kategori</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Kategori</th>
                                        <th scope="col">Slug Kategori</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kategori as $ka) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $ka['name_kategori']; ?></td>
                                            <td><?= $ka['slug_kategori']; ?></td>
                                            <td><?= $ka['urutan']; ?></td>
                                            <td><?= $ka['date']; ?></td>
                                            <td>
                                                <a class="badge badge-success" href="<?= base_url('article/editKategori/') . $ka['id_kategori']; ?>">Edit</a>
                                                <a class="badge badge-danger" href="<?= base_url('article/deleteKategori/') . $ka['id_kategori']; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
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
    <div class="modal fade" id="newkategoriModal" tabindex="-1" role="dialog" aria-labelledby="newkategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newkategoriModalLabel">Add New kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('article/kategori'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name_kategori" name="name_kategori" placeholder="Name kategori">
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