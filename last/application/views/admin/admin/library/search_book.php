
<script src="<?php echo base_url();?>assets/custom_js/custom_js_for_library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom_css_for_library/custom_css_for_library.css">

<!-- page content -->
<div class="right_col" role="main">
	<div> <!-- start of body content -->
		<?php 
		if($status != '' )
		{
		?>
		<div class="page-title">
		<div class="title">
		<?php 
		if($status == "success")
		{
		?>
		<div class = "successful_msg">
		<p> Entry Successful..!! </p>
		</div>
		<?php 
		}
		else if($status == "exists") 
		{
		?>
		<div class = "already_exists_msg">
		<p>Already exists</p>
		</div>  		
		<?php
		}
		else if($status == "failed") 
		{
		?>  
		<div class = "failed_msg">
		<p>Failed</p>      
		</div>
		<?php 
		}
		else
		{
		?>  
		<div class = "validation_msg">   
		<?php echo validation_errors();?>  
		</div>
		<?php
		}
		?>  
		</div>
		</div>

		<div class="clearfix"></div>
		<?php 
		}
		?>

		<div class="page-title">
			<div class="title_left">
			<h3> Search Book </h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
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
					
					<?php echo form_open_multipart('library/search_book', 'id="book_search_form"'); ?>
						<div class="x_content">
							<div class="form-group">

								<label class="control-label col-md-1 col-sm-2 col-xs-12 label-text-control"> 
									Book Title <span class="required"></span>
								</label>
	                            <div class="col-md-5 col-sm-4 col-xs-12">
									<?php
										$book_title = 	array(
											'name' 			=> 'book_title',
											'value' 		=> '',
											'class' 		=> 'form-control',
											'placeholder' 	=> 'Book Title',
											'autofocus' 	=> 'on',
											'autocomplete'  => 'off'
										);
										echo form_input($book_title);
									?>
	                            </div>

	                            <label class="control-label col-md-1 col-sm-2 col-xs-12 label-text-control"> 
	                            	Writer <span class="required"></span>
	                            </label>
	                            <div class="col-md-5 col-sm-4 col-xs-12">
									<?php
										echo form_dropdown('writer_id', $writer_records, '', 'class="select2_writer full-width"');
									?>
	                            </div>

	                            <hr><hr>

								<label class="control-label col-md-1 col-sm-2 col-xs-12 label-text-control"> 
	                            	Category <span class="required"></span>
	                            </label>
	                            <div class="col-md-2 col-sm-4 col-xs-12">
									<?php
										echo form_dropdown('category_code', $category_records, '', 'class="select2_category full-width"')
									?>
	                            </div>

	                            <label class="control-label col-md-1 col-sm-2 col-xs-12 label-text-control"> 
	                            	Class <span class="required"></span>
	                            </label>
	                            <div class="col-md-2 col-sm-4 col-xs-12">
	                            	<?php
										echo form_dropdown('class_code', $class_records, '', 'class="select2_class_code full-width"');
									?>
	                            </div>

	                            <label class="control-label col-md-1 col-sm-2 col-xs-12 label-text-control"> 
	                            	Type <span class="required"></span>
	                            </label>
	                            <div class="col-md-2 col-sm-4 col-xs-12">
									<?php
										echo form_dropdown('type_code', $type_records, '', 'class="select2_type full-width"');
									?>
	                            </div>

	                            <div class="col-md-3">
	                            	<button type="reset" class="btn btn-danger"> 
	                            		<i class="fa fa-refresh"> </i><?php echo nbs(2); ?> Reset 
	                            	</button>
									<button type="submit" class="btn btn-primary"> 
										<i class="fa fa-search"></i> Search
									</button>
	                            </div>
	                        </div><!-- end of form-group -->
						</div>  <!-- END OF CLASS X_CONTENT -->
					</form>

					<div class="x_content">
						<div class="table-responsive">
							<a target="_blank"  href="#" class="pull-right">
								<button class="btn btn-primary">
									<i class="fa fa-print"></i> Generate Pdf
								</button>
							</a>
							<table class="table table-bordered table-striped jambo_table">
								<thead >
									<tr>
										<th>SN</th>
										<th>Book Name</th>
										<th class="text-center">Writer</th>
										<th class="text-center">Class</th>
										<th class="text-center">Category</th>
										<th class="text-center">Type</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<tr>
										<td> 01 </td>
										<td class="text-left"> Name 01 </td>
										<td> Writer 01 </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> <a href="#" target="_blank" title="Edit"><i class="fa fa-pencil-square-o"></i></a> </td>
									</tr>
									
									<tr>
										<td> 02 </td>
										<td class="text-left"> Name 01 </td>
										<td> Writer 01 </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> <a href="#" target="_blank" title="Edit"><i class="fa fa-pencil-square-o"></i></a> </td>
									</tr>
									
									<tr>
										<td> 03 </td>
										<td class="text-left"> Name 01 </td>
										<td> Writer 01 </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> --- </td>
										<td> <a href="#" target="_blank" title="Edit"><i class="fa fa-pencil-square-o"></i></a> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div> <!-- END OF CLASS X_CONTENT -->

					<div class="dropDiv classRed">
						<p style="text-align:center; color:#FFF;">
							Sorry ! No Information Found.
						</p>
					</div>
				</div>
			</div>
		</div>
		
	</div><!-- end of body content -->