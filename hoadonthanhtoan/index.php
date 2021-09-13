<?php
include('DB_connection.php');
?>

<html>

<head>
    <title>Hóa đơn thanh toán</title>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="script.js"></script>
    <style>
        .content {
            background-color: #ffffff;
            display: block;
            width: 80%;
            height: auto;
            margin: 50px auto;
            /* padding-top: 56px; */
            padding-left: 50px;
            padding-right: 50px;
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
        <a href="../index.php"><button type="button" id="btn-close" class="btn btn-danger">X</button></a>
        <div class="panel-heading" style="text-transform:capitalize;display:flex;justify-content:center;">
            <h2>Quản lý hóa đơn</h2>
        </div>
        <span id="error"></span>
        <form id="ThongTinHoaDon" method="POST">
            <div id = "xuathoadon" style="padding: 20px">
                <div class="form-group">
                    <label>Mã Hóa Đơn</label>
                    <input readonly type="text" class="form-control" name="txtMaHD" value="<?php echo fill_ma_hd($connect) ?>">
                </div>
                <div class="form-group">
                    <label>Khách Hàng / Cơ Quan:</label>
                    <input type="text" class="form-control" name="txtCoQuan" id="txtCoQuan">
                </div>
                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi">
                </div>
                <div class="form-group">
                    <label>Ngày Lập Hóa Đơn</label>
                    <input class="form-control" type="date" name="txtNgayLapHD" id="txtNgayLapHD">
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Thêm Phiếu Thuê
                    </button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 style="float:left" class="modal-title" id="exampleModalLabel">Danh sách phiếu thuê chưa thanh toán</h3>
                                <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="sample_data" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Mã Phiếu Thuê</th>
                                                    <th>Ngày Bắt Đầu Thuê</th>
                                                    <th>Đơn Giá Tiêu Chuẩn</th>
                                                    <th>Đơn Giá Được Tính </th>
                                                    <th>Số Khách</th>
                                                    <th>Mã Phòng</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include('HoaDon_fetch.php');
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table id="sample_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã Phiếu Thuê</th>
                                    <th>Ngày Bắt Đầu Thuê</th>
                                    <th>Đơn Giá Tiêu Chuẩn</th>
                                    <th>Đơn Giá Được Tính </th>
                                    <th>Số Khách</th>
                                    <th>Mã Phòng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="hoadon"></tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tổng hóa đơn</label>
                    <input readonly class="form-control" type="text" name="txtTriGia" id="txtTriGia">
                </div>
            </div>
            <div style="text-align:center">
                <input class="btn btn-success" type="submit" value="Tạo Hóa Đơn">
                <button class="btn btn-primary" onclick="generatePDF()">Xuất dữ liệu</button>
            </div>
        </form>
    </div>
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
<script>
    function xuatphieu(maphieuthue, date) {
        var days = dateDiff(date);
        maphieuthue = maphieuthue.slice(0, maphieuthue.length - 1);
        console.log(maphieuthue);
        $.ajax({
            type: "POST",
            url: "HoaDon_action.php",
            data: {
                "MaPhieuThueCanXuat": maphieuthue,
                "SoNgayThue": days
            },
            success: function(data) {
                $('#hoadon').append(data);
                tinhtxtTriGia();
            }
        });
    }

    function xoaphieu(xoa) {
        console.log(xoa);
        $('#' + xoa).remove();
        tinhtxtTriGia();
    }

    function tinhtxtTriGia() {
        var tong = 0;
        var arr = $('.thanhtien');
        for (var i = 0; i < arr.length; i++) {
            tong += Number(arr[i].innerText);
        }
        $('#txtTriGia').val(tong);
    }

    $('#ThongTinHoaDon').on('submit', function() {
        event.preventDefault();
        var formData = $(this).serialize();

        var error = '';
        $('#txtCoQuan').each(function() {
            var count = 1;
            if ($(this).val() == '') {
                error += '<p>Chưa nhập Khách Hàng / Cơ Quan</p>';
                return false;
            }
            count = count + 1;
        });

        $('#txtDiaChi').each(function() {
            var count = 1;
            if ($(this).val() == '') {
                error += '<p>Chưa nhập Địa Chỉ</p>';
                return false;
            }
            count = count + 1;
        });

        var maPhieuThue = $('.maPhieuThue');
        var i;
        for (i = 0; i < maPhieuThue.length; i++) {
            formData += '&maPhieuThue[]=' + maPhieuThue[i].innerText;
        }

        var maPhong = $('.maPhong');
        for (i = 0; i < maPhong.length; i++) {
            formData += '&maPhong[]=' + maPhong[i].innerText;
        }

        var thanhTien = $('.thanhTien');
        for (i = 0; i < thanhTien.length; i++) {
            formData += '&thanhTien[]=' + thanhTien[i].innerText;
        }

        var donGiaDuocTinh = $('.donGiaDuocTinh');
        for (i = 0; i < donGiaDuocTinh.length; i++) {
            formData += '&donGiaDuocTinh[]=' + donGiaDuocTinh[i].innerText;
        }

        for (i = 0; i < donGiaDuocTinh.length; i++) {
            formData += '&soNgayThue[]=' + Math.round(Number(thanhTien[i].innerText) / Number(donGiaDuocTinh[i].innerText));
        }

        var query = formData.replace(/\[/g, "%5B").replace(/\]/g, "%5D");

        $('#txtTriGia').each(function() {
            var count = 1;
            if ($(this).val() == '' || $(this).val() == 0) {
                error += '<p>Chưa chọn Phiếu Thuê</p>';
                return false;
            }
            count = count + 1;
        });

        if (error == '') {
            console.log(query);
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: query,
                success: function(data) {
                    $('#error').html('<div class="alert alert-success">' + "Tạo hóa đơn thành công" + '</div>');
                }
            });
        } else {
            $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }
    });


    function dateDiff(date) {
        var start = date;
        var end = $("#txtNgayLapHD").val();
        var days = (Date.parse(end) - Date.parse(start)) / (1000 * 60 * 60 * 24);
        console.log(days);
        if (days === 0) days++;
        return days;
    }
    $(document).ready(function() {
        $('#txtNgayLapHD').val(new Date().toJSON().slice(0, 10));
    });
</script>