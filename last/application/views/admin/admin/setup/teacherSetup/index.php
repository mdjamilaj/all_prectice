<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
          <div class="card mt-5">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Teachers List</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Set new teacher</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Group</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value->id; ?></th>
                            <td><?php echo $value->firstname; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->group_value; ?></td>
                            <td><?php echo $value->subject; ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php  echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
    </div>
</div>