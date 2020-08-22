<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Group Edit</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/groupSetup/update" method="POST">
              <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Group</label>
                            <input type="text" name="group_name" value="<?php echo $userData->group_name; ?>" class=" form-control" required>
                            <input type="hidden" name="id" value="<?php echo $userData->group_id; ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control mt-l" >
                        </div>
                    </div>
                </div>
          </form>
        </div>
    </div>
</div>