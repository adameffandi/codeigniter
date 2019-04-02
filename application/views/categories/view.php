<section id="category-section">
    <div class="row">
      <div class="col-sm-6 col-md-12 col-lg-10">
        <div class="view-category-name">
          <h1 class="page-title"><?= $title ?></h1>
        </div>
        <div class="view-edit-category-form">
          <?php echo form_open('/categories/edit/'.$categories['id']); ?>
            <div class="form-group row">
              <label for="category_name" class="form-label col-sm-12 col-md-2 col-lg-2">Category Name</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <input type="text" class="form-control" name="category_name" value="<?= $categories['category_name'] ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="float-right">
                  <button type="button" class="btn btn-warning cancelEdit">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="float-right">
          <?php echo form_open('/categories/delete/'.$categories['id'], 'id="deleteForm"'); ?>
            <button type="submit" class="btn btn-danger" id="deleteFormBtn">Delete</button>
          </form>
          <?php if (!$this->session->userdata('logged_in')): ?>
            <button type="button" name="Edit" class="btn btn-success" id="editCategoryButton" disabled>Edit Category</button>
          <?php else: ?>
            <button type="button" name="Edit" class="btn btn-success" id="editCategoryButton">Edit Category</button>
          <?php endif; ?>
        </div>
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

    <script type="text/javascript">
      $(document).ready(function(){
        $('.view-category-name').show();
        $('.view-edit-category-form').hide();
        $(".cancelEdit").hide();
        $('#deleteFormBtn').hide();

        $("#editCategoryButton").click(function(){
          $('#editCategoryButton').hide();
          $('.view-category-name').hide();
          $('.view-edit-category-form').fadeIn();
          $('.cancelEdit').fadeIn();
          $('#deleteFormBtn').show();
        });

        $(".cancelEdit").click(function(){
          $('#editCategoryButton').fadeIn();
          $('.view-category-name').fadeIn();
          $('.view-edit-category-form').hide();
          $('#deleteFormBtn').hide();
        });
      });
    </script>
</section>
