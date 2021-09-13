<html>

<head>
    <title>Tra cứu phiếu thuê</title>
    <style>
        body {
            background-color: #777;
        }
        .content {
            background-color: #ffffff;
            display: block;
            width: 80%;
            height: auto;
            margin: 50px auto;
            /* padding-top: 56px; */
            padding-left: 50px;
            padding-right: 50px;
            /* padding-bottom: 20px; */
            border: ridge;
        }

        #btn-close {
            float: right;
            margin-right: -50px;
        }
    </style>
</head>

<body style="background-color: #5a81a3;">
    <div class="content">
        <a href="../indexnv.php"><button type="button" id="btn-close" class="btn btn-danger">X</button></a>
        <br />
        <br />
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 align="center">Bảng Tra Cứu Phiếu Thuê</h1>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped" style="width:99%">
                        <thead>
                            <tr>
                                <th>Mã Phiếu Thuê</th>
                                <th>Ngày Bắt Đầu Thuê</th>
                                <th>Đơn Giá Tiêu Chuẩn</th>
                                <th>Đơn Giá Được Tính</th>
                                <th>Số Lượng Khách Hàng</th>
                                <th>Mã Phòng</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <br />
        <br />
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

</body>

</html>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#sample_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "TC_fetch_phieuthue.php",
                type: "POST"
            }
        });
    });
</script>