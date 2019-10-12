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


    <div class="container mt-4">
        <div class="row">
            <?php foreach($allPost as $po) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= base_url('assets/article/img/post/') . $po['image']; ?>" class="card-img-top" alt="<?= $po['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $po['title']; ?></h5>
                        <p class="card-text"><?= word_limiter($po['body'], 20); ?></p>
                        <a href="<?= base_url('home/detail/') . $po['slug_post']; ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
