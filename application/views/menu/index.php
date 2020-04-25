<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert" >', '</div>'); ?>
            <div class="message" data-message="<?= $this->session->flashdata('message') ?>"></div>
            <div class="error_message" data-error_message="<?= $this->session->flashdata('error_message') ?>"></div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-900">DataTables Menu</h6>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus-circle"></i> Created New Menu</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#editMenuModal<?= $m['id']; ?>"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                            <a href="<?= base_url('menu/delete/'); ?><?= $m['id']; ?>" class="btn btn-danger btn-sm shadow-sm button-delete"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModal">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Menu Name">Menu Name</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- End Modal -->

<!-- Modal edit -->
<?php foreach ($Menu as $m) : ?>
    <div class="modal fade" id="editMenuModal<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal<?= $m['id']; ?>">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/edit'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                        <div class="form-group">
                            <label for="Menu Name">Menu Name</label>
                            <input type="text" class="form-control" id="editmenu" name="editmenu" value="<?= $m['menu'] ?>">
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
<!-- End Modal edit -->