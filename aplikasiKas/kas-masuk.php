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
    include_once 'config.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Form Kas Masuk</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form action="add-trx.php" method="post">
                            <div class="row form-group">
                                <div class="col">
                                    <label for="tipe">Tipe Transaksi</label>
                                </div>
                                <div class="col">
                                    <select name="tipe" id="tipe" class="form-control">
                                        <option selected value=" - "> --- Pilih --- </option>
                                        <?php
                                        $sql = "SELECT * FROM jenis_trx WHERE cat = 'in' ORDER BY id_trx ASC";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                <option value='" . $data["id_trx"] . '-' . $data["cat"] . "' >" . $data["nama_trx"] . "</option>";
                                            };
                                        }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label for="no_trx">Nomor Transaksi</label>
                                </div>
                                <div class="col">
                                    <input class="form-control" type="text" name="no_trx"
                                        value="<?= rand(1000, 9999) . rand(1000, 9999); ?>" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label for="date">Tanggal</label>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label for="nama">Nama Murid</label>
                                </div>
                                <div class="col">
                                    <select name="nama" id="nama" class="form-control">
                                        <option selected value=" - "> --- Pilih --- </option>
                                        <?php
                                        $sql = "SELECT id_nsbh,nama_murid FROM data_nasabah ORDER BY nama_murid ASC";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                <option value='" . $data["id_nsbh"] . "'>" . $data["nama_murid"] . "</option>";
                                            }
                                        }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label for="nominal">Nominal</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="nominal" id="nominal">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <input type="submit" value="Submit" class="btn btn-primary" name="save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
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
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
        });

        function goBack() {
            window.history.back();
        }
    });
    </script>

</body>

</html>