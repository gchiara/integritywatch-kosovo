import jquery from "jquery";
window.jQuery = jquery;
window.$ = jquery;
import "datatables.net";
import "datatables.net-dt";

import underscore from "underscore";
window.underscore = underscore;
window._ = underscore;

import "../public/vendor/js/popper.min.js";
import "../public/vendor/js/bootstrap.min.js";
import { csv } from "d3-request";
import { json } from "d3-request";

import "../public/vendor/css/bootstrap.min.css";
import "../public/vendor/css/dc.css";
import "/scss/main.scss";

import Vue from "vue";
import Loader from "./components/Loader.vue";
import ChartHeader from "./components/ChartHeader.vue";

// Data object - is also used by Vue
var vuedata = {
  platform: "kosovo",
  page: "section2",
  language: "sq",
  stringsData: {},
  defaultLanguage: "sq",
  t: {},
  topBoxReadMore: false,
  lastUpdateDate: "",
  loader: true,
  showInfo: true,
  showShare: true,
  chartMargin: 40,
  dataUpdateDate: "",
  dataYears: [],
  dataYearsButtons: [
    "2025",
    "2024",
    "2023",
    "2022",
    "2021",
    "2020",
    "2019",
    "2018",
    "2017",
    "2016",
  ],
  selectedYear: "",
  charts: {
    years: {
      id: "years",
      title: "",
      info: "i",
    },
    deadline: {
      id: "deadline",
      title: "",
      info: "i",
    },
    negative: {
      id: "negative",
      title: "",
      info: "i",
    },
    values: {
      id: "values",
      title: "",
      info: "i",
    },
    indicators: {
      id: "indicators",
      title: "",
      info: "i",
    },
    hasAwardData: {
      id: "hasAwardData",
      title: "",
      info: "i",
    },
    topAuthsByNum: {
      id: "topAuthsByNum",
      title: "",
      info: "i",
    },
    topAuthsByVal: {
      id: "topAuthsByVal",
      title: "",
      info: "i",
    },
    topTenderersByNum: {
      id: "topTenderersByNum",
      title: "",
      info: "i",
    },
    topTenderersByAwards: {
      id: "topTenderersByAwards",
      title: "",
      info: "i",
    },
    topTenderersByVal: {
      id: "topTenderersByVal",
      title: "",
      info: "i",
    },
    criteria: {
      id: "criteria",
      title: "",
      info: "i",
    },
    methodDetailVal: {
      id: "methodDetailVal",
      title: "",
      info: "i",
    },
    methodDetail: {
      id: "methodDetail",
      title: "",
      info: "i",
    },
    type: {
      id: "type",
      title: "",
      info: "i",
    },
    table: {
      chart: null,
      type: "table",
      title: "",
      info: "i",
    },
  },
  tableColumns: {
    col0: "",
    col1: "",
    col2: "",
    col3: "",
    col4: "",
    col5: "",
    col6: "",
    col7: "",
    col8: "",
  },
  selectedEntry: { Name: "" },
  proceduresRename: {
    "Pregovoracki postupak s prethodnom objavom":
      "Procedurë konkurruese me negociata",
    "Otvoreni natjecaj": "Konkurs Projektimi (e hapur)",
    "Ograniceni postupak": "Procedurë e kufizuar",
    "Ograniceni natjecaj": "Konkurs Projektimi (i mbyllur)",
    "Pregovaracki postupak s prethodnom objavom":
      "Procedurë konkurruese me negociata",
  },
  colors: {
    default: "#009fe2",
    red: "#e83653",
    pieDefault: [
      "#90c6f0",
      "#66ade3",
      "#3b95d0",
      "#4081ae",
      "#3f6990",
      "#395a75",
      "#3b4f6a",
      "#ddd",
    ],
    yesNoPie: {
      Yes: "#009fe2",
      No: "#ddd",
      Po: "#009fe2",
      Jo: "#ddd",
    },
    yesNoPieRed: {
      Yes: "#e83653",
      No: "#ddd",
      Po: "#e83653",
      Jo: "#ddd",
    },
    yesNoPieRedBlue: {
      Yes: "#ddd",
      No: "#e83653",
      Po: "#ddd",
      Jo: "#e83653",
    },
  },
};

//Set vue components and Vue app

Vue.component("chart-header", ChartHeader);
Vue.component("loader", Loader);

