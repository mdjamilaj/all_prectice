<style>
    form.user .form-control-user {
        border-radius: 3px;
    }

    .col-sm-6.mb-3.mb-sm-0 {
        margin-top: 20px;
    }
</style>

<!-- page content -->
<div class="right_col" role="main">
    <div>
        <!-- start of body content -->
        <div class="page-title">
            <div class="title_left">
                <h3> Edit <?php echo $edit_data[0]->news_title; ?> Page </h3>
            </div>
            <div class="title_right">
                <!-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div> -->
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <a href="<?php echo  base_url(); ?>users" class="btn btn-primary btn-user btn-block">User List</a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Search <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <!--
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
							-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <p class="bg-success text-center text-light"><?= $this->session->userdata('msg'); ?> </p>
                                </div>
                            </div>
                        </div>


                        <div class="container">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 justify-content-center x_panel">
                                            <div class="p-5">
                                                <form class="user" action="<?php echo base_url(); ?>users_show/update" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Username :</label>
                                                            <input type="text" required name="username" value="<?php echo $edit_data[0]->username  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="UserName">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> email :</label>
                                                            <input type="email" required name="email" value="<?php echo $edit_data[0]->email  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="E-mail">
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Admin :</label>
                                                            <select class="form-control" name="admin">
                                                                <?php if ($edit_data[0]->admin == 1) { ?>
                                                                    <option value="1" selected>Admin</option>
                                                                    <option value="0">Not A Admin</option>
                                                                <?php } else { ?>
                                                                    <option value="1">Admin</option>
                                                                    <option value="0" selected>Not A Admin</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0" style=" margin-top: 20px;">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Activated :</label>
                                                            <select class="form-control" name="activated">
                                                                <?php if ($edit_data[0]->activated == 1) { ?>
                                                                    <option value="1" selected>Active</option>
                                                                    <option value="0">Inactive</option>
                                                                <?php } else { ?>
                                                                    <option value="1">Active</option>
                                                                    <option value="0" selected>Inactive</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0" style=" margin-top: 20px;">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Banned :</label>
                                                            <select class="form-control" name="banned">
                                                                <?php if ($edit_data[0]->banned == 1) { ?>
                                                                    <option value="1" selected>Active</option>
                                                                    <option value="0">Inactive</option>
                                                                <?php } else { ?>
                                                                    <option value="1">Active</option>
                                                                    <option value="0" selected>Inactive</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0" style=" margin-top: 20px;">
                                                            <label for="#"><i class="fa fa-exclamation-circle"></i> Banned Reason :</label>
                                                            <input type="text" class="form-control" value="<?php echo $edit_data[0]->ban_reason  ?>" name='ban_reason' placeholder="Banned Reason !!!">
                                                        </div>
                                                    </div>


                                                    <input type="hidden" value="<?php echo $edit_data[0]->id  ?>" name="id">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Update
                                                    </button>
                                                    <hr>
                                                </form>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>