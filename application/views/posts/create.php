<section id="post-section">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title"><?= $title ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">

        <?php echo validation_errors(); ?>

        <!-- <form> -->
        <?php echo form_open_multipart('posts/create'); ?>
          <div class="form-group row">
            <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Title</label>
            <div class="col-sm-12 col-md-10 col-lg-10">
              <input type="text" class="form-control" name="title">
            </div>
          </div>
          <div class="form-group row">
            <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Category</label>
            <div class="col-sm-12 col-md-10 col-lg-10">
              <select class="form-control" name="category">
                <?php foreach ($categories as $key => $category): ?>
                  <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="content" class="form-label col-sm-12 col-md-2 col-lg-2">Content</label>
            <div class="col-sm-12 col-md-10 col-lg-10">
              <textarea name="content" class="form-control" rows="5" cols="100"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="postimage" class="form-label col-sm-12 col-md-2 col-lg-2">Image</label>
            <div class="col-sm-12 col-md-10 col-lg-10">
              <input type="file" name="postimage" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="float-right">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

</section>
