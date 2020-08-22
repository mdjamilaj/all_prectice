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
              <form action="<?php echo base_url(); ?>admin/questionSetup/index" method="POST">
                  <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="id_number">ID Number</label>
                                <input type="number" name="id_number" id="id_number" placeholder="Enter number od question" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="create_datetime">Create Date Time</label>
                                <div class="flatpickr form__group field" id="createDate"  class="form__field">
                                    <input data-input  type="text" name="create_datetime" id="create_datetime" autocomplete="off" placeholder="Select Create Date Time" class="form-control"> <!-- input is mandatory -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
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
                                <label for="group">Group</label>
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
                  <h3 class="mb-0">Question Setup List</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url(); ?>admin/questionSetup/create" class="btn btn-sm btn-primary">Create New</a>
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
                        <th scope="col">Answer</th>
                        <th scope="col">Option-1</th>
                        <th scope="col">Option-1</th>
                        <th scope="col">Option-3</th>
                        <th scope="col">Option-4</th>
                        <th scope="col">Group</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Date of Creation</th>
                        <th scope="col">Date of modification</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->question_setup_id; ?></th>
                                <td><?php echo substr($value->title,0,80); ?></td>
                                <td><?php if($value->answer == 1){ echo "Option-1";}elseif($value->answer == 2){echo "Option-2";}elseif($value->answer == 3){echo "Option-3";}elseif($value->answer == 4){echo "Option-4";} ?></td>
                                <td><?php echo substr($value->option1,0,50); ?></td>
                                <td><?php echo substr($value->option2,0,50); ?></td>
                                <td><?php echo substr($value->option3,0,50); ?></td>
                                <td><?php echo substr($value->option4,0,50); ?></td>
                                <td><?php echo $value->group_name; ?></td>
                                <td><?php echo $value->class_name; ?></td>
                                <td><?php echo $value->subject_name; ?></td>
                                <td><?php echo $value->doc; ?></td>
                                <td><?php echo $value->dom; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/questionSetup/edit/<?php echo $value->question_setup_id;  ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url(); ?>admin/questionSetup/delete/<?php echo $value->question_setup_id;  ?>" class="btn btn-sm btn-danger">Delete</a>
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