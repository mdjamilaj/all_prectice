<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Subject Edit</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/subjectSetup/update" method="POST">
          <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Group</label>
                            <select name="group" id="group" class="form-control" required>
                              <?php foreach ($group_list as $key => $value) { ?>
                                <option <?php if($value->group_id == $userData->group_id){echo "selected";} ?> value="<?php echo $value->group_id ?>"> <?php echo $value->group_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Class</label>
                            <select name="class" id="class" class="form-control" required>
                              <?php foreach ($class_list as $key => $value) { ?>
                                <option <?php if($value->class_id == $userData->class_id){echo "selected";} ?> value="<?php echo $value->class_id ?>"> <?php echo $value->class_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" value="<?php echo $userData->subject_name; ?>" name="name" placeholder="Enter Name" class="form-control" required>
                              <input type="hidden" name="id" value="<?php echo $userData->subject_id; ?>">
                          </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
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


<script>
  $('#group').on('change', function() {
    var id = $('#group').val();
    $.ajax({
      url: "<?php echo base_url(); ?>admin/common/ajaxGroupIdToClass",
      type: "POST",
      data: {
        id: id
      },
      cache: false,
      success: function(data) {
        console.log(data);
        var string = '';
        if(data.trim()=='[]'){
          string += '<option value="">Select Once</option>';
          swal("Subject Empty!", "This group not subject available!", "error")
        }else{
          string += '<option value="">Select Once</option>';
          $.each(JSON.parse(data), function(key, value) {
            string += '<option value="'+ value.class_id +'">'+ value.class_name +'</option>';
          });
        }
        $("#class").html(string);
      }
      })
  });
</script>