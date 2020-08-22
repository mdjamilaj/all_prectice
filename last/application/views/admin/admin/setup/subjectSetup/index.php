<!-- Page content -->
<div class="container-fluid">
    <div class="row">
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
                  <h3 class="mb-0">Subject List</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                    <!-- Search form -->
                    <form class="mr-sm-3" id="navbar-search-main1" action="<?php echo base_url(); ?>admin/subjectSetup/index" method="post">
                        <div class="form-group mb-0 bg-gray">
                        <div class="input-group input-group-alternative input-group-merge  bg-gray">
                            <!-- <select name="type" id="">
                                <option value="group_name">Group</option>
                                <option value="class_name">Class</option>
                                <option value="subject_name">Subject</option>
                            </select> -->
                            <div class="input-group-prepend bg-gray">
                            <span class="input-group-text bg-gray"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control bg-gray text-light" placeholder="Search with Type name" type="text" name="name">
                            <input class="btn btn-sm btn-primary" placeholder="Search with E-mail" type="submit" value="Search">
                        </div>
                        </div>
                    </form>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url(); ?>admin/subjectSetup/create" class="btn btn-sm btn-primary">Create New</a>
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
                        <th scope="col">Group</th>
                        <th scope="col">Class</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->subject_id; ?></th>
                                <td><?php echo $value->group_name; ?></td>
                                <td><?php echo $value->class_name; ?></td>
                                <td><?php echo $value->subject_name; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/subjectSetup/edit/<?php echo $value->subject_id;  ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url(); ?>admin/subjectSetup/delete/<?php echo $value->subject_id;  ?>" class="btn btn-sm btn-danger">Delete</a>
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