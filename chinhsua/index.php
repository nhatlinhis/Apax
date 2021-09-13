<?php
include('DB_connection.php');
?>
<html>

<head>
  <title>Thay đổi qui định</title>
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
      padding-bottom: 15px;
      border: ridge;
    }

    #btn-close {
      float: right;
      margin-right: -50px;
    }

    h4 {
      text-align: center;
    }

    label {
      font-weight: normal !important;
    }
  </style>
</head>

<body style="background-color: #5a81a3;">
  <div class="content">
    <a href="../index.php"><button type="button" id="btn-close" class="btn btn-danger">X</button></a>
    <h1 style="text-align:center">Thay Đổi Quy Định</h1>
    <br />
    <h4 style="font-weight: bold;">Thay đổi số lượng và đơn giá các loại phòng</h4>
    <br>
    <form id="phongToiDa">
      <span id="error10"></span>
      <div class="form-group row">
        <label for="SoPhongToiDa" class="col-sm-3 col-form-label">Số lượng phòng tối đa của khách sạn</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="SoPhongToiDa" id="SoPhongToiDa" placeholder="Hiện tại: <?php echo getPhongToiDa($connect) ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Cập nhật">
      </div>
    </form>
    <form id="loaiphong">
      <div class="modal fade" id="loaiPhongModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" style="border:none;">&times;</button>
              <h4 class="modal-title">Loại Phòng Mới</h4>
            </div>
            <span id="error1"></span>
            <div class="modal-body">
              <div class="form-group row">
                <label for="MaLoaiPhong" class="col-sm-3 col-form-label">Mã loại phòng</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="MaLoaiPhong" id="MaLoaiPhong">
                </div>
              </div>
              <div class="form-group row">
                <label for="TenLoaiPhong" class="col-sm-3 col-form-label">Tên loại phòng</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="TenLoaiPhong" id="TenLoaiPhong">
                </div>
              </div>
              <div class="form-group row">
                <label for="DonGiaTieuChuan" class="col-sm-3 col-form-label">Đơn giá tiêu chuẩn</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="DonGiaTieuChuan" id="DonGiaTieuChuan">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" value="Tạo">
            </div>
          </div>
        </div>
      </div>
    </form>

    <table id="sample_data1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Mã Loại Phòng</th>
          <th>Tên Loại Phòng</th>
          <th>Đơn Giá</th>
          <th>Số Lượng</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#loaiPhongModal">THÊM LOẠI PHÒNG</button>
    <br />
    <br />
    <h4 style="font-weight: bold;">Thay đổi số lượng loại khách, số lượng khách tối đa trong phòng</h4>
    <form id="loaikhach">
      <div class="modal fade" id="loaiKhachModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" style="border:none;">&times;</button>
              <h4 class="modal-title">Loại khách mới</h4>
            </div>
            <span id="error2"></span>
            <div class="modal-body">
              <div class="form-group row">
                <label for="MaLoaiKh" class="col-sm-3 col-form-label">Mã loại khách</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="MaLoaiKh" id="MaLoaiKh">
                </div>
              </div>
              <div class="form-group row">
                <label for="TenLoaiKh" class="col-sm-3 col-form-label">Tên loại khách</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="TenLoaiKh" id="TenLoaiKh">
                </div>
              </div>
              <div class="form-group row">
                <label for="HeSoPhuThu" class="col-sm-3 col-form-label">Hệ số phụ thu</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="HeSoPhuThu" id="HeSoPhuThu">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" value="Tạo">
            </div>
          </div>
        </div>
      </div>
    </form>
    <table id="sample_data2" class="table table-bordered table-striped" style="width: 740px">
      <thead>
        <tr>
          <th>Mã Loại Khách</th>
          <th>Tên Loại Khách</th>
          <th>Hệ số phụ thu</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#loaiKhachModal" style="margin-bottom: 15px;">THÊM LOẠI KHÁCH</button>
    <br>
    <form id="khachToiDa">
      <span id="error3"></span>
      <div class="form-group row">
        <label for="SoKhachToiDa" class="col-sm-3 col-form-label">Số lượng khách tối đa trong phòng</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="SoKhachToiDa" id="SoKhachToiDa" placeholder="Hiện tại: <?php echo getKhachToiDa($connect) ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Cập nhật">
      </div>
    </form>
    <br />
    <h4 style="font-weight: bold;">Thay đổi tỉ lệ phụ thu</h4>
    <form id="phuThuKhachToiDa">
      <span id="error4"></span>
      <div class="form-group row">
        <label for="PhuThuKhachToiDa" class="col-sm-3 col-form-label">Tỉ lệ phụ thu khách thứ <?php echo getKhachToiDa($connect) ?></label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="PhuThuKhachToiDa" id="PhuThuKhachToiDa" placeholder="Hiện tại: <?php echo getPhuThuKhachToiDa($connect) ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Cập nhật">
      </div>
    </form>
    <form id="phuThuKhachNN">
      <span id="error5"></span>
      <div class="form-group row">
        <label for="PhuThuKhachNN" class="col-sm-3 col-form-label">Tỉ lệ phụ thu khách nước ngoài</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="PhuThuKhachNN" id="PhuThuKhachNN" placeholder="Hiện tại: <?php echo getPhuThuKhachNN($connect) ?>">
        </div>
        <input class="btn btn-success" type="submit" value="Cập nhật">
      </div>
    </form>
  </div>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  $(document).ready(function() {
    $("#phongToiDa").on('submit', function() {
      event.preventDefault();
      var error10 = '';
      $('#SoPhongToiDa').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error10 += '<p>Chưa nhập Số phòng tối đa</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error10 == '') {
        $.ajax({
          url: 'access/TDQD1_PhongToiDa.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error10').html('<div class="alert alert-success">' + data + '</div>');
          }
        })
      } else {
        $('#error10').html('<div class="alert alert-danger">' + error10 + '</div>');
      }
    });

    $('#loaiphong').on('submit', function(event) {
      event.preventDefault();
      var error1 = '';
      $('#MaLoaiPhong').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error1 += '<p>Chưa nhập Mã Loại Phòng</p>';
          return false;
        }
        count++;
      });
      $('#TenLoaiPhong').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error1 += '<p>Chưa nhập Tên Loại Phòng</p>';
          return false;
        }
        count++;
      });
      $('#DonGiaTieuChuan').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error1 += '<p>Chưa nhập Đơn Giá Tiêu Chuẩn</p>';
          return false;
        }
        count++;
      });
      $('#SoLuong').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error1 += '<p>Chưa nhập Số Lượng</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error1 == '') {
        $.ajax({
          url: 'access/LoaiPhong_insert.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error1').html('<div class="alert alert-success">' + data + '</div>');
          }
        });
      } else {
        $('#error1').html('<div class="alert alert-danger">' + error1 + '</div>');
      }
    });

    $("#loaikhach").on('submit', function(event) {
      event.preventDefault();
      var error2 = '';
      $('#MaLoaiKh').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error2 += '<p>Chưa nhập Mã Loại Khách</p>';
          return false;
        }
      });
      $('#TenLoaiKh').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error2 += '<p>Chưa nhập Tên Loại Khách</p>';
          return false;
        }
      });
      $('#HeSoPhuThu').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error2 += '<p>Chưa nhập Hệ Số Phụ Thu</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error2 == '') {
        $.ajax({
          url: 'access/TDQD2_LoaiKhach_Insert.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error2').html('<div class="alert alert-success">' + data + '</div>');
          }
        })
      } else {
        $('#error2').html('<div class="alert alert-danger">' + error2 + '</div>');
      }
    });

    $("#khachToiDa").on('submit', function() {
      event.preventDefault();
      var error3 = '';
      $('#SoKhachToiDa').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error3 += '<p>Chưa nhập Số khách tối đa</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error3 == '') {
        $.ajax({
          url: 'access/TDQD2_KhachToiDa.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error3').html('<div class="alert alert-success">' + data + '</div>');
          }
        })
      } else {
        $('#error3').html('<div class="alert alert-danger">' + error3 + '</div>');
      }
    });

    $("#phuThuKhachToiDa").on('submit', function(event) {
      event.preventDefault();
      var error4 = '';
      $('#PhuThuKhachToiDa').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error4 += '<p>Chưa nhập Tỉ lệ Phụ thu khách tối đa</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error4 == '') {
        $.ajax({
          url: 'access/TDQD4_PhuThuKhachToiDa.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error4').html('<div class="alert alert-success">' + data + '</div>');
          }
        })
      } else {
        $('#error4').html('<div class="alert alert-danger">' + error4 + '</div>');
      }
    });

    $("#phuThuKhachNN").on('submit', function() {
      event.preventDefault();
      var error5 = '';
      $('#PhuThuKhachNN').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error5 += '<p>Chưa nhập Tỉ lệ Phụ thu khách nước ngoài</p>';
          return false;
        }
        count++;
      });
      var form_data = $(this).serialize();
      if (error5 == '') {
        $.ajax({
          url: 'access/TDQD4_PhuThuKhachNN.php',
          method: 'POST',
          data: form_data,
          success: function(data) {
            $('#error5').html('<div class="alert alert-success">' + data + '</div>');
          }
        })
      } else {
        $('#error5').html('<div class="alert alert-danger">' + error5 + '</div>');
      }
    });

    // -------------------------------------------------------------

    var dataTable1 = $('#sample_data1').DataTable({
      "processing": true,
      "serverSide": true,
      "searching": false,
      "paging": false,
      "info": false,
      "ordering": false,
      "order": [],
      "ajax": {
        url: "access/TDQD1_fetch.php",
        type: "POST"
      }
    });

    var dataTable2 = $('#sample_data2').DataTable({
      "processing": true,
      "serverSide": true,
      "searching": false,
      "paging": false,
      "info": false,
      "ordering": false,
      "order": [],
      "ajax": {
        url: "access/TDQD2_fetch.php",
        type: "POST"
      }
    });

    $('#sample_data1').on('draw.dt', function() {
      $('#sample_data1').Tabledit({
        url: 'access/TDQD1_action.php',
        dataType: 'json',
        columns: {
          identifier: [0, 'MaLoaiPhong'],
          editable: [
            [1, 'TenLoaiPhong'],
            [2, 'DonGiaTieuChuan'],
            // [3, 'SoLuong']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.id).remove();
            $('#sample_data1').ajax.reload();
          }
        }
      });
    });


    $('#sample_data2').on('draw.dt', function() {
      $('#sample_data2').Tabledit({
        url: 'access/TDQD2_action.php',
        dataType: 'json',
        columns: {
          identifier: [0, 'MaLoaiKh'],
          editable: [
            [1, 'TenLoaiKh'],
            [2, 'HeSoPhuThu']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.id).remove();
            $('#sample_data2').DataTable().ajax.reload();
          }
        }
      });
    });
  });
</script>