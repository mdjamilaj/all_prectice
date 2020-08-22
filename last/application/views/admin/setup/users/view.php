<script src="<?php echo base_url(); ?>assets/custom_js/custom_js_for_library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom_css_for_library/custom_css_for_library.css">

<!-- page content -->
<div class="right_col" role="main">
    <div>
        <!-- start of body content -->
        <div class="page-title">
            <div class="title_left">
                <h3> Search Users </h3>
            </div>
            <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <a href="" class="" style="opacity: 0">dsfsd</a>
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
                                        <div class="col-lg-12 justify-content-center">
                                            <div class="p-5">
                                                <form class="user mt-5" action="<?php echo base_url(); ?>users_show" method="post" enctype="multipart/form-data">

                                                    <div class="form-group row">
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                                                <i class="fa fa-search"></i> E-mail<span class="required"></span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-4 col-xs-12">
                                                                <input type="text" autocomplete="off" id="email" name="email" class="form-control form-control-user" placeholder="User E-mail">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                                                <i class="fa fa-search"></i> Actived <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-4 col-xs-12">
                                                                <select class="form-control" name="actived">
                                                                    <option value="" selected>Select One</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                                                <i class="fa fa-search"></i> Banned <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-4 col-xs-12">
                                                                <select class="form-control" name="banned">
                                                                    <option value="" selected>Select One</option>
                                                                    <option value="1">Banned</option>
                                                                    <option value="0">active</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12 mb-4 mb-sm-0">
                                                            <button type="submit" class="btn btn-primary btn-user btn-block">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="x_content">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <p>
                                    <?php if ($this->session->flashdata('msg')) : ?>
                                        <p class='bg-success text-center text-light' style='padding: 5px;'><?php echo $this->session->flashdata('msg'); ?></p>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?php if (isset($email11)) { ?> <p style="background: #000000; color: #ffffff;text-align: center;font-size: 16px;font-weight: 600;padding: 4px; width:550px; float: left; text-aling: center;"><?php if($email11 !=''){echo "E-mail : ".$email11;} }?> </p>
                        <p style="background: #000000; color: #ffffff;text-align: center;font-size: 16px;font-weight: 600;padding: 4px; width:90px; float: right; text-aling: center;">Total : <?php echo $total; ?> </p>
                        <table class="table table-bordered table-striped jambo_table">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="text-center">SN</th>
                                    <th class="text-center">E-mail</th>
                                    <th class="text-center">First Name </th>
                                    <th class="text-center">Activated</th>
                                    <th class="text-center">Banned</th>
                                    <th class="text-center">Last Login</th>
                                    <th class="text-center">Created</th>
                                    <?php $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
                                    if ($user->admin == 1) { ?>
                                        <th class="text-center">Reset Password</th>
                                        <th class="text-center">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                <?php $i = 0;
                                foreach ($details as $show_data) {
                                    $i++; ?>

                                    <?php if ($show_data['activated'] == 0 || $show_data['banned'] == 1) { ?>
                                        <tr style="background: #fbe6e6">
                                            <td><?php echo $show_data['id']; ?></td>
                                            <td class="text-center" style="font-weight: 600"><?php echo $show_data['email']; ?></td>
                                            <td><?php echo $show_data['firstname']; ?></td>
                                            <td><?php if ($show_data['activated'] == 1) {
                                                    echo "Active";
                                                } elseif ($show_data['activated'] == 0) {
                                                    echo "Inactive";
                                                } ?></td>
                                            <td><?php if ($show_data['banned'] == 1) {
                                                    echo "Banned";
                                                } else {
                                                    echo "Active";
                                                } ?></td>
                                            <td><?php echo $show_data['last_login']; ?></td>
                                            <td><?php echo $show_data['created']; ?></td>
                                            <?php $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
                                            if ($user->admin == 1) { ?>
                                                <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>auth/forgot_password?edit=<?php echo $show_data['email'] ?>"><i class="fa fa-eye"></i></a></td>
                                                <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>users_show/edit?edit=<?php echo $show_data['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } else { ?>

                                        <tr>
                                            <td><?php echo $show_data['id']; ?></td>
                                            <td class="text-center" style="font-weight: 600"><?php echo $show_data['email']; ?></td>
                                            <td><?php echo $show_data['firstname']; ?></td>
                                            <td><?php if ($show_data['activated'] == 1) {
                                                    echo "Active";
                                                } elseif ($show_data['activated'] == 0) {
                                                    echo "Inactive";
                                                } ?></td>
                                            <td><?php if ($show_data['banned'] == 1) {
                                                    echo "Active";
                                                } else {
                                                    echo "Inactive";
                                                } ?></td>
                                            <td><?php echo $show_data['last_login']; ?></td>
                                            <td><?php echo $show_data['created']; ?></td>
                                            <?php $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
                                            if ($user->admin == 1) { ?>
                                            <?php if (substr_count($show_data['email'], 'google|') == 0) { ?>
                                                <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>auth/forgot_password?edit=<?php echo $show_data['email'] ?>"><i class="fa fa-eye"></i></a></td>
                                            <?php }else{ ?>
                                                <td style="color: red" title="This User Have Login Use Google Account.As a result This user password is Empty!!!"><i class="fa fa-google"></i></td>
                                            <?php } ?>
                                                <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>users_show/edit?edit=<?php echo $show_data['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                            <tbody class="text-center" id="load-more">

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if ($i == 0) { ?>
                    <div class="dropDiv classRed">
                        <p style="text-align:center; color:#FFF;">
                            Sorry ! No Information Found.
                        </p>
                    </div>
                <?php } ?>
                <button type="button" onclick="loadmore()" class="btn btn-primary btn-user btn-block" id="loadmore" style="width: 150px; <?php if (isset($load_hide)) {
                                                                                                                                                if ($load_hide == 1) {
                                                                                                                                                    echo 'display: none;';
                                                                                                                                                }
                                                                                                                                            } ?>" value="loadmore">Load More</button>
            </div>
        </div>
    </div>

</div>


<input type="hidden" value="" id="length">


<script type="text/javascript">
    count = 0;
    var base_url = "<?php echo base_url(); ?>";

    function loadmore() {
        count += 1;
        $.ajax({
            url: "<?php echo base_url(); ?>site/ajax_req",
            type: "POST",
            data: {
                offset: 10 * count,
                limit: 10,
                table: "users"
            },
            cache: false,
            success: function(data) {
                var data = JSON.parse(data);
                console.log(data.view);
                var view = data.view;
                var check = $('#length').val();
                if (check == view.length) {
                    alert("No More Data ....");
                    $('#loadmore').hide();
                }
                $('#length').val(view.length);
                var string1 = 0;

                $.each(view, function(key, value) {
                    if (value['activated'] == 1) {
                        var activated = "activate";
                    } else {
                        activated = "Inactivate";
                    }
                    if (value['banned'] == 1) {
                        var banned = "Banned";
                    } else {
                        banned = "Active";
                    }
                    if (value['activated'] == 0 || value['banned'] == 1) {
                        string1 = string1 + "<tr style='background: #fbe6e6'><td>" + value['id'] + "</td><td class='text-center' style='font-weight: bold'>" + value['email'] + "</td><td>" + value['firstname'] + "</td><td class='text-center'>" + activated + "</td><td class='text-center'>" + banned + "</td><td class='text-center'>" + value['last_login'] + "</td><td class='text-center'>" + value['created'] + "</td> ";
                        <?php $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
                        if ($user->admin == 1) { ?>
                            string1 = string1 + "<td class='edit_td' style='padding: 0 !important'><a href='" + base_url + "auth/forgot_password?edit=" + value['email'] + "'><i class='fa  fa-eye'></i></a></td><td class='edit_td' style='padding: 0 !important'><a href='" + base_url + "users_show/edit?edit=" + value['id'] + "'><i class='fa fa-pencil-square-o'></i></a></td> ";
                        <?php } ?>
                        string1 = string1 + "</tr>";
                    } else {
                        string1 = string1 + "<tr><td>" + value['id'] + "</td><td class='text-center' style='font-weight: bold'>" + value['email'] + "</td><td>" + value['firstname'] + "</td><td class='text-center'>" + activated + "</td><td class='text-center'>" + banned + "</td><td class='text-center'>" + value['last_login'] + "</td><td class='text-center'>" + value['created'] + "</td> ";
                        <?php $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
                        if ($user->admin == 1) { ?>
                            string1 = string1 + "<td class='edit_td' style='padding: 0 !important'><a href='" + base_url + "auth/forgot_password?edit=" + value['email'] + "'><i class='fa  fa-eye'></i></a></td><td class='edit_td' style='padding: 0 !important'><a href='" + base_url + "users_show/edit?edit=" + value['id'] + "'><i class='fa fa-pencil-square-o'></i></a></td> ";
                        <?php  } ?>
                        string1 = string1 + "</tr>";
                    }
                });
                // console.log(string1)
                $("#load-more").html(string1);
            }
        })
    }
</script>