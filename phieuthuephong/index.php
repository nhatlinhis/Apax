<?php
include('db_connection.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Tạo phiếu thuê phòng</title>
  <style>
    .typeahead {
      border: 2px solid #FFF;
      border-radius: 4px;
      padding: 8px 12px;
      max-width: 300px;
      min-width: 290px;
      background: #fff;
    }

    .tt-menu {
      width: 300px;
    }

    ul.typeahead {
      margin: 0px;
      padding: 10px 0px;
    }

    ul.typeahead.dropdown-menu li a {
      padding: 10px !important;
      border-bottom: #CCC 1px solid;
    }

    ul.typeahead.dropdown-menu li:last-child a {
      border-bottom: 0px !important;
    }

    .demo-label {
      font-size: 1.5em;
      color: black;
      font-weight: 500;
    }

    .dropdown-menu>.active>a,
    .dropdown-menu>.active>a:focus,
    .dropdown-menu>.active>a:hover {
      text-decoration: none;
      background-color: #ddd;
      color: black;
      outline: 0;
    }

    .content {
      background-color: #ffffff;
      display: block;
      width: 80%;
      height: 100%;
      margin: 50px auto;
      /* padding-top: 56px; */
      padding-left: 50px;
      padding-right: 50px;
      padding-bottom: 20px;
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
    <h1 style="text-align:center">Phiếu Thuê Phòng</h1>
    <br />
    <form method="post" id="insert_form">
      <div class="table-repsonsive">
        <div class="form-group">
          <label>Mã Phiếu Thuê</label>
          <input readonly type="text" class="form-control" name="txtMaPhieuThue" id="txtMaPhieuThue">
        </div>
        <div class="form-group">
          <label>Loại Phòng</label>
          <select name="txtLoaiPhong" id="txtLoaiPhong" class="form-control" onchange="getPhuThu()"><?php echo fill_TenLoaiPhong($connect); ?></select>
        </div>
        <div class="form-group">
          <label>Mã Phòng</label>
          <input type="text" class="typehead form-control" placeholder="Vui lòng nhập mã phòng" name="txtMaPhong" id="txtMaPhong" onchange="getDonGia(this.value)">
          <div id="countryList"></div>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Xem phòng
          </button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 style="float:left" class="modal-title" id="exampleModalLabel">Danh sách phòng còn trống</h3>
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
                          <th>Mã Phòng</th>
                          <th>Tên Phòng</th>
                          <th>Ghi Chú</th>
                          <th>Tình Trạng Phòng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include('PT_DMP_fetch.php');
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Đơn giá tiêu chuẩn</label>
          <input readonly type="text" class="form-control" name="txtDonGiaTieuChuan" id="txtDonGiaTieuChuan" onchange="getDonGiaDuocTinh()">
        </div>
        <div class="form-group">
          <label>Ngày Bắt Đầu Thuê</label>
          <br>
          <input type="date" class="form-control" name="txtNgayBdThue" id="txtNgayBdThue">
          <br>
        </div>
        <span id="error"></span>
        <table class="table table-bordered" id="item_table">
          <div id="themKhachError"></div>
          <thead>
            <tr>
              <th style="width:15%">Mã Khách Hàng</th>
              <th style="width:20%">Tên Khách Hàng</th>
              <th style="width:20%">CMND</th>
              <th>Địa Chỉ</th>
              <th>Loại Khách Hàng</th>
              <th><button type="button" name="add" id="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
            </tr>
          </thead>
          <tbody id="tbody1"></tbody>
        </table>
        <div class="form-group">
          <label>Phụ Thu</label>
          <input readonly value="0%" type="text" class="form-control" name="txtPhuThu" id="txtPhuThu" onchange="getDonGiaDuocTinh()">
        </div>
        <div class="form-group">
          <label>Đơn giá được tính</label>
          <input readonly type="text" class="form-control" placeholder="Vui lòng nhập mã phòng và thông tin khách" name="txtDonGiaDuocTinh" id="txtDonGiaDuocTinh">
        </div>
        <div style="text-align:center">
          <input type="submit" name="submit" class="btn btn-info" value="Tạo Phiếu Thuê" />
        </div>
      </div>
    </form>
  </div>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="js/bootstrap.min.css" />
  <script src="js/bootstrap.min.js"></script>
  <script src="js/typehead.js"></script>

</body>

</html>
<script>

  var DonGiaTieuChuan = 0,
    DonGiaDuocTinh = 0;

  function getDonGia(value) {
    var str = String(value);
    $.ajax({
      url: "PT_fetch.php",
      method: "POST",
      dataType: "json",
      data: {
        "txtMaPhong": str
      },
      success: function(data) {
        if (data) {
          $('#txtLoaiPhong').val(data.LoaiPhong);
          $('#txtDonGiaTieuChuan').val(new Intl.NumberFormat('it-IT', {
            style: 'currency',
            currency: 'VND'
          }).format(data.DonGiaTieuChuan));
          getDonGiaDuocTinh(Number(data.DonGiaTieuChuan));
        }
      }
    });
  }

  function getDonGiaDuocTinh(donGia) {
    DonGiaTieuChuan = donGia;
    var x = $('#txtPhuThu').val();
    x = Number(x.replace('%', '')) / 100;
    DonGiaDuocTinh = donGia * (1 + x);
    $('#txtDonGiaDuocTinh').val(new Intl.NumberFormat('it-IT', {
      style: 'currency',
      currency: 'VND'
    }).format(DonGiaDuocTinh));
  }

  var numRow = 0;
  var PhuThuKhachToiDa = <?php echo getPhuThuKhachToiDa($connect); ?>;
  var PhuThuKhachNN = <?php echo getPhuThuKhachNN($connect); ?>;
  PhuThuKhachToiDa = Math.round(Number(PhuThuKhachToiDa) * 100 - 100);
  PhuThuKhachNN = Math.round(Number(PhuThuKhachNN) * 100 - 100);

  var PhuThuArr = <?php echo getPhuThu($connect); ?>;

  var PhuThu = {};

  PhuThu = PhuThuArr.reduce(function(acc, curr) {
    acc[curr.MaLoaiKh] = Number(curr.HeSoPhuThu) * 100 - 100;
    return acc;
  }, {});

  console.log(PhuThu);

  var soKhachToiDa = <?php echo getKhachToiDa($connect); ?>;

  function getPhuThu() {
    var arr = $('.MaLoaiKh');
    var phuThu = 0;
    var checked = []

    for (var i = 0; i < arr.length; i++) {
      var temp = arr[i].value;
      if (checked.indexOf(temp) === -1) {
        phuThu += PhuThu[temp];
        checked.push(temp);
      }
    }
    console.log(phuThu, checked);

    if (numRow === soKhachToiDa) {
      $('#txtPhuThu').val(PhuThuKhachToiDa + phuThu + '%');
    } else {
      $('#txtPhuThu').val(phuThu + '%');
    }

    getDonGiaDuocTinh(Number(DonGiaTieuChuan));
  }

  $(document).ready(function() {
    $('#txtNgayBdThue').val(new Date().toJSON().slice(0, 10));
    $.ajax({
      url: "PT_fetch.php",
      method: "POST",
      dataType: "json",
      data: {
        "txtMaPhieuThue": "TRUE"
      },
      success: function(data) {
        if (data) {
          $('#txtMaPhieuThue').val(data);
        }
      }
    });

    $('#txtMaPhong').attr("autocomplete", "off");
    $('#txtMaPhong').typeahead({
      source: function(query, result) {
        loai = $('#txtLoaiPhong').val();
        $.ajax({
          url: "MP_search.php",
          data: 'query=' + query + '&loai=' + loai,
          dataType: "json",
          type: "POST",
          success: function(data) {
            result($.map(data, function(item) {
              return item;
            }));
          }
        });
      }
    });

    var count = 0;
    var maKhach = <?php echo fill_MaKhach($connect); ?>;
    var tempMaKhach = Number(maKhach);
    $('#add').click(function() {
      if (numRow < soKhachToiDa) {
        maKhach = tempMaKhach + numRow;
        numRow++;
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input readonly type="text" name="txtMaKhachHang[]" class="form-control MaKhachHang" value="' + maKhach + '"/></td>';
        html += '<td><input type="text" name="txtTenKh[]" class="form-control TenKh" /></td>';
        html += '<td><input type="text" name="txtCMND[]" class="form-control CMND" /></td>';
        html += '<td><input type="text" name="txtDiaChi[]" class="form-control DiaChi" /></td>';
        html += '<td><select name="txtMaLoaiKh[]" class="form-control MaLoaiKh"  onchange="getPhuThu()"><?php echo fill_TenLoaiKhach($connect); ?></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('#tbody1').append(html);
      } else {
        $('#themKhachError').html('<div class="alert alert-danger">Vượt quá khách tối đa: ' + soKhachToiDa + '</div>');
      }
      getPhuThu();
    });

    $('#add').click();

    $(document).on('click', '.remove', function() {
      $('#themKhachError').html('');
      $(this).closest('tr').remove();
      numRow--;
      var arr = $('.MaKhachHang');
      console.log(arr);
      for (var i = 0; i < arr.length; i++) {
        arr[i].value = tempMaKhach + i;
      }
      getPhuThu();
    });

    $('#insert_form').on('submit', function(event) {
      event.preventDefault();
      var error = '';
      $('#txtMaPhong').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Mã Phòng</p>';
          return false;
        }
        count = count + 1;
      });
      $('.MaKhachHang').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Mã Khách Hàng</p>';
          return false;
        }
        count = count + 1;
      });
      $('.TenKh').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Tên Khách Hàng</p>';
          return false;
        }
        count = count + 1;
      });

      $('.CMND').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập CMND</p>';
          return false;
        }
        count = count + 1;
      });

      $('.DiaChi').each(function() {
        var count = 1;
        if ($(this).val() == '') {
          error += '<p>Chưa nhập Địa Chỉ</p>';
          return false;
        }
        count = count + 1;
      });

      $('#txtDonGiaTieuChuan').val(DonGiaTieuChuan);
      $('#txtDonGiaDuocTinh').val(DonGiaDuocTinh);

      var form_data = $(this).serialize();

      console.log(form_data);

      if (error == '') {
        $.ajax({
          url: "insert.php",
          method: "POST",
          data: form_data,
          success: function(data) {
            if (data == 'ok') {
              $('#item_table').find('tr:gt(0)').remove();
              $('#error').html('<div class="alert alert-success">Tạo Phiếu Thuê Phòng Thành Công</div>');
            }
          }
        });
      } else {
        $('#error').html('<div class="alert alert-danger">' + error + '</div>');
      }
    });
  });
</script>