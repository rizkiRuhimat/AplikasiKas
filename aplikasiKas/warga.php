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
    <?php include 'navbar.php'; ?>
    <div class="container">
        <a href="create_warga.php" class="btn btn-primary my-3">Tambah Warga</a>
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Data Warga</h5>
                <hr>
                <div class="row">
                    <div class="col-md">
                        <table class="table table-bordered mt-3" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">No Warga</th> -->
                                    <th scope="col">Nama Warga</th>
                                    <th scope="col">Nama Pasangan</th>
                                    <th scope="col">Blok</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Status Kependudukan</th>
                                    <th scope="col">Status Tempat Tinggal</th>
                                    <th scope="col">Iuran Kas</th>
                                    <th scope="col">Iuran Sampah</th>
                                    <th scope="col">Iuran Security</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $i = 1;
                                $sql = "select * from imported_report";
                                if ($result = $conn->query($sql)) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['spouse']; ?></td>
                                    <td><?= $row['block']; ?></td>
                                    <td><?= $row['rNo']; ?></td>
                                    <td><?= $row['kependudukan']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['kas']; ?></td>
                                    <td><?= $row['sampah']; ?></td>
                                    <td><?= $row['security']; ?></td>
                                    <td><a href="detail-warga.php?no_id=<?= $row['no_id']; ?>"
                                            class="btn btn-primary"><span class="fas fa-eye"></span>
                                            Detail</a></td>

                                </tr>
                                <?php
                                    }
                                };
                                $result->free();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript choose one of the two! -->
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