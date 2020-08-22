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
                  <h3 class="mb-0">Question Setup Create</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/questionSetup/store" method="post">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label for="title">Title</label>
                              <textarea class="form-control" id="title" name="title" rows="3"><?php echo $userData->title; ?></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label for="option1">Option-1</label>
                              <textarea class="form-control" id="option1" name="option1" rows="3"><?php echo $userData->option1; ?></textarea>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label for="option2">Option-2</label>
                              <textarea class="form-control" id="option2" name="option2" rows="3"><?php echo $userData->option2; ?></textarea>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label for="option3">Option-3</label>
                              <textarea class="form-control" id="option3" name="option3" rows="3"><?php echo $userData->option3; ?></textarea>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label for="option4">Option-4</label>
                              <textarea class="form-control" id="option4" name="option4" rows="3"><?php echo $userData->option4; ?></textarea>
                          </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-14">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Group</label>
                            <select name="group" id="group" class="form-control" required>
                              <?php foreach ($group_list as $key => $value) { ?>
                                <option <?php if($value->group_id == $userData->group_id){echo "selected";} ?> value="<?php echo $value->group_id ?>"> <?php echo $value->group_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-14">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" id="class" class="form-control" required>
                              <?php foreach ($class_list as $key => $value) { ?>
                                <option <?php if($value->class_id == $userData->class_id){echo "selected";} ?> value="<?php echo $value->class_id ?>"> <?php echo $value->class_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 col-14">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select name="subject" id="subject" class="form-control" required>
                              <?php foreach ($subject_list as $key => $value) { ?>
                                <option <?php if($value->subject_id == $userData->subject_id){echo "selected";} ?> value="<?php echo $value->subject_id ?>"> <?php echo $value->subject_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 col-14 mb-5">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <select name="answer" id="answer" class="form-control" required>
                                <option <?php if($userData->answer == 1){echo "selected";} ?> value="1"> Option-1 </option>
                                <option <?php if($userData->answer == 2){echo "selected";} ?> value="2"> Option-2 </option>
                                <option <?php if($userData->answer == 3){echo "selected";} ?> value="3"> Option-3 </option>
                                <option <?php if($userData->answer == 4){echo "selected";} ?> value="4"> Option-4 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 col-14 mb-5">
                        <div class="form-group mt-l">
                          <input type="hidden" name="id" value="<?php echo $userData->answer; ?>">
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

  <!-- flatpickr JS -->
  <script src="<?php echo base_url(); ?>assets/js/flatpickr.js"></script>
<script>
    $("#startDate").flatpickr({
      enableTime: true,
      wrap: true,
      dateFormat: "Y-m-d H:i",
    });
    $("#endDate").flatpickr({
      enableTime: true,
      wrap: true,
      dateFormat: "Y-m-d H:i",
    });
</script>

<!-- CKEDITOR -->

<script>
  var editor = CKEDITOR.replace('title');
  editor.on( 'required', function( evt ) {
      editor.showNotification( 'This field is required.', 'warning' );
      evt.cancel();
  });

  var option1 = CKEDITOR.replace('option1');
  option1.on( 'required', function( evt ) {
      option1.showNotification( 'This field is required.', 'warning' );
      evt.cancel();
  });
  var option2 = CKEDITOR.replace('option2');
  option2.on( 'required', function( evt ) {
      option2.showNotification( 'This field is required.', 'warning' );
      evt.cancel();
  });
  var option3 = CKEDITOR.replace('option3');
  option3.on( 'required', function( evt ) {
      option3.showNotification( 'This field is required.', 'warning' );
      evt.cancel();
  });
  var option4 = CKEDITOR.replace('option4');
  option4.on( 'required', function( evt ) {
      option4.showNotification( 'This field is required.', 'warning' );
      evt.cancel();
  });
</script>