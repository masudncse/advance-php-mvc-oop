<?php view('partials.head') ?>

<div class="container">
    <header class="row mt-3 mb-3">
        <div class="col-md-6">
            <h3>
                <a href="<?= route('/') ?>">Posts</a>
                - <a href="<?= route('posts.show', ['post' => $post->id]) ?>">
                    <?= $post->title ?>
                </a>
                - Edit
            </h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= route('/') ?>" class="btn btn-success">All</a>
        </div>
    </header>
</div>

<hr>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= route('posts.update', ['post' => $post->id]) ?>">
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" class="form-control" id="title"
                                   name="title" value="<?= $post->title ?>" placeholder="Title ...">
                        </div>
                        <div class="form-group">
                            <label for="body">Body: </label>
                            <textarea class="form-control" id="body"
                                      name="body" rows="3" placeholder="Body ..."><?= $post->body ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php view('partials.foot') ?>
