    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-8">
            
                <?= form_error('name_kategori', '<div class="alert alert-danger" role="alert">','</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <form action="" method="post">
                <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_kategori" name="name_kategori" placeholder="Name kategori" value="<?= $kategori['name_kategori']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan" value="<?= $kategori['urutan']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('article/kategori'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
                
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
