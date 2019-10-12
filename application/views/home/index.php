
<!-- Header -->
<header class="bg-light py-4 mb-4">
<div class="container h-100">
    <div class="row h-100 align-items-center">
    <div class="col-md-8">
        <h1 class="display-4 text-dark mt-5 mb-2"><?= $admin['name_company']; ?></h1>
        <p class="lead mb-5 text-dark-50"><?= $admin['deskription']; ?></p>
            <form action="<?= base_url('home'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Search Keyword.." aria-label="Search Keyword.." aria-describedy="button" autocomplete="off">
                    <div class="input-group-append">
                        <input style="height: 40px; line-height: 10px;" class="btn btn-primary" type="submit" name="submit">
                    </div>
            </form>
        </div>
    </div>
</div>
</header>

<!-- Page Content -->
<div class="container">

    <!-- category -->
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Categories
                    </button>
                    <div class="dropdown-menu">
                        <?php foreach($allkategori as $ak) : ?>
                        <a class="dropdown-item" href="<?= base_url('home/kategori/') . $ak['id_kategori']; ?>"><?= $ak['name_kategori']; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end category -->

            <div class="row">
                <div class="col-lg">
                    <?php if (empty($post)) : ?>
                        <div class="alert alert-danger mb-5 pb-5 mt-5" role="alert">
                            data not found!
                        </div>
                    <?php endif; ?>
                    <div class="container mt-4">
                        <div class="row">
                            <?php foreach($post as $po) : ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="<?= base_url('assets/article/img/post/') . $po['image']; ?>" class="card-img-top" alt="<?= $po['title']; ?>">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $po['title']; ?></h4>
                                        <p class="card-text"><?= word_limiter($po['body'], 20); ?></p>
                                        <a href="<?= base_url('home/detail/') . $po['slug_post']; ?>" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </div>
            <!-- Pager -->
            <div class="clearfix">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
    </div>

    <!-- end card -->

</div>