var vueApp = new Vue({
  el: "#app",
  data: vuedata,
  methods: {
    //Switch language
    selectLanguage: function(language, changedFromButton) {
      if (this.stringsData[language]) {
        this.language = language;
        this.t = this.stringsData[language];
      } else {
        this.language = this.defaultLanguage;
        this.t = this.stringsData[this.defaultLanguage];
      }
      if (this.t.charts) {
        for (var key in this.t.charts[this.page]) {
          vuedata.charts[key].title = vuedata.t.charts[this.page][key].title;
          vuedata.charts[key].info = vuedata.t.charts[this.page][key].info;
        }
      }
      if (this.t.tables) {
        for (var key in this.t.tables[this.page]) {
          vuedata.tableColumns[key] = vuedata.t.tables[this.page][key];
        }
      }
      if (changedFromButton) {
        var url = new URL(window.location.href);
        url.searchParams.set("l", this.language);
        window.history.pushState(null, "", url.toString());
        window.location.reload();
      }
    },
    //Open share and download modals
    openModal: function(modalId) {
      $("#" + modalId).modal();
    },
    //Download dataset
    downloadDataset: function(format) {
      var csvDatasetPath = "";
      var xlsDatasetPath = "";
      var jsonDatasetPath = "./data/procurement_years/public_procurement_" + this.selectedYear + ".json";
      if (format == "csv") {
        window.open(csvDatasetPath, "_blank");
      }
      if (format == "xls") {
        window.open(xlsDatasetPath, "_blank");
      }
      if (format == "json") {
        window.open(jsonDatasetPath, "_blank");
      }
    },
    //Copy to clipboard
    copyToClipboard: function(elId) {
      var textToCopy = document.getElementById(elId);
      textToCopy.select();
      textToCopy.setSelectionRange(0, 99999);
      document.execCommand("copy");
      console.log("Copied: " + textToCopy.value);
    },
    //Share
    share: function(platform) {
      if (platform == "twitter") {
        var thisPage = window.location.href.split("?")[0];
        var shareText = "" + thisPage;
        var shareURL =
          "https://twitter.com/intent/tweet?text=" +
          encodeURIComponent(shareText);
        window.open(shareURL, "_blank");
        return;
      }
      if (platform == "facebook") {
        var toShareUrl = window.location.href.split("?")[0];
        var shareURL =
          "https://www.facebook.com/sharer/sharer.php?u=" +
          encodeURIComponent(toShareUrl);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250,top=300,left=300"
        );
        return;
      }
      if (platform == "linkedin") {
        var thisPage = window.location.href.split("?")[0];
        var shareText = "" + thisPage;
        var shareURL =
          " https://www.linkedin.com/feed/?shareActive=true&text=" +
          encodeURIComponent(shareText);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes"
        );
      }
      if (platform == "bluesky") {
        var thisPage = window.location.href.split("?")[0];
        var shareText = "" + thisPage;
        var shareURL =
          "https://bsky.app/intent/compose?text=" +
          encodeURIComponent(shareText);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250,top=300,left=300"
        );
        return;
      }
    },
    //Share chart image
    shareChart: function(platform) {
      var chartImageUrl = $("#chartUrlString").val();
      if (platform == "twitter") {
        var shareURL =
          "https://twitter.com/intent/tweet?text=" +
          encodeURIComponent(chartImageUrl);
        window.open(shareURL, "_blank");
        return;
      }
      if (platform == "facebook") {
        var shareURL =
          "https://www.facebook.com/sharer/sharer.php?u=" +
          encodeURIComponent(chartImageUrl);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250,top=300,left=300"
        );
        return;
      }
      if (platform == "linkedin") {
        var shareURL =
          " https://www.linkedin.com/feed/?shareActive=true&text=" +
          encodeURIComponent(chartImageUrl);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes"
        );
      }
      if (platform == "bluesky") {
        var shareURL =
          "https://bsky.app/intent/compose?text=" +
          encodeURIComponent(chartImageUrl);
        window.open(
          shareURL,
          "_blank",
          "toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250,top=300,left=300"
        );
        return;
      }
    },
  },
});

//Initialize info popovers
$(function() {
  $('[data-toggle="popover"]').popover();
});

