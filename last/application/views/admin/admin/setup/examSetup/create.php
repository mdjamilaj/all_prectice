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
                  <h3 class="mb-0">Exam Setup Create</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                </div>
              </div>
            </div>
          </div>
          <form action="<?php echo base_url(); ?>admin/examSetup/store" method="post">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="exam_start_datetime">Start Date Time</label>
                              <div class="flatpickr form__group field" id="startDate"  class="form__field">
                                  <input data-input required  type="text" name="exam_start_datetime" id="exam_start_datetime" autocomplete="off" placeholder="Select Start Date Time" class="form-control"> <!-- input is mandatory -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="exam_end_datetime">End Date Time</label>
                              <div class="flatpickr form__group field" id="endDate"  class="form__field">
                                  <input data-input required  type="text" name="exam_end_datetime" id="exam_end_datetime" autocomplete="off" placeholder="Select End Date Time" class="form-control"> <!-- input is mandatory -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="number_of_question">Number of MCQ</label>
                            <input type="number" name="number_of_question" id="number_of_question" placeholder="Enter number od question" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="total_time">Total Times <sub>(munites)</sub></label>
                            <input type="number" name="total_time" id="total_time" placeholder="Enter total time" class="form-control" required>
                        </div>
                    </div>
                  </div>    
                  <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="question_marks">Question Marks</label>
                              <select type="text" name="question_marks" id="question_marks" placeholder="Enter question marks" class="form-control" required>
                                <option value="0">Singel</option>
                                <option value="1">Multiple</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="question_paper_type">Question Paper Type</label>
                              <select type="text" name="question_paper_type" id="question_paper_type" placeholder="Enter question paper type" class="form-control" required>
                                <option value="0">Singel Question</option>
                                <option value="1">All Question</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="total_marks">Total Marks</label>
                              <input type="number" name="total_marks" id="total_marks" placeholder="Enter total marks" class="form-control" required>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="negative_marks">Negative Marks <sub>(Singel Question)</sub></label>
                                <input type="number" name="negative_marks" id="negative_marks" placeholder="Enter negative marks" class="form-control" required value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label for="title">Title</label>
                              <textarea class="form-control" id="title" name="title" rows="4"></textarea>
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Group</label>
                            <select name="group" id="group" class="form-control" required>
                              <?php foreach ($group_list as $key => $value) { ?>
                                <option value="<?php echo $value->group_id ?>"> <?php echo $value->group_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" id="class" class="form-control" required>
                              <?php foreach ($class_list as $key => $value) { ?>
                                <option value="<?php echo $value->class_id ?>"> <?php echo $value->class_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select name="subject" id="subject" class="form-control" required>
                              <?php foreach ($subject_list as $key => $value) { ?>
                                <option value="<?php echo $value->subject_id ?>"> <?php echo $value->subject_name ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
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
</script>