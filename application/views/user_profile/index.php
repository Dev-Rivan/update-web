<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-5">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <?= $user['name']; ?> </h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?> </small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?= base_url('user_profile/edit'); ?>" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->