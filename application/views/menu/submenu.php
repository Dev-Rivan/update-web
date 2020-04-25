<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="message" data-message="<?= $this->session->flashdata('message') ?>"></div>
            <div class="error_message" data-error_message="<?= $this->session->flashdata('error_message') ?>"></div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-900">DataTables SubMenu</h6>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus-circle"></i> Created New Submenu</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">icon</th>
                                    <th scope="col">Menu Active</th>
                                    <th scope="col" width="18%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <?php foreach ($menu as $m) : ?>
                                            <?php if ($m['id'] == $sm['menu_id']) : ?>
                                                <td><?= $m['menu']; ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <?php foreach ($active as $a) : ?>
                                            <?php if ($a['id'] == $sm['is_active']) : ?>
                                                <td><?= $a['active']; ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id']; ?>"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                            <a href="<?= base_url(); ?>menu/delete_submenu/<?= $sm['id']; ?>" class="btn btn-danger btn-sm shadow-sm button-delete"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModal">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Submenu Title">Submenu Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                    </div>
                    <div class="form-group">
                        <label for="Menu">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Submenu Url">Submenu Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <label for="Submenu Icon">Submenu Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <label for="Menu Active">Menu Active</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option selected>Select Menu Active?</option>
                            <?php foreach ($active as $a) : ?>
                                <option value="<?= $a['id']; ?>"><?= $a['active']; ?></option>
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
</div> <!-- end modal -->


<!-- Modal edit sub menu -->
<?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade" id="editSubMenuModal<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubMenuModal<?= $sm['id']; ?>">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $sm['id'] ?>">
                        <div class="form-group">
                            <label for="Submenu Title">Submenu Title</label>
                            <input type="text" class="form-control" id="edittitle" name="edittitle" value="<?= $sm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Menu">Menu</label>
                            <select name="editmenu_id" id="editmenu_id" class="form-control">
                                <?php foreach ($menu as $m) : ?>
                                    <?php if ($m['id'] == $sm['menu_id']) : ?>
                                        <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Submenu Url">Submenu Url</label>
                            <input type="text" class="form-control" id="editurl" name="editurl" value="<?= $sm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Submenu Icon">Submenu Icon</label>
                            <input type="text" class="form-control" id="editicon" name="editicon" value="<?= $sm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Menu Active">Menu Active</label>
                            <select name="editis_active" id="editis_active" class="form-control">
                                <?php foreach ($active as $a) : ?>
                                    <?php if ($a['id'] == $sm['is_active']) : ?>
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
<!-- end modal -->