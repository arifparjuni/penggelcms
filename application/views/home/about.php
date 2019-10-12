<div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center"><?= $about['title']; ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
            <img src="<?= base_url('assets/article/img/about/') . $about['image']; ?>" class="img-fluid" alt="">
                <p><?= $about['deskription']; ?></p>
            </div>
        </div>
    </div>
