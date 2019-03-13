<section id="post-section">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-10">
        <h1 class="page-title"><?= $title ?></h1>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="float-right">
          <a href="<?php echo base_url('/posts/create'); ?>" class="btn btn-danger"> Create Post</a>
        </div>

      </div>

      <?php foreach ($posts as $key => $post): ?>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="post-item">
              <h3><?php echo $post['title']; ?></h3>
              <p class="text-info">
                <small>Date Posted: <?php echo $post['created_at']; ?></small>
              <br>
                <small>Author: <?php echo $post['created_by']; ?></small>
              </p>
              <p><?php echo substr($post['content'], 0, 350); ?></p>
              <a href="<?php echo base_url('/posts/'. $post['slug']); ?>" class="btn btn-info"> Read More</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
</section>
