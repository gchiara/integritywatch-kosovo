<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'gtag.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Integrity Watch Kosovo</title>
  <meta property="og:url" content="" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Integrity Watch Kosovo" />
  <meta property="og:description" content="Integrity Watch Kosovo" />
  <meta property="og:image" content="" />
  <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800" rel="stylesheet">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="static/partyfinance.css?v=8">
</head>
<body>
    <div id="app" class="section1-page" v-cloak>   
      <?php include 'header.php' ?>
      <!-- TOP AREA -->
      <div class="container-fluid top-description-container" v-if="showInfo">
        <div class="row">
          <div class="col-md-12 top-description-content">
            <div class="top-description-text" v-if="t.sectionInfo">
              <h1>{{t.sectionInfo.section3.title}}</h1>
              <h2>{{t.sectionInfo.section3.sectionTitle}}</h2>
              <div v-html="t.sectionInfo.section3.description"></div>
              <p v-show="topBoxReadMore">{{t.sectionInfo.section3.descriptionMore}}</p>
              <p v-show="topBoxReadMore == false" v-if="t.sectionInfo.section3.descriptionMore.length > 0">
                <button class="read-more-link" @click="topBoxReadMore = true">{{t.sectionInfo.readMore}}</button>
              <p>
              <div class="topbox-buttons-container">
                <button class="topbox-modal-btn" @click="openModal('pageShareModal')"><i class="material-icons">share</i><span class="reset-btn-text">{{t.sectionInfo.share}}</span></button>
                <button class="topbox-modal-btn" @click="downloadDataset('csv')"><i class="material-icons">download</i><span class="reset-btn-text">{{t.sectionInfo.downloadData}} (csv)</span></button>
                <button class="topbox-modal-btn" @click="downloadDataset('xls')"><i class="material-icons">download</i><span class="reset-btn-text">{{t.sectionInfo.downloadData}} (xls)</span></button>
              </div>  
            </div>
            <i class="material-icons close-btn" @click="showInfo = false">close</i>
          </div>
        </div>
      </div>
      <!-- MAIN -->
      <div class="container-fluid dashboard-container-outer">
        <div class="row dashboard-container">
          <!-- DATA YEARS SELECTOR -->
          <div class="col-md-12 chart-col version-select-container">
            <a :href="'./partyfinance.php?l='+language" class="link-button" :class="{active: selectedYear == ''}" v-if="t.filters">{{t.filters.allYears}}</a>
            <a v-for="year in dataYearsButtons" :href="'./partyfinance.php?y='+year+'&l='+language" class="link-button" :class="{active: selectedYear == year}">{{year}}</a>
          </div>
          <!-- CHARTS - FIRST ROW -->
          <div class="col-md-12 chart-col" v-show="selectedYear == ''">
            <div class="boxed-container chart-container section3_chart_row1" id="years_chart_container">
              <chart-header :title="charts.years.title" :info="charts.years.info" :chartid="charts.years.id"></chart-header>
              <div class="chart-inner" id="years_chart"></div>
            </div>
          </div>
          <!-- CHARTS - SECOND ROW -->
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row2" id="partiesbydonations_chart_container">
              <chart-header :title="charts.partiesByDonations.title" :info="charts.partiesByDonations.info" :chartid="charts.partiesByDonations.id"></chart-header>
              <div class="chart-inner" id="partiesbydonations_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row2" id="partiesbydonationsamt_chart_container">
              <chart-header :title="charts.partiesByDonationsAmt.title" :info="charts.partiesByDonationsAmt.info" :chartid="charts.partiesByDonationsAmt.id"></chart-header>
              <div class="chart-inner" id="partiesbydonationsamt_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row2" id="donorsbydonations_chart_container">
              <chart-header :title="charts.donorsByDonations.title" :info="charts.donorsByDonations.info" :chartid="charts.donorsByDonations.id"></chart-header>
              <div class="chart-inner" id="donorsbydonations_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row2" id="donorssbydonationsamt_chart_container">
              <chart-header :title="charts.donorsByDonationsAmt.title" :info="charts.donorsByDonationsAmt.info" :chartid="charts.donorsByDonationsAmt.id"></chart-header>
              <div class="chart-inner" id="donorsbydonationsamt_chart"></div>
            </div>
          </div>
          <!-- CHARTS - THIRD ROW -->
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row3" id="donortype_chart_container">
              <chart-header :title="charts.donorType.title" :info="charts.donorType.info" :chartid="charts.donorType.id"></chart-header>
              <div class="chart-inner" id="donortype_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row3" id="donationtype_chart_container">
              <chart-header :title="charts.donationType.title" :info="charts.donationType.info" :chartid="charts.donationType.id"></chart-header>
              <div class="chart-inner" id="donationtype_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row3" id="locations_chart_container">
              <chart-header :title="charts.locations.title" :info="charts.locations.info" :chartid="charts.locations.id"></chart-header>
              <div class="chart-inner" id="locations_chart"></div>
            </div>
          </div>
          <div class="col-md-3 chart-col">
            <div class="boxed-container chart-container section3_chart_row3" id="indicators_chart_container">
              <chart-header :title="charts.indicators.title" :info="charts.indicators.info" :chartid="charts.indicators.id"></chart-header>
              <div class="chart-inner" id="indicators_chart"></div>
            </div>
          </div>

          <!-- INDICATOR MODAL BUTTON -->
          <div class="col-12 chart-col">
            <button class="indicator-modal-button" id="indicatorModalButton" v-if="t.modals">{{t.modals.section3Button}}</button>
          </div>
          
          <!-- TABLE -->
          <div class="col-12 chart-col">
            <div class="boxed-container chart-container chart-container-table">
              <chart-header :title="charts.table.title" :info="charts.table.info" ></chart-header>
              <div class="chart-inner chart-table">
                <table class="table table-hover dc-data-table nonclickable" id="dc-data-table">
                  <thead>
                    <tr class="header">
                      <th class="header">{{tableColumns.col0}}</th> 
                      <th class="header">{{tableColumns.col1}}</th>
                      <th class="header">{{tableColumns.col2}}</th> 
                      <th class="header">{{tableColumns.col3}}</th> 
                      <th class="header">{{tableColumns.col4}}</th> 
                      <th class="header">{{tableColumns.col5}}</th> 
                      <th class="header">{{tableColumns.col6}}</th> 
                      <th class="header">{{tableColumns.col7}}</th> 
                      <th class="header">{{tableColumns.col8}}</th> 
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Bottom bar -->
      <div class="container-fluid footer-bar" v-if="t.footer">
        <div class="row">
          <div class="footer-col col-10 col-sm-10 footer-counts">
            <div class="dc-data-count count-box">
              <div class="filter-count">0</div>{{t.footer.counters.of}} <strong class="total-count">0</strong> {{t.footer.counters.donations}}
            </div>
            <div class="footer-input">
              <input type="text" id="search-input" :placeholder="t.footer.filter">
              <i class="material-icons">search</i>
            </div>
          </div>
        </div>
        <!-- Reset filters -->
        <button class="reset-btn"><i class="material-icons">settings_backup_restore</i><span class="reset-btn-text">{{t.footer.reset}}</span></button>
      </div>

      <!-- UNREPORTED DONATIONS MODAL -->
      <div class="modal" id="detailsModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <div class="modal-title" v-if="t.modals">
                {{t.modals.section3.title}}
              </div>
              <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12" v-if="t.modals">
                    <table class="modal-table" v-if="declarationsWithDonationsMissingInReports && declarationsWithDonationsMissingInReports.length > 0">
                      <thead><tr>
                        <th class="left">{{t.modals.section3.nr}}</th>
                        <th class="left">{{t.modals.section3.name}}</th>
                        <th class="left">{{t.modals.section3.institution}}</th>
                        <th class="left">{{t.modals.section3.year}}</th>
                        <th class="left">{{t.modals.section3.politicalParty}}</th>
                        <th class="left">{{t.modals.section3.totalDonations}}</th>
                        <th class="left">{{t.modals.section3.date}}</th>
                        <th class="left">{{t.modals.section3.comments}}</th>
                      </tr></thead>
                      <tbody>
                        <tr v-for="(el, index) in declarationsWithDonationsMissingInReports">
                          <td class="left">{{ index + 1 }}</td>
                          <td class="left">{{ el.name }}</td>
                          <td class="left">{{ el.institution }}</td>
                          <td class="left">{{ el.year }}</td>
                          <td class="left">{{ el.politicalParty }}</td>
                          <td class="left">{{ el.totalDonations}}</td>
                          <td class="left">{{ el.date }}</td>
                          <td class="left">{{ el.comments }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- WON TENDERS MODAL -->
      <div class="modal" id="tendersDetailsModal">
        <div class="modal-dialog">
          <div class="modal-content" v-if="selectedEntry">
            <!-- Modal Header -->
            <div class="modal-header">
              <div class="modal-title" v-if="t.modals">
                {{t.modals.section3.tendersModalTitle}}
                <br /><span v-if="selectedEntry.company">{{selectedEntry.company}}</span>
              </div>
              <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-12" v-if="t.modals">
                    <table class="modal-table" v-if="selectedEntry.tendersWonData && selectedEntry.tendersWonData.length > 0">
                      <thead><tr>
                        <th class="left">{{t.modals.section3.nr}}</th>
                        <th class="left">{{t.modals.section3.tender}}</th>
                        <th class="left">{{t.modals.section3.tenderWithin3Years}}</th>
                      </tr></thead>
                      <tbody>
                        <tr v-for="(el, index) in selectedEntry.tendersWonData">
                          <td class="left">{{ index + 1 }}</td>
                          <td class="left">{{ el.id }}</td>
                          <td class="left" v-if="el.within3Years == true">{{ t.charts.general.yes }}</td>
                          <td class="left" v-else>{{ t.charts.general.no }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- CHART SHARE MODAL -->
      <div class="modal" id="chartShareModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <div class="modal-title">Share chart</div>
              <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="copy-input-container">
                <input type="text" value="" id="chartUrlString" readonly>
                <button @click="copyToClipboard('chartUrlString')"><i class="material-icons">content_copy</i> Copy</button>
              </div>
              <div class="chart-share-btn-container">
                <button class="social-share-btn twitter-btn chart-share-btn" @click="shareChart('twitter')"><img src="./images/x_logo-black.png" />{{t.share}} X</button>
                <button class="social-share-btn facebook-btn chart-share-btn" @click="shareChart('facebook')"><img src="./images/facebook-nobg.png" />{{t.share}} Facebook</button>
                <button class="social-share-btn linkedin-btn chart-share-btn" @click="shareChart('linkedin')"><img src="./images/in_logo.png" />{{t.share}} LinkedIn</button>
                <button class="social-share-btn bluesky-btn chart-share-btn" @click="shareChart('bluesky')"><img src="./images/bluesky_logo.png" />{{t.share}} Bluesky</button>
              </div>
              <img src="" class="chart-img-preview" />
            </div>
          </div>
        </div>
      </div>
      <!-- PAGE SHARE MODAL -->
      <div class="modal" id="pageShareModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <div class="modal-title">{{t.shareModalTitle}}</div>
              <button type="button" class="close" data-dismiss="modal"><i class="material-icons">close</i></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="chart-share-btn-container">
                <button class="social-share-btn twitter-btn" @click="share('twitter')"><img src="./images/x_logo-black.png" />{{t.share}} X</button>
                <button class="social-share-btn facebook-btn" @click="share('facebook')"><img src="./images/facebook-nobg.png" />{{t.share}} Facebook</button>
                <button class="social-share-btn linkedin-btn" @click="share('linkedin')"><img src="./images/in_logo.png" />{{t.share}} LinkedIn</button>
                <button class="social-share-btn bluesky-btn" @click="share('bluesky')"><img src="./images/bluesky_logo.png" />{{t.share}} Bluesky</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Loader -->
      <loader v-if="loader" :text="''" />
    </div>

    <script type="text/javascript" src="vendor/js/d3.v5.min.js"></script>
    <script type="text/javascript" src="vendor/js/d3.layout.cloud.js"></script>
    <script type="text/javascript" src="vendor/js/crossfilter.min.js"></script>
    <script type="text/javascript" src="vendor/js/dc.js"></script>
    <script type="text/javascript" src="vendor/js/dc.cloud.js"></script>
    <script type="text/javascript" src="vendor/js/html2canvas.min.js"></script>
    <script src="static/partyfinance.js?v=8"></script>

 
</body>
</html>