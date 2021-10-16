<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>
        <?= $data['title'] ?>
    </title>

    <!-- Icons font CSS-->
    <link href="<?= base_url() ?>/public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/public/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>/public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/public/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url() ?>/public/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">
                        <?= $data['title'] ?>
                    </h2>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php } ?>
                    <form method="POST" action="<?= base_url() ?>/?ctrl=user&act=store">
                        <div class="input-group">
                            <label class="label">Họ tên</label>
                            <input class="input--style-4" type="text" name="name" value="<?= @$_SESSION['old']['name'] ?>" required>
                            <?php if (isset($_SESSION['errors']['name'])) { ?>
                                <small class="text-danger">
                                    <?= $_SESSION['errors']['name'] ?>
                                </small>
                            <?php } ?>
                        </div>
                        <div class="input-group">
                            <label class="label">Số điện thoại</label>
                            <input class="input--style-4" type="text" name="phone_number" value="<?= @$_SESSION['old']['phone_number'] ?>" required>
                            <?php if (isset($_SESSION['errors']['phone_number'])) { ?>
                                <small class="text-danger">
                                    <?= $_SESSION['errors']['phone_number'] ?>
                                </small>
                            <?php } ?>
                        </div>
                        <div class="input-group">
                            <label class="label">Địa chỉ email</label>
                            <input class="input--style-4" type="email" name="email" value="<?= @$_SESSION['old']['email'] ?>">
                        </div>
                        <div class="input-group">
                            <label class="label">Tuổi</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="age_range">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php foreach ($data['age_ranges'] as $item) { ?>
                                        <option value="<?= $item['id'] ?>" <?php if (
                                                                                isset($_SESSION['old']['age_range']) &&
                                                                                $_SESSION['old']['age_range'] == $item['id']
                                                                            ) echo "selected"; ?>>
                                            <?= $item['text'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Mô tả bản thân</label>
                            <textarea class="description" name="description"><?= @$_SESSION['old']['description'] ?></textarea>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url() ?>/public/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?= base_url() ?>/public/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>/public/vendor/datepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>/public/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url() ?>/public/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<!-- unset flash msg -->
<?php unsetSessionFlashMsg() ?>