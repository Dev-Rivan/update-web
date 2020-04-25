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
                    <h6 class="m-0 font-weight-bold text-gray-900">DataTables User Role</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="10%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('administrator/menuaccess/') . $r['id']; ?>" class="btn btn-warning btn-sm shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> Access</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /.container-fluid -->

</div> <!-- End of Main Content -->