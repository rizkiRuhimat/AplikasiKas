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
        <a href="nasabah.php" class="btn btn-primary my-3"><span class="fas fa-user"></span> Kembali</a>
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Form Tambah Nasabah</h5>
                <div class="row">
                    <div class="col-md">
                        <hr>
                        <?php
                        include 'config.php';
                        $id = $_GET['id'];
                        $sql = "select `id_nsbh`,`nama_murid`,CASE TRIM(`jenis_kelamin`) WHEN 'L' THEN 'Laki-Laki' WHEN 'P' THEN 'Perempuan' END AS jenis_kelamin,`kelas`,`nama_wali`,`alamat`,`telp` from data_nasabah where id = '$id' ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        // $id         = $row['id'];
                        $idnasabah  = $row['id_nsbh'];
                        $nama       = $row['nama_murid'];
                        $gender     = $row['jenis_kelamin'];
                        $kelas      = $row['kelas'];
                        $wali       = $row['nama_wali'];
                        $alamat     = $row['alamat'];
                        $telp       = $row['telp'];

                        ?>

                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="idnsbh">Id Nasabah</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="idnsbh" id="idnsbh"
                                    value="<?= $idnasabah; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="nama">Nama Murid</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="nama" id="nama"
                                    value="<?= $nama; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <select class="custom-select" id="validationCustom04" disabled>
                                    <option selected disabled value=""><?= $gender; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="kelas">Kelas</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="kelas" id="kelas"
                                    value="<?= $kelas; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="wali">Nama Orangtua / wali</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="wali" id="wali"
                                    value="<?= $wali; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="alamat">Alamat Tinggal</label>
                            </div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="alamat" id="alamat"
                                    value="<?= $alamat; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group"><label for="telp"> Telp</label></div>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="telp" id="telp"
                                    value="<?= $telp; ?>">
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