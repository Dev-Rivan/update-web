<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="message" data-message="<?= $this->session->flashdata('message') ?>"></div>
            <div class="error_message" data-error_message="<?= $this->session->flashdata('error_message') ?>"></div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-900">DataTables User</h6>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#CreatedNewUserModal"><i class="fas fa-plus-circle"></i> Created New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">User Active</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($User_T as $um) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= $um['name']; ?></td>
                                        <td><?= $um['email']; ?></td>
                                        <td><?= $um['role_id'] == 2 ? "User" : "Admin"; ?></td>
                                        <td><?= $um['is_active'] == 1 ? "Active" : "Nonactive"; ?></td>
                                        <td><?= date('d F Y', $um['date_created']); ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#editUserModal<?= $um['id']; ?>"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                            <a href="<?= base_url(); ?>user_management/delete_user/<?= $um['id']; ?>" class="btn btn-danger btn-sm shadow-sm button-delete"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /.container-fluid -->

</div> <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="CreatedNewUserModal" tabindex="-1" role="dialog" aria-labelledby="CreatedNewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreatedNewUserModal">Created New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user_management'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-gray-900" for="Full Name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="text-gray-900" for="Email Address">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="text-gray-900" for="Role User">Role User</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Select Role User</option>
                            <?php foreach ($ur as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="text-gray-900" for="Password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="text-gray-900" for="Repeat Password">Repeat Password</label>
                        <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Repeat Password">
                        <?= form_error('confpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="text-gray-900" for="User Active">User Active</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option selected>Select Active User?</option>
                            <?php foreach ($ua as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['active']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php foreach ($User_T as $um) : ?>
    <div class="modal fade" id="editUserModal<?= $um['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModal<?= $um['id']; ?>">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user_management/edit'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $um['id'] ?>">
                        <div class="form-group">
                            <label class="text-gray-900" for="Full Name">Full Name</label>
                            <input type="text" class="form-control" id="editname" name="editname" value="<?= $um['name']; ?>">
                            <?= form_error('editname', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-900" for="Email Address">Email Address</label>
                            <input type="text" class="form-control" id="editemail" name="editemail" value="<?= $um['email']; ?>">
                            <?= form_error('editemail', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-900" for="Role User">Role User</label>
                            <select name="editrole" id="editrole" class="form-control">
                                <option value="">Select Role User</option>
                                <?php foreach ($ur as $r) : ?>
                                    <?php if ($r['id'] == $um['role_id']) : ?>
                                        <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('editrole', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-900" for="Password">Password</label>
                            <input type="password" class="form-control" id="editpassword" name="editpassword" placeholder="Password">
                            <?= form_error('editpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-900" for="Repeat Password">Repeat Password</label>
                            <input type="password" class="form-control" id="editconfpassword" name="editconfpassword" placeholder="Repeat Password">
                            <?= form_error('editconfpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-gray-900" for="User Active">User Active</label>
                            <select name="editis_active" id="editis_active" class="form-control">
                                <?php foreach ($ua as $a) : ?>
                                    <?php if ($a['id'] == $um['is_active']) : ?>
                                        <option value="<?= $a['id']; ?>" selected><?= $a['active']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $a['id']; ?>"><?= $a['active']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- end modal edit -->