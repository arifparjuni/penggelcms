    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-8">
            
                <?= form_error('name_jenis', '<div class="alert alert-danger" role="alert">','</div>'); ?>

                <?= $this->session->flashdata('message'); ?>

                <form action="" method="post">
                <input type="hidden" name="id_jenis" value="<?= $jenis['id_jenis']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_jenis" name="name_jenis" placeholder="Name Jenis" value="<?= $jenis['name_jenis']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan" value="<?= $jenis['urutan']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('article/jenis'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
                
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
