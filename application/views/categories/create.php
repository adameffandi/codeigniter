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
        <?php echo form_open('categories/create'); ?>
          <div class="form-group row">
            <label for="category_name" class="form-label col-sm-12 col-md-2 col-lg-2">Category Name</label>
            <div class="col-sm-12 col-md-10 col-lg-10">
              <input type="text" class="form-control" name="category_name">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>

</section>
