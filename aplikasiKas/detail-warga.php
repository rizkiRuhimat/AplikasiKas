<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.22/b-1.6.5/b-html5-1.6.5/cr-1.5.2/fh-3.1.7/r-2.2.6/rg-1.1.2/sb-1.0.0/datatables.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" />
    <style type="text/css">
    /* Chart.js */
    @keyframes chartjs-render-animation {
        from {
            opacity: .99
        }

        to {
            opacity: 1
        }
    }

    .chartjs-render-monitor {
        animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
        position: absolute;
        direction: ltr;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        pointer-events: none;
        visibility: hidden;
        z-index: -1
    }

    .chartjs-size-monitor-expand>div {
        position: absolute;
        width: 1000000px;
        height: 1000000px;
        left: 0;
        top: 0
    }

    .chartjs-size-monitor-shrink>div {
        position: absolute;
        width: 200%;
        height: 200%;
        left: 0;
        top: 0
    }
    </style>
    <title>Aplikasi Kas</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <a href="warga.php" class="btn btn-primary my-3"><span class="fas fa-user"></span> Kembali</a>
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Form Tambah Data Warga</h5>
                <div class="row">
                    <div class="col-md">
                        <hr>
                        <?php
                        include 'config.php';
                        $id = $_GET['no_id'];
                        $sql = "SELECT * FROM imported_report WHERE no_id = '$id' ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        // $id         = $row['id'];
                        $name           = $row['name'];
                        $spouse         = $row['spouse'];
                        $blok           = $row['block'];
                        $nmr            = $row['rNo'];
                        $kependudukan  = $row['kependudukan'];
                        $status         = $row['status'];
                        $kas            = $row['kas'];
                        $sampah         = $row['sampah'];
                        $security       = $row['security'];

                        ?>

                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="no_id">Id Warga</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="no_id" id="no_id"
                                    value="<?= $id; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="name">Nama Warga</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="name" id="name"
                                    value="<?= $name; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Nama Pasangan</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="spouse" id="spouse"
                                    value="<?= $spouse; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="alamat">Blok</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="block" id="block"
                                    value="<?= $blok; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="nomor">Nomor Rumah</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="nomor" id="nomor"
                                    value="<?= $nmr; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="kependudukan">Kependudukan</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="kependudukan" id="kependudukan"
                                    value="<?= $kependudukan; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="status">Status</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="status" id="status"
                                    value="<?= $status; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="kas">Kas</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="kas" id="kass"
                                    value="<?= $kas; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="sampah">Sampah</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="sampah" id="sampah"
                                    value="<?= $sampah; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="security">Security</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="security" id="security"
                                    value="<?= $security; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="delete-nasabah.php?id=<?= $id; ?>" class="btn btn-danger"><span
                                        class="fas fa-trash"></span> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript choose one of the two! -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
            crossorigin="anonymous"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.10.22/b-1.6.5/b-html5-1.6.5/cr-1.5.2/fh-3.1.7/r-2.2.6/rg-1.1.2/sb-1.0.0/datatables.min.js">
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            function goBack() {
                window.history.back();
            }
        });
        </script>

</body>

</html>