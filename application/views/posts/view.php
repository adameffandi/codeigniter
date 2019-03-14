<section id="post-single-section">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title"><?php echo $post['title']; ?></h1>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div id="view-post">
          <p class="text-info">
            <small>Date Posted: <?php echo $post['created_at']; ?></small>
          <br>
            <small>Author: <?php echo $post['created_by']; ?></small>
          </p>
          <p><?php echo $post['content']; ?></p>
        </div>
        <div id="view-edit-form">
          <?php echo form_open('/posts/edit/'.$post['id']); ?>
            <input type="hidden" name="slug" value="<?php $post['slug']; ?>">
            <div class="form-group row">
              <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Title</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <input type="text" class="form-control" name="title" required value="<?php echo $post['title'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="content" class="form-label col-sm-12 col-md-2 col-lg-2">Content</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <textarea name="content" class="form-control" rows="5" cols="100" required><?php echo $post['content'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="float-right">
                  <button type="button" class="btn btn-warning" id="cancelEdit">Cancel</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="button-section">
          <?php echo form_open('/posts/delete/'.$post['id'], 'id="deleteForm"'); ?>
            <button type="submit" name="submit" class="btn btn-danger" id="deleteFormBtn" >Delete Post</button>
          </form>
          <button type="button" name="edit" class="btn btn-info" id="editForm">Edit Post</button>
        </div>

      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#view-post').show();
        $('#view-edit-form').hide();
        $("#cancelEdit").show();
        $('#deleteFormBtn').show();

        $("#editForm").click(function(){
          $('#editForm').hide();
          $('#view-post').hide();
          $('#view-edit-form').fadeIn();
          $('#deleteFormBtn').hide();
        });

        $("#cancelEdit").click(function(){
          $('#editForm').fadeIn();
          $('#view-post').fadeIn();
          $('#view-edit-form').hide();
          $('#deleteFormBtn').fadeIn();
        });
      });
    </script>
</section>
