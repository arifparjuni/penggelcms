    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        <div class="col-lg mb-5">
        <div class="row">
            <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
            <?php echo form_open_multipart();?>
            <input type="hidden" name="id_configuration" value="<?= $configuration['id_configuration']; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name_company">Name Company</label>
                            <input type="name_company" class="form-control" name="name_company" id="name_company"
                                placeholder="Enter Name Company" value="<?= $configuration['name_company']; ?>">
                            <?= form_error('name_company','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter Email" value="<?= $configuration['email']; ?>">
                            <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                placeholder="Enter phone" value="<?= $configuration['phone']; ?>">
                            <?= form_error('phone','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="website">URL Your Website</label>
                            <input type="website" class="form-control" name="website" id="website"
                                placeholder="Enter URL website" value="<?= $configuration['website']; ?>">
                            <?= form_error('website','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="facebook">URL Facebook</label>
                            <input type="facebook" class="form-control" name="facebook" id="facebook"
                                placeholder="Enter URL facebook" value="<?= $configuration['facebook']; ?>">
                            <?= form_error('facebook','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="instagram">URL Instagram</label>
                            <input type="instagram" class="form-control" name="instagram" id="instagram"
                                placeholder="Enter URL instagram" value="<?= $configuration['instagram']; ?>">
                            <?= form_error('instagram','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-6" >
                        <div class="form-group">
                                <label for="twitter">URL Twitter</label>
                                <input type="twitter" class="form-control" name="twitter" id="twitter"
                                    placeholder="Enter URL twitter" value="<?= $configuration['twitter']; ?>">
                                <?= form_error('twitter','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">Logo</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/article/img/logo/') . $configuration['logo']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div>
                                            <input type="file" class="custom-file-input" id="logo" name="logo">
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                            <small>Image must extension gif/jpg/png & max size 2 mb.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" cols="3" rows="3" ><?= $configuration['address']; ?></textarea>
                            <?= form_error('address','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="deskription">Deskription</label>
                            <textarea name="deskription" class="form-control" id="deskription" cols="3" rows="3"><?= $configuration['deskription']; ?></textarea>
                            <?= form_error('deskription','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-5">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

