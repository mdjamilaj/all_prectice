<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Users List</h3>
                </div>
                <div class="text-right col-lg-6 col-md-8 col-sm-12">
                    <!-- Search form -->
                    <form class="mr-sm-3" id="navbar-search-main1" action="<?php echo base_url(); ?>admin/userSetup/index" method="post">
                        <div class="form-group mb-0 bg-gray">
                        <div class="input-group input-group-alternative input-group-merge  bg-gray">
                            <div class="input-group-prepend bg-gray">
                            <span class="input-group-text bg-gray"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="email" class="form-control bg-gray text-light" placeholder="Search with E-mail" type="text" name="email">
                            <input class="btn btn-sm btn-primary" placeholder="Search with E-mail" type="submit" value="Search">
                        </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <?php if(empty($users)){  ?>
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
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Group</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($users as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value->id; ?></th>
                                <td><?php echo $value->firstname; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php if($value->type ==1){echo "Admin";}elseif($value->type ==2){echo "Teacher";}elseif($value->type ==3){echo "Student";}else{echo "User";} ?></td>
                                <td><?php echo $value->group_value; ?></td>
                                <td><?php echo $value->subject; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/userSetup/edit/<?php echo $value->id;  ?>" class="btn btn-sm btn-primary">Edit</a>
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