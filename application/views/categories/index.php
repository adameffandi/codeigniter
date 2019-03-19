<section id="category-section">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-10">
        <!-- <h1 class="page-title"><?= $title ?></h1> -->
        <h1 class="page-title"><?= $title ?></h1>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="float-right">
          <a href="<?php echo base_url('/categories/create'); ?>" class="btn btn-success"> Create Category</a>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($categories as $key => $category): ?>
        <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="category-box">
            <a href="<?php echo base_url('/categories/'. $category['id']); ?>">
              <div class="tint">
                <h3><?php echo $category['category_name']; ?></h3>
              </div>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    </div>
</section>
