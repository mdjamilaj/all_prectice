<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Class Edit</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/classSetup/update" method="POST">
          <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Group</label>
                            <select name="group" id="" class="form-control" required>
                              <?php foreach ($group_list as $key => $value) { ?>
                                <option <?php if($value->group_id == $userData->group_id){echo "selected";} ?> value="<?php echo $value->group_id ?>"> <?php echo $value->group_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input value="<?php echo $userData->class_name; ?>" type="text" name="name" placeholder="Enter Name" class="form-control" required>
                              <input type="hidden" name="id" value="<?php echo $userData->class_id; ?>">
                          </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="opacity-none">sad</label>
                            <input type="submit" value="Update"  class="form-control btn btn-primary">
                        </div>
                    </div>
                </div>
          </form>
        </div>
    </div>
</div>