<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" id="debugbar_loader" data-time="1612021399"
        src="http://localhost/index.php?debugbar"></script>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>

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
    include 'config.php';

    $sql = "SELECT DATE_FORMAT(a.`date`,'%d %M %Y') AS `date`,a.`kode_trx` as `trxcode`,a.`id_nasabah` as `idnasabah`,c.`nama_trx`as `trxname`,a.`nominal`,a.`keterangan`
    FROM `buku_kas` AS a
    LEFT JOIN `data_nasabah` AS b ON a.`id_nasabah`=b.`id_nsbh`
    LEFT JOIN `jenis_trx` AS c ON a.`tipe`=c.id_trx
    WHERE 1=1
    ORDER BY `date` DESC
    ;";
    $result = $conn->query($sql);

    $i = 1;
    // var_dump($row);
    // die;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Catatan Transaksi</h5>
                <hr>
                <div class="row">
                    <div class="col-md">
                        <form action="view-period.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <label for="kelas">Kelas</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php
                                        $sql2  =   "SELECT kelas FROM data_nasabah GROUP BY kelas ORDER BY kelas ASC";
                                        $hasil = $conn->query($sql2);
                                        while ($data = $hasil->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $data['kelas']; ?>"><?= $data['kelas']; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="start">Date Start</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="date" name="start" id="start" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="end">Date End</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="date" name="end" id="end" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="submit" name="submit" value="Submit"
                                        class="form-control btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered mt-3" id='myTable'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Transaksi</th>
                                    <th>Id Nasabah</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                <tr>
                                    <td>" . $i++ . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['trxcode'] . "</td>
                                    <td>" . $row['trxname'] . "</td>
                                    <td>" . $row['idnasabah'] . "</td>
                                    <td>" . $row['nominal'] . "</td>
                                    <td>" . $row['keterangan'];
                                    "</td>
                                </tr>
                            ";
                                }; ?>
                            </tbody>
                        </table>
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