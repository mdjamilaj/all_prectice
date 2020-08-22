<!-- flatpickr  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flatpickr.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dark.css" type="text/css">
<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Question Paper Setup</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url(); ?>admin/questionSetup/create" target="blank" class="btn btn-sm btn-primary">Create New Question</a>
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/questionSetup/store" method="post">
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12 col-14 mb-5">
                        <label for="exam">Exam</label>
                        <select name="exam" id="exam" class="form-control" required>
                          <?php foreach ($exam_list as $key => $value) { ?>
                            <option value="<?php echo $value->exam_setup_id; ?>"> <?php echo $value->title; ?> </option>
                          <?php } ?>
                        </select>
                  </div>
                  <div id="ajaxValue" class="col-lg-4 col-md-6 col-sm-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                        <label for="exam">Qustion</label>
                        <select name="exam" id="exam" class="form-control" required>
                          <?php foreach ($question_list as $key => $value) { ?>
                            <option value="<?php echo $value->question_setup_id; ?>"> <?php echo $value->title; ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 col-14 mb-5">
                      <div class="form-group mt-l">
                          <input type="submit" value="Create"  class="form-control btn btn-primary">
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
          swal("Subject Empty!", "This group not class available!", "error")
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


<script>
  $('#class').on('change', function() {
    var id = $('#class').val();
    $.ajax({
      url: "<?php echo base_url(); ?>admin/common/ajaxClassIdToSubject",
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
            string += '<option value="'+ value.subject_id +'">'+ value.subject_name +'</option>';
          });
        }
        $("#subject").html(string);
      }
      })
  });
</script>

