<section id="post-section">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">

          <div class="col-sm-6 col-md-8 col-lg-10">
            <h1 class="page-title"><?= $title ?></h1>
          </div>

          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" data-toggle="tab" id="user-login" aria-controls="login" role="tab">Login</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" data-toggle="tab" id="user-register" aria-controls="register" role="tab">Register</a>
            </li>
          </ul>

          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="login" role="tabpanel">
              <br>
              <?php echo form_open('/users/login'); ?>
                <div class="form-group row">
                  <label for="username" class="form-label col-sm-12 col-md-2 col-lg-2">Username</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="text" class="form-control" name="username" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="form-label col-sm-12 col-md-2 col-lg-2">Password</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="password" class="form-control" name="password" required>
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
            </div><!-- end tab panel -->
            <div class="tab-pane" id="register" role="tabpanel">
              <br>
              <?php echo form_open('/users/register'); ?>
                <div class="form-group row">
                  <label for="name" class="form-label col-sm-12 col-md-2 col-lg-2">Name</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="text" class="form-control" name="name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="form-label col-sm-12 col-md-2 col-lg-2">Username</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="text" class="form-control" name="username" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="form-label col-sm-12 col-md-2 col-lg-2">Email</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="email" class="form-control" name="email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="form-label col-sm-12 col-md-2 col-lg-2">Password</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="password" class="form-control" name="password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password2" class="form-label col-sm-12 col-md-2 col-lg-2">Confirm Password</label>
                  <div class="col-sm-12 col-md-10 col-lg-10">
                    <input type="password" class="form-control" name="password2" required>
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
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#login').show();
        $('#register').hide();

        $('#user-login').click(function(){
          $('#login').show();
          $('#register').hide();
          $('#user-login').addClass('active');
          $('#user-register').removeClass('active');
        });

        $('#user-register').click(function(){
          $('#login').hide();
          $('#register').show();
          $('#user-login').removeClass('active');
          $('#user-register').addClass('active');
        });
      });
    </script>
</section>
