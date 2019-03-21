<section id="post-single-section">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title"><?php echo $post['title']; ?></h1>
      </div>
    </div> <!-- end row -->
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <?php if (!empty($post['post_image'])): ?>
          <img src="<?php echo site_url(); ?>public/img/<?php echo $post['post_image']; ?>" alt="" class="img-responsive blog-img">
        <?php else: ?>
          <img src="<?php echo site_url(); ?>public/img/placeholder.jpg ?>" alt="" class="img-responsive blog-preview-img">
        <?php endif; ?>
      </div>
    </div> <!-- end row -->
    <div class="row">
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
          <?php echo form_open_multipart('/posts/edit/'.$post['id']); ?>
            <div class="form-group row">
              <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Title</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <input type="text" class="form-control" name="title" required value="<?php echo $post['title'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Category</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <select class="form-control" name="category">
                  <optgroup label="Currently selected">
                    <option value="<?= $post['category_id'] ?>">
                      <?php foreach ($categories as $key => $category): ?>
                        <?php if ($category['id'] == $post['category_id']): ?>
                          <?= $category['category_name']; ?>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </option>
                  </optgroup>
                  <optgroup label="Options">
                    <?php foreach ($categories as $key => $category): ?>
                      <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="content" class="form-label col-sm-12 col-md-2 col-lg-2">Content</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <textarea name="content" class="form-control" rows="5" cols="100" required><?php echo $post['content'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="postimage" class="form-label col-sm-12 col-md-2 col-lg-2">Image</label>
              <div class="col-sm-12 col-md-10 col-lg-10">
                <input type="file" name="editpostimage" class="form-control">
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
    </div> <!-- end row -->

    <div class="row comments-section">
      <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <h2>Comments</h2>
            <br>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">

            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" id="view-comment-link" aria-controls="comments" role="tab">Comments</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" id="add-comment-link" aria-controls="addcomment" role="tab">Add Comment</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane active" id="comments" role="tabpanel">
                <br>
                <?php if (!empty($comments)): ?>
                  <?php foreach ($comments as $key => $comment): ?>
                      <h3><b><?php echo $comment['comment_title']; ?></b></h3>
                      <p style="padding: 0px; margin: 0px;"> <small> <?php echo $comment['created_at']; ?> </small> </p>
                      <p><?php echo $comment['comment_content']; ?></p>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p> Be the first to comment! </p>
                <?php endif; ?>

              </div><!-- end tab panel -->
              <div class="tab-pane" id="addcomment" role="tabpanel">
                <br>
                <?php echo form_open('/comments/create/'.$post['id']); ?>
                  <div class="form-group row">
                    <label for="title" class="form-label col-sm-12 col-md-2 col-lg-2">Title</label>
                    <div class="col-sm-12 col-md-10 col-lg-10">
                      <input type="text" class="form-control" name="title" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="content" class="form-label col-sm-12 col-md-2 col-lg-2">Comment</label>
                    <div class="col-sm-12 col-md-10 col-lg-10">
                      <textarea name="content" class="form-control" rows="5" cols="100" required></textarea>
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
              </div> <!-- end tab panel -->
            </div> <!-- end tab content -->

          </div>
        </div> <!-- end row, form comment -->

      </div>
    </div> <!-- end row, comment section -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#view-post').show();
        $('#view-edit-form').hide();
        $("#cancelEdit").show();
        $('#deleteFormBtn').show();
        $('#comments').show();
        $('#addcomment').hide();

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

        $('#view-comment-link').click(function(){
          $('#comments').show();
          $('#addcomment').hide();
          $('#view-comment-link').addClass('active');
          $('#add-comment-link').removeClass('active');
        });

        $('#add-comment-link').click(function(){
          $('#comments').hide();
          $('#addcomment').show();
          $('#view-comment-link').removeClass('active');
          $('#add-comment-link').addClass('active');
        });
      });
    </script>
</section>