//Charts
var charts = {
  years: {
    chart: dc.lineChart("#years_chart"),
    type: "line",
    divId: "years_chart",
  },
  deadline: {
    chart: dc.pieChart("#deadline_chart"),
    type: "pie",
    divId: "deadline_chart",
  },
  negative: {
    chart: dc.pieChart("#negative_chart"),
    type: "pie",
    divId: "negative_chart",
  },
  values: {
    chart: dc.rowChart("#values_chart"),
    type: "row",
    divId: "values_chart",
  },
  indicators: {
    chart: dc.pieChart("#indicators_chart"),
    type: "pie",
    divId: "indicators_chart",
  },
  hasAwardData: {
    chart: dc.pieChart("#hasawarddata_chart"),
    type: "pie",
    divId: "hasawarddata_chart",
  },
  topAuthsByNum: {
    chart: dc.rowChart("#topauthsbynum_chart"),
    type: "row",
    divId: "topauthsbynum_chart",
  },
  topAuthsByVal: {
    chart: dc.rowChart("#topauthsbyval_chart"),
    type: "row",
    divId: "topauthsbyval_chart",
  },
  topTenderersByNum: {
    chart: dc.rowChart("#toptenderersbynum_chart"),
    type: "row",
    divId: "toptenderersbynum_chart",
  },
  topTenderersByAwards: {
    chart: dc.rowChart("#toptenderersbyawards_chart"),
    type: "row",
    divId: "toptenderersbyawards_chart",
  },
  topTenderersByVal: {
    chart: dc.rowChart("#toptenderersbyval_chart"),
    type: "row",
    divId: "toptenderersbyval_chart",
  },
  criteria: {
    chart: dc.pieChart("#criteria_chart"),
    type: "pie",
    divId: "criteria_chart",
  },
  methodDetailVal: {
    chart: dc.rowChart("#methoddetailval_chart"),
    type: "row",
    divId: "methoddetailval_chart",
  },
  methodDetail: {
    chart: dc.rowChart("#methoddetail_chart"),
    type: "row",
    divId: "methoddetail_chart",
  },
  type: {
    chart: dc.pieChart("#type_chart"),
    type: "pie",
    divId: "type_chart",
  },
  table: {
    chart: null,
    type: "table",
    divId: "dc-data-table",
  },
};

//Functions for responsivness
var recalcWidth = function(divId) {
  return document.getElementById(divId).offsetWidth - vuedata.chartMargin;
};
var recalcCharsLength = function(width) {
  return parseInt(width / 8);
};
var calcPieSize = function(divId) {
  var newWidth = recalcWidth(divId);
  var sizes = {
    width: newWidth,
    height: 0,
    radius: 0,
    innerRadius: 0,
    cy: 0,
    legendY: 0,
  };
  if (newWidth < 240) {
    sizes.height = newWidth + 170;
    sizes.radius = newWidth / 2;
    sizes.innerRadius = newWidth / 4;
    sizes.cy = newWidth / 2;
    sizes.legendY = newWidth + 30;
  } else {
    sizes.height = newWidth * 0.75 + 170;
    sizes.radius = (newWidth * 0.75) / 2;
    sizes.innerRadius = (newWidth * 0.75) / 4;
    sizes.cy = (newWidth * 0.75) / 2;
    sizes.legendY = newWidth * 0.75 + 30;
  }
  return sizes;
};
var resizeGraphs = function() {
  for (var c in charts) {
    var sizes = calcPieSize(charts[c].divId);
    var newWidth = recalcWidth(charts[c].divId);
    var charsLength = recalcCharsLength(newWidth);
    if (charts[c].type == "row") {
      charts[c].chart.width(newWidth);
      charts[c].chart.label(function(d) {
        var thisKey = d.key;
        if (thisKey.length > charsLength) {
          return thisKey.substring(0, charsLength) + "...";
        }
        return thisKey;
      });
      charts[c].chart.redraw();
    } else if (charts[c].type == "bar") {
      charts[c].chart.width(newWidth);
      charts[c].chart.rescale();
      charts[c].chart.redraw();
    } else if (charts[c].type == "pie") {
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      charts[c].chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey == "Others") {
                thisKey = "Others";
              }
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        );
      charts[c].chart.redraw();
    } else if (charts[c].type == "cloud") {
      charts[c].chart.redraw();
    } else if (charts[c].type == "line") {
      charts[c].chart.width(newWidth);
      charts[c].chart.rescale();
      charts[c].chart.redraw();
    }
  }
};

