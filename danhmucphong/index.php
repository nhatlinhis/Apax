<?php
include('DMP_insert/db_connection.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Danh mục phòng</title>
  <style>
    .content {
      background-color: #ffffff;
      display: block;
      width: 80%;
      height: 100%;
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
    <h1 style="text-align:center">Tạo Phòng</h1>
    <br />
    <form method="post" id="insert_form">
      <div class="table-repsonsive">
        <span id="error"></span>
        <div id="themPhongError"></div>
        <table class="table table-bordered" id="item_table" name="tbTaoPhong">
          <thead>
            <tr>
              <th style="width:15%">Mã Phòng</th>
              <th style="width:15%">Tên Phòng</th>
              <th>Loại Phòng</th>
              <th>Tình Trạng Phòng</th>
              <th>Ghi Chú</th>
              <th><button type="button" name="btnThemhangTP" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span> Thêm phòng</button></th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
        <div style="text-align:center">
          <input type="submit" name="btnLuuTP" class="btn btn-info" value="Lưu" />
        </div>
      </div>
    </form>
    <br>
    <br>
    <br>
    <div style="border-bottom: 0.4px solid #D9D9D9"></div>
    <br>
    <br>
    <br>
    <br>
    <span id="error"></span>
    <!-- START: Edit - Delete -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 style="text-align:center">Bảng chi tiết phòng</h1>
      </div>

      <div class="panel-body">
        <div class="table-responsive">
          <table id="sample_data" class="table table-bordered table-striped" name="tbBangChiTietPhong">
            <thead>
              <tr>
                <th>Mã Phòng</th>
                <th>Tên Phòng</th>
                <th>Loại Phòng</th>
                <th>Tình Trạng Phòng</th>
                <th>Ghi Chú</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END: Edit - Delete -->
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
<!-- for edit & delete -->
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    var dataTable = $('#sample_data').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        url: "DMP_edit_del/DMP_fetch.php",
        type: "POST"
      }
    });

    $('#sample_data').on('draw.dt', function() {
      $('#sample_data').Tabledit({
        url: 'DMP_edit_del/DMP_action.php',
        dataType: 'json',
        columns: {
          identifier: [0, 'txtMaPhongSX'],
          editable: [
            [1, 'txtTenPhongSX'],
            // [2, 'cbMaLoaiPhongSX', '{"A":"Loại phòng A","B":"Loại phòng B","C":"Loại phòng C"}'],
            [3, 'cbTinhTrangPhongSX', '{"0":"Còn trống","2":"Đang sửa"}'],
            [4, 'txtGhiChuSX']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.id).remove();
            $('#sample_data').DataTable().ajax.reload();
          }
        }
      });
    });
  });
</script>

<!-- for insert -->
<script>
  $(document).ready(function() {
    var numRow = 0;
    var maPhong = <?php echo fill_MaPhong($connect); ?>;
    var tmpMaPhong = Number(maPhong);
    var soPhongToiDa = <?php echo getPhongToiDa($connect); ?>;
    $(document).on('click', '.add', function() {
      if (numRow + tmpMaPhong <= soPhongToiDa) {
        numRow++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="txtMaPhongTP[]" class="form-control txtMaPhongTP"/></td>';
        html += '<td><input type="text" name="txtTenPhongTP[]" class="form-control txtTenPhongTP"/></td>';
        html += '<td><select name="cbMaLoaiPhongTP[]" class="form-control cbMaLoaiPhongTP"><?php echo fill_select_box($connect, "0"); ?></select></td>';
        html += '<td><select name="cbTinhTrangPhongTP[]" class="form-control cbTinhTrangPhongTP"><?php echo fill_select_box($connect, "1"); ?></select></td>';
        html += '<td><input type="text" name="txtGhiChuTP[]" class="form-control txtGhiChuTP"/></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('#tbody').append(html);
      } else {
        $('#themPhongError').html('<div class="alert alert-danger">Vượt quá số phòng tối đa: ' + soPhongToiDa + '</div>');
      }
    });

    $(document).on('click', '.remove', function() {
      $(this).closest('tr').remove();
    });

    $('#insert_form').on('submit', function(event) {
      event.preventDefault();
      var error = '';
      $('.txtMaPhongTP').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Mã Phòng</p>';
          return false;
        }
        count++;
      });
      $('.txtTenPhongTP').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Tên Phòng</p>';
          return false;
        }
        count++;
      });

      var form_data = $(this).serialize();
      if (error == '') {
        $.ajax({
          url: "DMP_insert/DMP_action_insert.php",
          method: "POST",
          data: form_data,
          success: function(data) {
            if (data == 'ok') {
              $('#item_table').find('tr:gt(0)').remove();
              $('#error').html('<div class="alert alert-success">Dữ liệu đã được thêm vào</div>');
            } else {
              $('#error').html('<div class="alert alert-danger">' + data + '</div>');
            }
          }
        });
      } else {
        $('#error').html('<div class="alert alert-danger">' + error + '</div>');
      }
    });
  });
</script>