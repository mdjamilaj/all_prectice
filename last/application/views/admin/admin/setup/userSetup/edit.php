<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Users Edit</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form>
              <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Activated</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->activated == 1){ echo "Selected";} ?> value="1">Active</option>
                                <option <?php if($userData->activated == 0){ echo "Selected";} ?> value="0">Not Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Banned</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->banned == 1){ echo "Selected";} ?> value="1">Banned</option>
                                <option <?php if($userData->banned == 0){ echo "Selected";} ?> value="0">Not Banned</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Admin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->type == 1){ echo "Selected";} ?> value="1">Admin</option>
                                <option <?php if($userData->type == 2){ echo "Selected";} ?> value="2">Teacher</option>
                                <option <?php if($userData->type == 3){ echo "Selected";} ?> value="3">Student</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Teacher</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->teacher == 1){ echo "Selected";} ?> value="1">Teacher</option>
                                <option <?php if($userData->teacher == 0){ echo "Selected";} ?> value="0">Not Teacher</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Student</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->student == 1){ echo "Selected";} ?> value="1">Student</option>
                                <option <?php if($userData->student == 0){ echo "Selected";} ?> value="0">Not Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Admin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="activated">
                                <option <?php if($userData->admin == 1){ echo "Selected";} ?> value="1">Admin</option>
                                <option <?php if($userData->admin == 0){ echo "Selected";} ?> value="0">Not Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
          </form>
        </div>
    </div>
</div>