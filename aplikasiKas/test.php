<!DOCTYPE html>
<html>

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
    <title>Kas Bulanan Bulan <?= date('F'); ?></title>
</head>

<body>
    <?php
$data = [

    array( 
        'nama'=>'Dono', 
        'kelas'=>'2B',
        'bulan'=>array(
                '1'=> '&#10003',
                '2'=> '&#10003',
                '3'=> '&#10003',
                '4'=> '&#10003',
                '5'=> '&#x2715',
                '6'=> '&#x2715',
                '7'=> '&#x2715',
                '8'=> '&#x2715',
                '9'=> '&#x2715',
                '10'=> '&#x2715',
                '11'=> '&#x2715',
                '12'=> '&#x2715'
        ),
        'nominal' => '60000'
        ),

    array(
        'nama'=>'Indro',  
        'kelas'=>'2B',
        'bulan'=>array(
                '1'=> '&#10003',
                '2'=> '&#10003',
                '3'=> '&#10003',
                '4'=> '&#10003',
                '5'=> '&#10003',
                '6'=> '&#10003',
                '7'=> '&#x2715',
                '8'=> '&#x2715',
                '9'=> '&#x2715',
                '10'=> '&#x2715',
                '11'=> '&#x2715',
                '12'=> '&#x2715'
                ),
                'nominal' => '90000'
        ),

    array(
        'nama'=>'Kasino', 
        'kelas'=>'2B',
        'bulan'=>array(
                '1'=> '&#10003',
                '2'=> '&#10003',
                '3'=> '&#10003',
                '4'=> '&#10003',
                '5'=> '&#10003',
                '6'=> '&#10003',
                '7'=> '&#10003',
                '8'=> '&#10003',
                '9'=> '&#10003',
                '10'=> '&#x2715',
                '11'=> '&#x2715',
                '12'=> '&#x2715'
                ),
                'nominal' => '135000'
        )
];
?>
    <div class="container">
        <div class="row  my-3">
            <div class="col-md">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                            <th>Total Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) {
                        ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td style="text-align: center;"><?= $d['kelas']; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][1]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][2]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][3]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][4]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][5]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][6]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][7]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][8]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][9]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][10]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][11]; ?></td>
                            <td style="text-align: center;"><?= $d['bulan'][12]; ?></td>
                            <td style="text-align: center;"><?= $d['nominal']; ?></td>
                        </tr>
                        <? }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Javascript start here  -->
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