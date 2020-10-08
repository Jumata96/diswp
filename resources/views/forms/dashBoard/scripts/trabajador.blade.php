<script type="text/javascript">
  /*
 * Dashboard - eCommerce
 */

//Line chart with color shadow: Revenue for 2017 Chart
var thisYearCTX = document.getElementById("thisYearRevenue").getContext("2d");
var lastYearCTX = document.getElementById("lastYearRevenue").getContext("2d");

Chart.types.Line.extend({
  name: "LineAlt",
  initialize: function() {
    Chart.types.Line.prototype.initialize.apply(this, arguments);

    var ctx = this.chart.ctx;
    var originalStroke = ctx.stroke;
    ctx.stroke = function() {
      ctx.save();
      ctx.shadowColor = 'rgba(156, 46, 157,0.5)';
      ctx.shadowBlur = 20;
      ctx.shadowOffsetX = 2;
      ctx.shadowOffsetY = 20;
      originalStroke.apply(this, arguments)
      ctx.restore();
    }
  }
});

Chart.types.Line.extend({
  name: "LineAlt2",
  initialize: function() {
    Chart.types.Line.prototype.initialize.apply(this, arguments);
    var ctx = this.chart.ctx;
    var originalStroke = ctx.stroke;
    ctx.stroke = function() {
      ctx.save();
      originalStroke.apply(this, arguments)
      ctx.restore();
    }
  }
});

var thisYearData = {
  labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
  datasets: [{
    label: "This year dataset",
    fillColor: "#9C2E9D",
    strokeColor: "#9C2E9D",
    pointColor: "transparent",
    pointStrokeColor: "transparent",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "#9C2E9D",
    data: [
      {{$total_ingresos_mensual[1]}}, 
      {{$total_ingresos_mensual[2]}},
      {{$total_ingresos_mensual[3]}},
      {{$total_ingresos_mensual[4]}},
      {{$total_ingresos_mensual[5]}},
      {{$total_ingresos_mensual[6]}},
      {{$total_ingresos_mensual[7]}},
      {{$total_ingresos_mensual[8]}},
      {{$total_ingresos_mensual[9]}},
      {{$total_ingresos_mensual[10]}},
      {{$total_ingresos_mensual[11]}},
      {{$total_ingresos_mensual[12]}}]

  }]
};

var lastYearData = {
  labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
  datasets: [{
    label: "Last year dataset",
    fillColor: "#E4E4E4",
    strokeColor: "#E4E4E4",
    pointColor: "transparent",
    pointStrokeColor: "transparent",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "#E4E4E4",
    data: [
      {{$total_ingresos_mensual2[1]}}, 
      {{$total_ingresos_mensual2[2]}},
      {{$total_ingresos_mensual2[3]}},
      {{$total_ingresos_mensual2[4]}},
      {{$total_ingresos_mensual2[5]}},
      {{$total_ingresos_mensual2[6]}},
      {{$total_ingresos_mensual2[7]}},
      {{$total_ingresos_mensual2[8]}},
      {{$total_ingresos_mensual2[9]}},
      {{$total_ingresos_mensual2[10]}},
      {{$total_ingresos_mensual2[11]}},
      {{$total_ingresos_mensual2[12]}}]
  }]
};
var thisYearChart = new Chart(thisYearCTX).LineAlt(thisYearData, {
  datasetFill: false,
  scaleShowGridLines: false,

  datasetStrokeWidth: 5,
  scaleFontColor: '#9e9e9e',
  scaleGridLineColor: '#e4e4e4',
  scaleLineColor: 'transparent',
  scaleOverride: true,
  scaleSteps: 5000,
  scaleStepWidth: 50,
  scaleStartValue: 0
});
var lastYearChart = new Chart(lastYearCTX).LineAlt2(lastYearData, {
  datasetFill: false,
  scaleShowVerticalLines: false,
  datasetStrokeWidth: 5,
  scaleFontColor: '#9e9e9e',
  scaleGridLineColor: '#e4e4e4',
  scaleLineColor: 'transparent',
  scaleOverride: true,
  scaleSteps: 5000,
  scaleStepWidth: 50,
  scaleStartValue: 0
});

/*
 * Line chart with shadow: Monthly Earning Chart
 */

var thisYearCTX = document.getElementById("monthlyEarning").getContext("2d");

Chart.types.Line.extend({
  name: "LineSm",
  initialize: function() {
    Chart.types.Line.prototype.initialize.apply(this, arguments);
    var ctx = this.chart.ctx;
    var originalStroke = ctx.stroke;
    ctx.stroke = function() {
      ctx.save();
      ctx.shadowColor = 'rgba(158, 158, 158, 0.6)';
      ctx.shadowBlur = 14;
      ctx.shadowOffsetX = 2;
      ctx.shadowOffsetY = 16;
      originalStroke.apply(this, arguments)
      ctx.restore();
    }
  }
});

//Sampel Line Chart One




$(window).on('load', function() { 
  window.CustomLineChartSampleOne = new Chart(document.getElementById("custom-line-chart-sample-one").getContext("2d")).Line(CustomLineChartSampleOneData, options2);
  window.CustomLineChartSampleTwo = new Chart(document.getElementById("custom-line-chart-sample-two").getContext("2d")).Line(CustomLineChartSampleTwoData, options2);
  window.CustomLineChartSampleThree = new Chart(document.getElementById("custom-line-chart-sample-three").getContext("2d")).Line(CustomLineChartSampleThreeData, options2);
});
</script>