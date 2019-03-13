<section id="post-single-section">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title"><?php echo $post['title']; ?></h1>
        <p class="text-info">
          <small>Date Posted: <?php echo $post['created_at']; ?></small>
        <br>
          <small>Author: <?php echo $post['created_by']; ?></small>
        </p>
        <p><?php echo $post['content']; ?></p>

      </div>

    </div>
</section>
