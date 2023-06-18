<?php
include_once '../connectdb.php';
session_start();

include_once'header.php';

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <h1><?php echo $_SESSION['restaurant']; ?></h1>
          <div class="card card-outline">



        <div class="card-body">
          <div class="row">


            <div class="col-6 col-md-3 text-center">
              <?php
              $restaurant = $_SESSION['restaurant'];

              $select1 = $pdo->prepare("select Count(userid) AS numbers1 from tbl_catering_order_details where restaurant='$restaurant' and status ='Canceled'");

              $select1->execute();
              $row1=$select1->fetch(PDO::FETCH_OBJ);

              $numbers1 =($row1->numbers1);


              ?>
              <input type="text" class="knob" value="<?php echo $numbers1; ?>" data-width="120" data-height="120"
                     data-fgColor="#3c8dbc">

              <div class="knob-label">Canceled Orders*</div>
            </div>
            <!-- ./col -->
            <div class="col-6 col-md-3 text-center">
              <?php

              $select = $pdo->prepare("select Count(userid) AS numbers from tbl_catering_order_details where restaurant='$restaurant' and status ='delivered'");

              $select->execute();
              $row=$select->fetch(PDO::FETCH_OBJ);

              $numbers =($row->numbers);


              ?>
              <input type="text" class="knob" value="<?php echo $numbers; ?>" data-width="120" data-height="120"
                     data-fgColor="#f56954">

              <div class="knob-label">Delivered Orders*</div>
            </div>
            <!-- ./col -->

            <div class="col-6 col-md-3 text-center">
              <?php

              $select2 = $pdo->prepare("select Count(userid) AS numbers2 from tbl_catering_order_details where restaurant='$restaurant' and status ='full_payment'");

              $select2->execute();
              $row2=$select2->fetch(PDO::FETCH_OBJ);

              $numbers2 =($row2->numbers2);


              ?>
              <input type="text" class="knob" value="<?php echo $numbers2; ?>" data-width="120" data-height="120"
                     data-fgColor="#00a65a">

              <div class="knob-label">Total Number of Orders (Fully paid)</div>
            </div>
            <!-- ./col -->

            <div class="col-6 col-md-3 text-center">
              <?php

              $select3 = $pdo->prepare("select Count(userid) AS numbers3 from tbl_catering_order_details where restaurant='$restaurant'");

              $select3->execute();
              $row3=$select3->fetch(PDO::FETCH_OBJ);

              $numbers3 =($row3->numbers3);


              ?>
              <input type="text" class="knob" value="<?php echo $numbers3; ?>" data-width="120" data-height="120"
                     data-fgColor="#00c0ef">

              <div class="knob-label">Total Orders</div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>


        <div class="row">




          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">


              <div class="card-header">
                <h3 class="card-title">Area Chart for Best Selling Product</h3>

                <div class="card-tools">

                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>

          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">


                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
			 

              <!-- /.card-body -->
            </div>
            </div>
			
            </div>
			 <?php   $select3 = $pdo->prepare("select SUM(grand_total) AS numbers30 from tbl_catering_order_details where restaurant='$restaurant' and status != 'Canceled'");

              $select3->execute();
              $row3=$select3->fetch(PDO::FETCH_OBJ);

              $numbers3 =($row3->numbers30); ?>
			  <h1 style="margin-left: 20px;">  Grand Total Sales: PHP <?php echo $numbers3;?></h1>





        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->

    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->

    <!-- AdminLTE for demo purposes -->
    <!-- jQuery Knob -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>

<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

  })

</script>


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------


    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

var areaChartData = {
  <?php
  $restaurant;
  $select = $pdo->prepare("SELECT count(id) AS total, restaurant, foodid FROM `tbl_orders` WHERE restaurant = '$restaurant' GROUP BY foodid ;");
  $select->execute();
  $labels = array();
  $data = array();

  while ($row = $select->fetch(PDO::FETCH_OBJ)) {
    $foodid = $row->foodid;
    $select1 = $pdo->prepare("SELECT * FROM `tbl_foodmenu` WHERE foodid = $foodid ;");
    $select1->execute();
    $row1 = $select1->fetch(PDO::FETCH_OBJ);
    $labels[] = $row1->food;
    $data[] = $row->total;
  }

  $chartLabels = implode("', '", $labels);
  $chartData = implode(", ", $data);
  ?>

  labels: [<?php echo "'" . implode("', '", $labels) . "'"; ?>],
  datasets: [
    {
      label               : 'Grand Total Sales',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius         : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [<?php echo $chartData; ?>]
    }
  ]
}

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
<?php
$months = array(
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December'
);

$data = array();
foreach ($months as $month) {
  $select = $pdo->prepare("SELECT SUM(grand_total) AS total FROM tbl_catering_order_details WHERE MONTHNAME(date_of_reservation) = ? and status !='Canceled';");
  $select->execute([$month]);
  $row = $select->fetch(PDO::FETCH_OBJ);
  $data[] = $row->total;
}

$chartData = implode(", ", $data);
?>

var lineChartData = {
  labels: <?php echo json_encode($months); ?>,
  datasets: [
    {
      label: 'Digital Goods',
      fillColor: 'rgba(60,141,188,0.9)',
      strokeColor: 'rgba(60,141,188,0.8)',
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: [<?php echo $chartData; ?>]
    }
  ]
};

    lineChartData.datasets[0].fill = false;

    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })



    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


  })
</script>



  <!-- Main Footer -->
  <?php

include_once 'footer.php';

   ?>
