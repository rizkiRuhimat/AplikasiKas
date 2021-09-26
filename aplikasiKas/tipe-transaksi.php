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
    include 'config.php';
    ?>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addTipe">
            Tambah Tipe Transaksi
        </button>
        <!-- <a href="form-add-tipe.php" class="btn btn-primary my-3">Tambah Transaksi</a> -->
        <div class="row">
            <div class="col-lg">
                <h5 class="row mt-3 ml-3">Tipe Transaksi</h5>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Kategori Transaksi</th>
                                    <th>Nama Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'config.php';
                                $i = 1;
                                $sql = "select * from jenis_trx";
                                if ($result = $conn->query($sql)) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['id_trx']; ?></td>
                                    <td><?= $row['cat']; ?></td>
                                    <td><?= $row['nama_trx']; ?></td>
                                    <td>
                                        <a href="edit-tipe.php?id=<?= $row['id']; ?>" class="btn btn-warning"><span
                                                class="fas fa-pen"></span> Edit</a>
                                        <a href="delete-tipe-trx.php?id=<?= $row['id']; ?>" class="btn btn-danger"><span
                                                class="fas fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                                <?php }
                                }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add tipe -->
    <div class="modal fade" id="addTipe" tabindex="-1" aria-labelledby="addTipe" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTipe">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add-tipe.php" method="POST">
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="kodetrx">Kode Transaksi</label>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                include_once 'config.php';
                                $query = mysqli_query($conn, "SELECT max(id_trx) as KODE FROM jenis_trx");
                                $data = mysqli_fetch_array($query);
                                $kodetrx = $data['KODE'];
                                $urutan = (int) substr($kodetrx, 3, 3);
                                $urutan++;
                                $angka = "0";
                                $kodetrx = $angka . sprintf("%03s", $urutan);
                                ?>
                                <input type="text" class="form-control" name="kodetrx" id="kodetrx"
                                    value="<?= $kodetrx; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="cat">Kategori Transaksi</label>
                            </div>
                            <div class="col-sm-4">
                                <select name="cat" id="cat" class="form-control" autofocus>
                                    <option value="" disabled>pilih</option>
                                    <option value="in">Masuk</option>
                                    <option value="out">Keluar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label for="nametrx">Nama Transaksi</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nametrx" id="nametrx" value="" autofocus>
                            </div>
                        </div>
                        <hr>
                        <button type="reset" value="Reset" class="btn btn-warning"><span class="fas fa-undo"></span>
                            Reset</button>
                        <input type="submit" value="Submit" name="save" class="btn btn-primary">
                    </form>
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