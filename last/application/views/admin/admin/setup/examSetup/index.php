<!-- flatpickr  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flatpickr.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dark.css" type="text/css">
<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-3 bb-2">Search</h3>
                </div>
              </div>
              <form action="<?php echo base_url(); ?>admin/examSetup/index" method="POST">
                  <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exam_start_datetime">Start Date Time</label>
                                <div class="flatpickr form__group field" id="startDate"  class="form__field">
                                    <input data-input  type="text" name="exam_start_datetime" id="exam_start_datetime" autocomplete="off" placeholder="Select Start Date Time" class="form-control"> <!-- input is mandatory -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exam_end_datetime">End Date Time</label>
                                <div class="flatpickr form__group field" id="endDate"  class="form__field">
                                    <input data-input  type="text" name="exam_end_datetime" id="exam_end_datetime" autocomplete="off" placeholder="Select End Date Time" class="form-control"> <!-- input is mandatory -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="create_datetime">Create Date Time</label>
                                <div class="flatpickr form__group field" id="createDate"  class="form__field">
                                    <input data-input  type="text" name="create_datetime" id="create_datetime" autocomplete="off" placeholder="Select Create Date Time" class="form-control"> <!-- input is mandatory -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="update_datetime">Update Date Time</label>
                                <div class="flatpickr form__group field" id="updateDate"  class="form__field">
                                    <input data-input  type="text" name="update_datetime" id="update_datetime" autocomplete="off" placeholder="Select Update Date Time" class="form-control"> <!-- input is mandatory -->
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="id_number">ID Number</label>
                                <input type="number" name="id_number" id="id_number" placeholder="Enter number od question" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Group</label>
                                <select name="group" id="group" class="form-control" required>
                                <option value="">Select Once</option>
                                <?php foreach ($group_list as $key => $value) { ?>
                                    <option value="<?php echo $value->group_id ?>"> <?php echo $value->group_name ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="form-control">
                                    <option value="">Select Once</option>
                                    <?php foreach ($class_list as $key => $value) { ?>
                                        <option value="<?php echo $value->class_id ?>"> <?php echo $value->class_name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select name="subject" id="subject" class="form-control">
                                <option value="">Select Once</option>
                                <?php foreach ($subject_list as $key => $value) { ?>
                                    <option value="<?php echo $value->subject_id ?>"> <?php echo $value->subject_name ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group mt-l">
                                <input type="submit" value="Search"  class="form-control btn btn-primary">
                            </div>
                        </div>
                  </div>
              </form>
            </div>
        </div>
        </div>
        <div class="col-xl-12">
            <?php if($this->session->flashdata('msg')): ?>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-success">
                        <?php echo $this->session->flashdata('msg'); ?>
                </div>
            </div>
            <?php endif; ?>
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Exam Setup List</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url(); ?>admin/examSetup/create" class="btn btn-sm btn-primary">Create New</a>
                </div>
              </div>
            </div>
            <?php if(empty($data)){  ?>
                <div class="alert alert-danger">
                    Sorry No Information Found !!!
                </div>
            <?php }else{ ?>
                <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Group</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Exam start date time</th>
                        <th scope="col">Exam end date time</th>
                        <th scope="col">Number of question</th>
                        <th scope="col">Total time</th>
                        <th scope="col">Total marks</th>
                        <th scope="col">Question paper type</th>
                        <th scope="col">Question marks</th>
                        <th scope="col">Negative marks</th>
                        <th scope="col">Date of Creation</th>
                        <th scope="col">Date of modification</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->exam_setup_id; ?></th>
                                <td><?php echo substr($value->title,0,80); ?></td>
                                <td><?php echo $value->group_name; ?></td>
                                <td><?php echo $value->class_name; ?></td>
                                <td><?php echo $value->subject_name; ?></td>
                                <td><?php echo $value->exam_start_datetime; ?></td>
                                <td><?php echo $value->exam_end_datetime; ?></td>
                                <td><?php echo $value->number_of_question; ?></td>
                                <td><?php echo $value->total_time; ?></td>
                                <td><?php echo $value->total_marks; ?></td>
                                <td><?php if($value->question_paper_type == 0){ echo "Singel Question";}elseif($value->question_paper_type == 1){echo "All Question";} ?></td>
                                <td><?php if($value->question_marks == 0){ echo "Singel";}elseif($value->question_marks == 1){echo "Multiple";} ?></td>
                                <td><?php echo $value->negative_marks; ?></td>
                                <td><?php echo $value->doc; ?></td>
                                <td><?php echo $value->dom; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/examSetup/edit/<?php echo $value->exam_setup_id;  ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url(); ?>admin/examSetup/delete/<?php echo $value->exam_setup_id;  ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php  echo $this->pagination->create_links(); ?>
                </div>
            <?php } ?>
          </div>
        </div>
    </div>
</div>


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
    $("#createDate").flatpickr({
      enableTime: true,
      wrap: true,
      dateFormat: "Y-m-d H:i",
    });
    $("#updateDate").flatpickr({
      enableTime: true,
      wrap: true,
      dateFormat: "Y-m-d H:i",
    });
</script>