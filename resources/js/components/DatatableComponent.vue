<style scoped>
.hello {
  width: 100%;
  height: 500px;
}
#chartdiv {
  width: 100%;
  height: 300px;
}

#segundoGrafico {
  width: 100%;
  height: 400px;
}
</style>

<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage">

        </bootstrap-4-datatable>

        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>

        <label for="estados">Filtro por Estados</label>
        <select v-model="estadoSeleccionado" name="estados" id="estados">
            <option v-for="estado in estados">{{ estado }}</option>
        </select>

        <div id="chartdiv" ref="chartdiv"></div>
        <div id="segundoGrafico" ref="chartdiv"></div>

    </div>


</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

export default{
    data(){
        return{
            columns: [{
                label:'id',
                field: 'id',
            },
            {
                label:'nombre',
                field: 'nombre',
            },
            {
                label:'poblacion',
                field: 'poblacion',
            },
            {
                label:'Codigo',
                field: 'Codigo',
            }
        ],
        rows:[],
        page:1,
        filter:'',
        perPage:10,
        dataCovid:[],
        estadoSeleccionado:{},
        estados:[]
        }

    },
    methods:{
        showEstados:function(){
            axios.get('/estados/getEstados').then(function(response){
                this.rows = response.data;

                this.rows.forEach(estado => {
                    this.estados.push(estado.nombre);
                });
            }.bind(this));
        },
        showDataCovid:function(){
            axios.get('/estados/datosCovid').then(function(response){
                this.dataCovid = response.data;

                this.showGrafico(this.dataCovid);
            }.bind(this));
        },
        showGrafico:function(data){
            var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = data;

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeOpacity = 1;
valueAxis.renderer.grid.template.stroke = am4core.color("#A0CA92");
valueAxis.renderer.grid.template.strokeWidth = 2;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "category";
series.name = "Sales";
        }
    },
   created:function(){
    this.showEstados();
    this.showDataCovid();
   },
   mounted() {
    var chart = am4core.create("segundoGrafico", am4charts.XYChart);

// Add data
chart.data = [{
  "mes": "Enero",
  "confirmados":10,
  "defunciones": 15,
  "sospechosos": 22,
  "negativos": 23
}, {
    "mes": "Febrero",
  "confirmados":34,
  "defunciones": 25,
  "sospechosos": 23,
  "negativos": 21
}, {
    "mes": "Marzo",
  "confirmados":12,
  "defunciones": 23,
  "sospechosos": 24,
  "negativos": 24
}];

chart.legend = new am4charts.Legend();
chart.legend.position = "right";

// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "mes";
categoryAxis.renderer.grid.template.opacity = 0;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.renderer.grid.template.opacity = 0;
valueAxis.renderer.ticks.template.strokeOpacity = 0.5;
valueAxis.renderer.ticks.template.stroke = am4core.color("#495C43");
valueAxis.renderer.ticks.template.length = 10;
valueAxis.renderer.line.strokeOpacity = 0.5;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.renderer.minGridDistance = 40;
valueAxis.calculateTotals = true;

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = field;
  series.dataFields.categoryY = "mes";
  series.stacked = true;
  series.name = name;
  
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.locationX = 0.5;
  labelBullet.label.text = "{valueX}";
  labelBullet.label.fill = am4core.color("#fff");

  return series;
}

// some space needed for the total label
categoryAxis.renderer.labels.template.marginRight = 40;
// this is the total label series, it is invisible
var series = createSeries("empty", "empty");
// hidden in legend
series.hiddenInLegend = true;
// bullets can't be masked
series.maskBullets = false;

var bullet = series.bullets.getIndex(0);
bullet.label.text = "[bold]{valueX.total.formatNumber('#.#')}[/]";
bullet.label.truncate = false;
bullet.label.fill = new am4core.InterfaceColorSet().getFor("text");
bullet.label.paddingRight = 10;
bullet.label.horizontalCenter = "right";

createSeries("confirmados", "Confirmados");
createSeries("defunciones", "Defunciones");
createSeries("sospechosos", "Sospechosos");
createSeries("negativos", "Negativos");
  }

}

</script>