//X Axis labels for charts
var addXLabel = function(chartToUpdate, displayText) {
  var textSelection = chartToUpdate
    .svg()
    .append("text")
    .attr("class", "x-axis-label")
    .attr("text-anchor", "middle")
    .attr("x", chartToUpdate.width() / 2)
    .attr("y", chartToUpdate.height() + 30)
    .text(displayText);
  var textDims = textSelection.node().getBBox();
  var chartMargins = chartToUpdate.margins();
  // Dynamically adjust positioning after reading text dimension from DOM
  textSelection
    .attr(
      "x",
      chartMargins.left +
        (chartToUpdate.width() - chartMargins.left - chartMargins.right) / 2
    )
    .attr("y", chartToUpdate.height() - Math.ceil(textDims.height) / 2);
};

//Custom date order for dataTables
var dmy = d3.timeParse("%d/%m/%Y");
jQuery.extend(jQuery.fn.dataTableExt.oSort, {
  "date-eu-pre": function(date) {
    return dmy(date);
  },
  "date-eu-asc": function(a, b) {
    return a < b ? -1 : a > b ? 1 : 0;
  },
  "date-eu-desc": function(a, b) {
    return a < b ? 1 : a > b ? -1 : 0;
  },
});

//Custom ordering for formatted values
jQuery.extend(jQuery.fn.dataTableExt.oSort, {
  "formattednum-pre": function(a) {
    if (!a || a == "") {
      return 0;
    }
    var x = a
      .toString()
      .replaceAll(".", "")
      .replaceAll(",", ".");
    return parseFloat(x);
  },
  "formattednum-asc": function(a, b) {
    return a < b ? -1 : a > b ? 1 : 0;
  },
  "formattednum-desc": function(a, b) {
    return a < b ? 1 : a > b ? -1 : 0;
  },
});

var locale = d3.formatLocale({
  decimal: ",",
  thousands: ".",
  grouping: [3],
});

