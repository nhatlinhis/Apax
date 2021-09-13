<html>

<head>
  <title>Báo Cáo Doanh Thu Theo Loại Phòng</title>
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
    <a href="../indexnv.php"><button type="button" id="btn-close" class="btn btn-danger">X</button></a>
    <h1 style="text-align:center">Báo Cáo Doanh Thu Theo Loại Phòng</h1>
    <br/>
    <form id="baocao">
      <div class="col-sm-2" style="padding: 0;">
        <select name="thang" id="thang">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>

        <select name="nam" id="nam">
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
        </select>
      </div>
      <input class="btn btn-success" type="submit" id="LoaiPhongSubmit" value="Xem báo cáo" style="float:right;">
      <br>
    </form>
  <br/>
    <table id="doanh_thu" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>STT</th>
          <th>Loại Phòng</th>
          <th>Doanh Thu</th>
          <th>Tỉ lệ (%)</th>
        </tr>
      </thead>
      <tbody id="ctbc"></tbody>
    </table>
  </div>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>

<script>
  $(document).ready(function() {
    $('#baocao').on('submit', () => {
      event.preventDefault();
      var formData = $('#baocao').serialize();
      $.ajax({
        url: 'BC_fetch.php',
        type: 'POST',
        data: formData,
        success: function(data) {
          $('#ctbc').html(data);
        }
      });
    });
  });
</script>