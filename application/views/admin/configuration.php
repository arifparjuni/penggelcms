    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        
        <div class="card mb-3 col-lg-10 pl-5">
            <div class="row no-gutters">
                <div class="col-md-3 mt-3">
                    <h5>Logo :</h5>
                    <img src="<?= base_url('assets/article/img/logo/') . $configuration['logo']; ?>" class="card-img">
                </div>
                <div class="col-md-8 pl-3">
                    <div class="card-body">
                        <ul class="list-group"> 
                            <li class="list-group-item active">Configuration</li>
                            <li class="list-group-item"><b>Name Company : </b><?= $configuration['name_company']; ?></li>
                            <li class="list-group-item"><b>Email :</b> <?= $configuration['email']; ?></li>
                            <li class="list-group-item"><b>Phone : </b><?= $configuration['phone']; ?></li> 
                            <li class="list-group-item"><b>Address : </b><?= $configuration['address']; ?></li> 
                            <li class="list-group-item"><b>Website : </b><?= $configuration['website']; ?></li> 
                            <li class="list-group-item"><b>Deskription : </b><?= $configuration['deskription']; ?></li> 
                            <li class="list-group-item"><b>Facebook : </b><?= $configuration['facebook']; ?></li> 
                            <li class="list-group-item"><b>Instagram : </b><?= $configuration['instagram']; ?></li> 
                            <li class="list-group-item"><b>Twitter : </b><?= $configuration['twitter']; ?></li> 
                            <li class="list-group-item"><b>Update since : </b><small class="text-muted">Update since <?= date('d F Y', $configuration['time']); ?></small></li>
                            <li class="list-group-item"><a href="<?= base_url('admin/editConfiguration/') . $configuration['id_configuration']; ?>" class="btn btn-primary col-md-2 float-right">Edit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