//Format numerical amount string with thousands separators
function formatValueString(x) {
  if (parseInt(x)) {
    return x
      .toString()
      .replace(".", ",")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
  return x;
}
//Format value thousands
function formatValueThousands(x) {
  if (parseInt(x)) {
    if (x > 1000) {
      return (
        "€ " +
        (x / 1000)
          .toString()
          .replace(".", ",")
          .replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
        "k"
      );
    }
    return "€ " + x.toString();
  }
  return x;
}

//Get URL parameters
function getUrlParameter(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var urlYearParam = getUrlParameter("y");
if (urlYearParam && urlYearParam.length == 4) {
  vuedata.selectedYear = urlYearParam;
}

//Load data and generate charts
//Generate random parameter for dynamic dataset loading (to avoid caching)
var randomPar = "";
var randomCharacters =
  "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
for (var i = 0; i < 5; i++) {
  randomPar += randomCharacters.charAt(
    Math.floor(Math.random() * randomCharacters.length)
  );
}

json("./data/strings.json?" + randomPar, (err, stringsData) => {
  //Set language
  vuedata.stringsData = stringsData;
  vueApp.selectLanguage(getUrlParameter("l"), false);
  //Get Dataset path based on selected year
  vuedata.dataYearsButtons = [
    "2025",
    "2024",
    "2023",
    "2022",
    "2021",
    "2020",
    "2019",
    "2018",
    "2017",
    "2016",
  ];
  var datasetPath = "";
  if(vuedata.selectedYear == "" || vuedata.dataYearsButtons.indexOf(vuedata.selectedYear) == -1) {
    vuedata.selectedYear = "2025";
  }
  if (
    vuedata.selectedYear !== "" &&
    vuedata.dataYearsButtons.indexOf(vuedata.selectedYear) > -1
  ) {
    datasetPath =
      "procurement_years/public_procurement_" + vuedata.selectedYear + ".json";
  }
  //Load data
  json("./data/" + datasetPath + "?" + randomPar, (err, jsonData) => {
    var mainData = jsonData;
    var awardsData = [];
    //Filter by year if year is selected
    if (vuedata.selectedYear !== "") {
      mainData = _.filter(jsonData, function(d) {
        return d.year == vuedata.selectedYear;
      });
    }
    //Parse data
    var years = [];
    _.each(mainData, function(d) {
      //Extract years
      d.year = parseInt(d.year);
      if (years.indexOf(d.year) == -1) {
        years.push(d.year);
      }
      //Create risk indicators array for indicators row chart
      d.riskindicators = [];
      if (d.winnersOwnedByPublicOfficials.length > 0) {
        d.riskindicators.push("winnersOwnedByPublicOfficials");
      }
      //Value
      d.tenderValue = 0;
      if (d.value.amt && !isNaN(d.value.amt)) {
        if (d.id == "617-24-13622-2-1-1" && d.value.amt == 200000000) {
          d.value.amt = 200000;
        }
        d.tenderValue = d.value.amt;
      }
      //Clean tot awarded amount
      if (d.totAwardAmount) {
        d.totAwardAmount = d.totAwardAmount.toFixed(2);
      }
      //Method
      d.methodCleaned = "N/A";
      if (d.method) {
        d.methodCleaned = d.method;
      }
      //Renaming method detail
      if (vuedata.proceduresRename[d.methodDetails]) {
        d.methodDetails = vuedata.proceduresRename[d.methodDetails];
      }
      //Tenderers
      d.tenderers = _.filter(d.tenderers, function(t) {
        return t !== "" && t !== null;
      });
      //Winners
      d.awardWinners = [];
      d.awardWinnersValueData = [];
      if (d.awards) {
        if (d.awards.length > 0) {
          d.hasAwardData = true;
        }
        _.each(d.awards, function(a) {
          _.each(a.suppliers, function(s) {
            if (s !== null && s !== "") {
              d.awardWinners.push(s);
              d.awardWinnersValueData.push({ supplier: s, val: a.val, c: a.c });
              awardsData.push({
                tenderId: d.id,
                supplier: s,
                val: a.val,
                c: a.c,
              });
            }
          });
        });
      }
      d.awardWinners = _.uniq(d.awardWinners);
    });
    years.sort();
    vuedata.dataYears = years;

    //Set dc main vars
    var ndx = crossfilter(mainData);
    var ndxAwards = crossfilter(awardsData);
    var searchDimension = ndx.dimension(function(d) {
      var entryString =
        "" +
        d.title +
        " " +
        d.id +
        " " +
        d.entity.toString() +
        " " +
        d.tenderers.toString();
      return entryString.toLowerCase();
    });

    var idDimension = ndx.dimension(function(d) {
      return d.id;
    });
    var idDimensionAwards = ndxAwards.dimension(function(d) {
      return d.tenderId;
    });

    //CHART 1 - YEARS
    var createYearsChart = function() {
      var chart = charts.years.chart;
      var dimension = ndx.dimension(function(d) {
        return d.year;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var width = recalcWidth(charts.years.divId);
      var order = vuedata.dataYears;
      chart
        .width(width)
        .height(290)
        .group(group)
        .dimension(dimension)
        .elasticY(true)
        .renderArea(true)
        .on("preRender", function(chart, filter) {})
        .margins({ top: 30, right: 20, bottom: 20, left: 40 })
        .x(d3.scaleBand().domain(order))
        .xUnits(dc.units.ordinal)
        .elasticY(true)
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        });
      chart.yAxis().tickFormat(function(d) {
        return formatValueString(d) + "";
      });
      chart.render();
    };

    //CHART 2 - SHORTENED DEADLINE
    var createDeadlineChart = function() {
      var chart = charts.deadline.chart;
      var dimension = ndx.dimension(function(d) {
        if (d.shortDeadline) {
          return vuedata.t.charts.general.yes;
        }
        return vuedata.t.charts.general.no;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.deadline.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .group(group)
        .colorCalculator(function(d, i) {
          return vuedata.colors.yesNoPieRed[d.key];
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 2B - NEGATIVE DURATION
    var createNegativeChartChart = function() {
      var chart = charts.negative.chart;
      var dimension = ndx.dimension(function(d) {
        if (d.negativeDuration) {
          return vuedata.t.charts.general.yes;
        }
        return vuedata.t.charts.general.no;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.negative.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .group(group)
        .colorCalculator(function(d, i) {
          return vuedata.colors.yesNoPieRed[d.key];
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 3 - VALUE RANGES
    var createValuesChart = function() {
      var chart = charts.values.chart;
      var dimension = ndx.dimension(function(d) {
        return d.valueCategory;
      }, false);
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(20).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.values.divId);
      var charsLength = recalcCharsLength(width);
      var order = [
        "Vlerë e madhe",
        "Vlerë e mesme",
        "Vlerë e vogël",
        "Vlerë minimale",
        "N/A",
      ];
      chart
        .width(width)
        .height(370)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .gap(20)
        .ordering(function(d) {
          return order.indexOf(d.key);
        })
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 4 - RISK INDICATORS
    var createIndicatorsChart = function() {
      var chart = charts.indicators.chart;
      var dimension = ndx.dimension(function(d) {
        if (
          d.winnersOwnedByPublicOfficials &&
          d.winnersOwnedByPublicOfficials.length > 0
        ) {
          return vuedata.t.charts.general.yes;
        }
        return vuedata.t.charts.general.no;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.indicators.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .group(group)
        .colorCalculator(function(d, i) {
          return vuedata.colors.yesNoPieRed[d.key];
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 5 - HAS AWARD DATA
    var createHasAwardDataChart = function() {
      var chart = charts.hasAwardData.chart;
      var dimension = ndx.dimension(function(d) {
        if (d.hasAwardData) {
          return vuedata.t.charts.general.yes;
        }
        return vuedata.t.charts.general.no;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.hasAwardData.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .group(group)
        .colorCalculator(function(d, i) {
          return vuedata.colors.yesNoPieRedBlue[d.key];
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 6 - TOP CONTRACTING AUTHORITIES BY TENDERS NUM
    var createTopAuthsByNumChart = function() {
      var chart = charts.topAuthsByNum.chart;
      var dimension = ndx.dimension(function(d) {
        return d.entity;
      }, true);
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.topAuthsByNum.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(355)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 7 - TOP CONTRACTING AUTHORITIES BY TENDERS VAL
    var createTopAuthsByValChart = function() {
      var chart = charts.topAuthsByVal.chart;
      var dimension = ndx.dimension(function(d) {
        return d.entity;
      }, true);
      var group = dimension.group().reduceSum(function(d) {
        return d.tenderValue;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.topAuthsByVal.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(355)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return d.key + ": " + formatValueString(d.value.toFixed(2)) + " €";
        })
        .elasticX(true)
        .xAxis()
        .ticks(3)
        .tickFormat(function(d) {
          return formatValueThousands(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 8 - TOP TENDERERS BY TENDERS NUM
    var createTopTenderersByNumChart = function() {
      var chart = charts.topTenderersByNum.chart;
      var dimension = ndx.dimension(function(d) {
        return d.tenderers;
      }, true);
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.topTenderersByNum.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(370)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 9 - TOP TENDERERS BY AWARDS
    var createTopTenderersByAwardsChart = function() {
      var chart = charts.topTenderersByAwards.chart;
      var dimension = ndx.dimension(function(d) {
        return d.awardWinners;
      }, true);
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.topTenderersByAwards.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(370)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 10 - TOP TENDERERS BY AWARDED AMOUNT
    /* Custom reduce functions */
    var createTopTenderersByValChart = function() {
      var chart = charts.topTenderersByVal.chart;
      var dimension = ndxAwards.dimension(function(d) {
        return d.supplier;
      }, false);
      var group = dimension.group().reduceSum(function(d) {
        if (!d.val || isNaN(d.val)) {
          return 0;
        }
        return d.val;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            if (idDimensionAwards.top(Infinity).length == 0) {
              return [];
            }
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.topTenderersByVal.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(370)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return d.key + ": " + formatValueString(d.value.toFixed(2)) + " €";
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterMainDataByAwardsChart();
      });
    };

    //CHART 11 - AWARD CRITERIA
    var createCriteriaChart = function() {
      var chart = charts.criteria.chart;
      var dimension = ndx.dimension(function(d) {
        return d.criteria;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.criteria.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .ordinalColors(vuedata.colors.pieDefault)
        .group(group);
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 12 - PROCUREMENT METHOD DETAIL BY VAL
    var createMethodDetailValChart = function() {
      var chart = charts.methodDetailVal.chart;
      var dimension = ndx.dimension(function(d) {
        return d.methodDetails;
      }, false);
      var group = dimension.group().reduceSum(function(d) {
        return d.tenderValue;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.methodDetailVal.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(350)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return d.key + ": " + formatValueString(d.value.toFixed(2)) + " €";
        })
        .elasticX(true)
        .xAxis()
        .ticks(3)
        .tickFormat(function(d) {
          return formatValueThousands(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 13 - PROCUREMENT METHOD DETAIL
    var createMethodDetailChart = function() {
      var chart = charts.methodDetail.chart;
      var dimension = ndx.dimension(function(d) {
        return d.methodDetails;
      }, false);
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var filteredGroup = (function(source_group) {
        return {
          all: function() {
            return source_group.top(10).filter(function(d) {
              return d.value != 0;
            });
          },
        };
      })(group);
      var width = recalcWidth(charts.methodDetail.divId);
      var charsLength = recalcCharsLength(width);
      chart
        .width(width)
        .height(350)
        .margins({ top: 0, left: 0, right: 0, bottom: 20 })
        .group(filteredGroup)
        .dimension(dimension)
        .colorCalculator(function(d, i) {
          return vuedata.colors.default;
        })
        .label(function(d) {
          if (d.key.length > charsLength) {
            return d.key.substring(0, charsLength) + "...";
          }
          return d.key;
        })
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .elasticX(true)
        .xAxis()
        .ticks(4)
        .tickFormat(function(d) {
          return formatValueString(d) + "";
        });
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //CHART 14 - PROCUREMENT TYPE
    var createTypeChart = function() {
      var chart = charts.type.chart;
      var dimension = ndx.dimension(function(d) {
        return d.category;
      });
      var group = dimension.group().reduceSum(function(d) {
        return 1;
      });
      var sizes = calcPieSize(charts.type.divId);
      var legendMaxChars = 40;
      if (sizes.width > 425) {
        legendMaxChars = 70;
      }
      chart
        .width(sizes.width)
        .height(sizes.height)
        .cy(sizes.cy)
        .innerRadius(sizes.innerRadius)
        .radius(sizes.radius)
        .cap(7)
        .legend(
          dc
            .legend()
            .x(0)
            .y(sizes.legendY)
            .gap(10)
            .autoItemWidth(true)
            .horizontal(false)
            .legendWidth(sizes.width)
            .legendText(function(d) {
              var thisKey = d.name;
              if (thisKey.length > legendMaxChars) {
                return thisKey.substring(0, legendMaxChars) + "...";
              }
              return thisKey;
            })
        )
        .title(function(d) {
          return (
            d.key +
            ": " +
            formatValueString(d.value) +
            " " +
            vuedata.t.charts.general.tenders
          );
        })
        .label(function(d) {
          var percent =
            d.value /
            group.all().reduce(function(a, v) {
              return a + v.value;
            }, 0);
          percent = percent * 100;
          return percent.toFixed(1).replace(".", ",") + " %";
        })
        .dimension(dimension)
        .ordinalColors(vuedata.colors.pieDefault)
        .group(group);
      chart.render();
      chart.on("filtered", function(c) {
        filterAwardsData();
      });
    };

    //TABLE
    var createTable = function() {
      var count = 0;
      charts.table.chart = $("#dc-data-table").dataTable({
        language: vuedata.t.tables.language,
        columnDefs: [
          {
            searchable: false,
            orderable: false,
            targets: 0,
            data: function(row, type, val, meta) {
              return count;
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 1,
            defaultContent: "N/A",
            data: function(d) {
              return d.id;
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 2,
            defaultContent: "N/A",
            data: function(d) {
              return d.title;
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 3,
            defaultContent: "N/A",
            data: function(d) {
              if (d.entity) {
                return d.entity.join(", ");
              }
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 4,
            defaultContent: "N/A",
            data: function(d) {
              return d.category;
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 5,
            defaultContent: "N/A",
            data: function(d) {
              return d.method;
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 6,
            defaultContent: "N/A",
            type: "formattednum",
            data: function(d) {
              if (d.value) {
                return formatValueString(d.value.amt.toFixed(2));
              }
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 7,
            defaultContent: "N/A",
            type: "formattednum",
            data: function(d) {
              return formatValueString(d.totAwardAmount);
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 8,
            defaultContent: "N/A",
            data: function(d) {
              if (d.awardWinners && d.awardWinners.length > 0) {
                return d.awardWinners.join(", ");
              }
              return "/";
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 9,
            defaultContent: "N/A",
            data: function(d) {
              if (
                d.publicOfficialsRelatedToWinners &&
                d.publicOfficialsRelatedToWinners.length > 0
              ) {
                return d.publicOfficialsRelatedToWinners.join(", ");
              }
              return "/";
            },
          },
          {
            searchable: false,
            orderable: true,
            targets: 10,
            defaultContent: "N/A",
            data: function(d) {
              if (d.tenderPeriod) {
                return d.tenderPeriod.start;
              }
            },
          },
        ],
        iDisplayLength: 25,
        bPaginate: true,
        bLengthChange: true,
        bFilter: false,
        order: [[1, "desc"]],
        bSort: true,
        bInfo: true,
        bAutoWidth: false,
        bDeferRender: true,
        aaData: searchDimension.top(Infinity),
        bDestroy: true,
      });
      var datatable = charts.table.chart;
      datatable.on("draw.dt", function() {
        var PageInfo = $("#dc-data-table")
          .DataTable()
          .page.info();
        datatable
          .DataTable()
          .column(0, { page: "current" })
          .nodes()
          .each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
          });
      });
      datatable.DataTable().draw();

      $("#dc-data-table tbody").on("click", "tr", function() {
        var data = datatable
          .DataTable()
          .row(this)
          .data();
        vuedata.selectedEntry = data;
        $("#detailsModal").modal();
      });
    };

    //REFRESH TABLE
    function RefreshTable() {
      dc.events.trigger(function() {
        var alldata = searchDimension.top(Infinity);
        charts.table.chart.fnClearTable();
        charts.table.chart.fnAddData(alldata);
        charts.table.chart.fnDraw();
      });
    }

    //SEARCH INPUT FUNCTIONALITY
    var typingTimer;
    var doneTypingInterval = 1000;
    var $input = $("#search-input");
    $input.on("keyup", function() {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });
    $input.on("keydown", function() {
      clearTimeout(typingTimer);
    });
    function doneTyping() {
      var s = $input.val().toLowerCase();
      searchDimension.filter(function(d) {
        return d.indexOf(s) !== -1;
      });
      filterAwardsData(false);
      throttle();
      var throttleTimer;
      function throttle() {
        window.clearTimeout(throttleTimer);
        throttleTimer = window.setTimeout(function() {
          dc.redrawAll();
        }, 250);
      }
    }

    //Filter Awards Data
    var filterAwardsData = function() {
      var filteredIds = [];
      _.each(idDimension.top(Infinity), function(d) {
        filteredIds.push(d.id);
      });
      idDimensionAwards.filterFunction(function(k) {
        return filteredIds.includes(k);
      });
      dc.redrawAll();
    };

    //Filter Awards Data
    var filterMainDataByAwardsChart = function(redraw = true) {
      var filteredIds = [];
      _.each(idDimensionAwards.top(Infinity), function(d) {
        filteredIds.push(d.tenderId);
      });
      idDimension.filterFunction(function(k) {
        return filteredIds.includes(k);
      });
      if (redraw) {
        dc.redrawAll();
      }
    };

    //Reset charts
    var resetGraphs = function() {
      for (var c in charts) {
        if (charts[c].type !== "table" && charts[c].chart.hasFilter()) {
          charts[c].chart.filterAll();
        }
      }
      searchDimension.filter(null);
      idDimension.filter(null);
      idDimensionAwards.filter(null);
      $("#search-input").val("");
      dc.redrawAll();
    };
    $(".reset-btn").click(function() {
      resetGraphs();
    });

    //Render charts
    createYearsChart();
    createDeadlineChart();
    createNegativeChartChart();
    createValuesChart();
    createIndicatorsChart();
    createHasAwardDataChart();
    createTopAuthsByNumChart();
    createTopAuthsByValChart();
    createTopTenderersByNumChart();
    createTopTenderersByAwardsChart();
    createTopTenderersByValChart();
    createCriteriaChart();
    createMethodDetailValChart();
    createMethodDetailChart();
    createTypeChart();
    createTable();

    $(".dataTables_wrapper").append($(".dataTables_length"));

    //Hide loader
    vuedata.loader = false;

    //COUNTERS
    //Main counter
    var all = ndx.groupAll();
    var counter = dc
      .dataCount(".dc-data-count")
      .dimension(ndx)
      .group(all)
      .formatNumber(locale.format(",d"));
    counter.render();
    counter.on("renderlet.resetall", function(c) {
      RefreshTable();
    });

    //Window resize function
    window.onresize = function(event) {
      resizeGraphs();
    };
  });
});
