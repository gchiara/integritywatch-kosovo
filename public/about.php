<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About | Integrity Watch Kosovo</title>
    <meta property="og:url" content="https://integritywatchkosova.org/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Integrity Watch Kosovo" />
    <meta property="og:description" content="Integrity Watch Kosovo" />
    <meta property="og:image" content="https://integritywatchkosova.org/images/thumbnail.jpg" />
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700,800" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="static/about.css?v=3">
</head>
<body>
    <div id="app" v-cloak> 
      <?php include 'header.php' ?>   
      <div class="container">

        <!-- ABOUT TEXT EN -->
        <div class="panel-group" id="accordion" v-if="language == 'en'">

          <!-- BLOCK 1 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">About the PLATFORM</a>
              </h1>
            </div>
            <div id="collapse1" class="panel-collapse collapse show">
              <div class="panel-body">
                <p>The Integrity Watch Platform for Kosovo is an open-data platform that allows citizens to explore how money and power intersect in public decision-making processes. Developed by the <strong>Kosova Democratic Institute (KDI)</strong>, the platform brings together key datasets on political financing, public procurement, and asset declarations, which represent the three areas most vulnerable to corruption and abuse of public office.</p>
                <p>At its core, Integrity Watch platform for Kosovo transforms scattered public records into accessible, searchable, and comparable information. The platform includes built-in red-flag indicators that automatically signal political-integrity risks. With just a few clicks, you can explore who funds political parties, which companies win public contracts, and how asset declarations of public officials showcase potential conflicts of interest.</p>
                <p>The platform enables citizens, journalists, researchers, law enforcement institutions and decision-makers to see:</p>
                <ul>
                  <li>how political parties are financed, including donors, the amounts and dates of contributions, the type of contributions, and their expenditure reports.</li>
                  <li>how public money is spent, including tender notices, contracting institutions, bidders, tendering periods, the procurement procedure, award criteria and values, and the winning companies;</li>
                  <li>how public officials declare their assets and interests, income and liabilities, and functions/positions that may create a conflict of interest.</li>
                </ul>
                <p>The platform allows downloading data in reusable formats (.csv, .xls, and for procurement data in JSON format).</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 2 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Why it matters</a>
              </h2>
            </div>
            <div id="collapse2" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Transparency is for making public information understandable and useful, not just about publishing it. For too long, data about political financing, public contracts, or asset declarations in Kosovo has been technically “public”, but practically useless, since they are not accessible and user-friendly.</p>
                <p>This platform changes that.</p>
                <p>By connecting data across institutions, IW platform helps uncover patterns, relationships, and risks that are otherwise hidden, from unusual donations before elections, to companies that consistently win public tenders, to discrepancies in officials’ declared assets.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 3 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How it works</a>
              </h2>
            </div>
            <div id="collapse3" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>The goal of the platform is to increase transparency and improve access to information, enabling the monitoring of potential conflicts of interest, illicit influence, and corruption. </p>
                <p>Integrity Watch allows you to filter and explore the data in an intuitive way. Inside each section, when clicking on an element of a chart, for example a bar of a bar chart or a slice of a pie chart, the underlying data will be filtered based on that selection and all other charts will update accordingly, only showing the data entries matching the selected filters.</p>
                <p>In addition to this functionality, it's also possible to use the search bar at the bottom to filter the dashboards according to a textual input, for example the name of a political party, company, public official or institution related to the section's data.</p>
                <p>Clicking the "Reset filters" button in the bottom right corner will reset the filters, refreshing the dashboards to their initial state. well as donations made to political parties.</p>
                <p>The data in this platform have been collected from public sources of the three key institutions: Agency for Prevention of Corruption in Kosovo (APC), Central Election Commission (CEC) and Public Procurement Regulatory Commission (PPRC). The data is extracted from documents published on the websites of the relevant institutions, from requests for access to public documents, and through use of the API for public procurement. The platform processes and visualizes this information so the public can explore it freely, filter it by year, institution, or name, and many other interesting filters.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 4 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Datasets – the Platform Ingredients</a>
              </h2>
            </div>
            <div id="collapse4" class="panel-collapse collapse in">
              <div class="panel-body">
                <h3 class="mt-0">1. Asset Declarations – <i>How does power change people’s wealth?</i></h3>
                <p>Public officials are required to declare their assets regularly. We have made these declarations easy to search and compare by year and by institution. You can explore which institutions have the most declarants, identify whether declarants appear as owners and/or shareholders in businesses, check whether those businesses have won public tenders, and see if the declarants have made donations to political parties.</p>
                <p><strong>You’ll find:</strong> asset and interest declarations, ownership or shareholdings of public officials in private companies, public officials’ companies that win public tenders, and their political donations.</p>
                <h3>2. Public Procurement – <i>Where does your tax money go?</i></h3>
                <p>Kosovo’s public institutions spend hundreds of millions each year through procurement, and yet, due to technical difficulties to check everything, most citizens don’t know who wins or why. Integrity Watch platform for Kosovo visualizes those tenders helping you see which companies consistently get public contracts, how big those contracts are, from which institutions, and potential connections of public officials with such contracts or companies.</p>
                <p><strong>You’ll find:</strong> companies winning public tenders, contract values, contract procedures used, tenders awarded to companies related to public officials, and other red flags associated to public spending.</p>
                <h3>3. Political Financing – <i>Who pays for politics?</i></h3>
                <p>Campaigns cost money. But who’s paying the bills, and what do they get in return?
                Our data track the declared donations of political entities since 2018. Here you can see trends in political donations, especially around elections, identify which parties receive the most private donations by count and by amount, and compare donations by type. You can spot when political party donors appear as public contractors, or when political parties’ financial reports don’t match other data.</p>
                <p><strong>You’ll find:</strong> donors lists, annual reports, and financial patterns throughout the years.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 5 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Tracking of Data Availability</a>
              </h2>
            </div>
            <div id="collapse5" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>For the successful implementation of this project, was necessary to evaluate the state of open data in different aspects. For this purpose, in the beginning of the project we evaluated quality of data using a specific methodology developed by Transparency International and available in (<a href="https://www.transparency.org/en/publications/accountability-loading-survey-open-data-enhancing-political-integrity-western-balkans-t%C3%BCrkiye" target="_blank">Data Scoping Report</a>)</p>
                <p>The table below shows the results of the assessment on data availability relevant to the Integrity Watch approach, in a scores range from 0-10, based on the methodology introduced in the Data Scoping Report.</p>
                <p class="small-text"><strong>Comparison 2023-2025*</strong></p>
                <img src="./images/about_table_en.png" class="about-table-img" />
                <p class="small-text">*Based on the methodology explained on <a href="https://www.transparency.org/en/publications/accountability-loading-survey-open-data-enhancing-political-integrity-western-balkans-t%C3%BCrkiye" target="_blank">Accountability, loading: A survey of open data for… - Transparency.org</a></p>
              </div>
            </div>
          </div>
          <!-- BLOCK 6 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Progress, Stagnation or Evolution – The Drivers</a>
              </h2>
            </div>
            <div id="collapse6" class="panel-collapse collapse in">
              <div class="panel-body">
                <h3 class="mt-0">Progress</h3>
                <p>The Assembly now publishes MPs’ voting records online. This raised the rating for existence, basic availability, access, and coverage. However, the gain is capped because the formats are not aggregated as a register but embedded within the transcripts of parliamentary sessions, which limits re-use, and there is no open license or metadata. (+4.5 points)</p>
                <p>Also, the Geoportal’s data release improved in terms of format (layers available for export in a reusable form). Nevertheless, interoperability mechanisms and metadata are still missing, and the data are challenging to use for automated red flags for political influence or corruption risks. (+1.0 point)</p>
                <p>In 2024, the Parliament of Kosovo adopted Law No. 08/L-265 on Beneficial Ownership. The register now exists at the Ministry of Industry, Entrepreneurship and Trade, reflecting alignment with AML/beneficial-ownership norms. However, no public dataset has been published yet. (+1.0 point)</p>
                <h3>Stagnation</h3>
                <p>The e-Procurement system remains the country’s strongest performer (structured data, consistent publication, API in line with the Open Contracting Data Standard - OCDS). But metadata and documentation are still missing. Likewise, the Agency for the Prevention of Corruption continues to publish comprehensive declarations and update them, but the formats remain readable PDFs, and interoperability/metadata are still missing. The company register and political financing are accessible, but they lack reusable, machine-readable formats, metadata, and interoperability; meanwhile, directories of public officials exist at the Agency for the Prevention of Corruption but are not published and can only be obtained via the Law on Access to Public Documents.</p>
                <h3>Regress</h3>
                <p>In 2025, Government Budget (−2.5) and Government Spending (−2.5) lost points due to delayed publications, lack of clarity in locating information, interoperability, and metadata, even though formats improved (some registers are now published on the national open-data portal <a href="https://opendata.rks-gov.net" target="_blank">https://opendata.rks-gov.net</a>)</p>
                <h3>Next steps</h3>
                <p>Following the Government of Kosovo’s initiatives for digitalization of the public administration, and with digitalization a priority in the EU accession plan, Kosovo has real potential and momentum to increase transparency, strengthen oversight, and promote political integrity by:</p>
                <ol>
                  <li>
                    <strong>Increasing accountability through full digitalization and proactive publication of datasets:</strong>
                    <ol type="a">
                      <li>In addition to electronic reporting for parties and candidates, the Central Election Commission / Office for the Management of Political Entities’ Finances should publish financial reports in reusable formats and make (electronic) reporting mandatory for third-party campaigners as well.</li>
                      <li>The Government of Kosovo should draft regulations to prevent corruption by making public the beneficial ownership register for businesses that donate to political parties and that also benefit from public tenders.</li>
                      <li>The Agency for the Prevention of Corruption should update the asset-declaration template so that public officials who are owners or shareholders in private companies must declare, in a separate line, benefits derived from public contracts.</li>
                      <li>The Assembly of Kosovo should publish parliamentary voting records and draft regulations on the registration of lobbyists and their disclosure.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Advancing open data through interoperability standards:</strong>
                    <ol type="a">
                      <li>The Government of Kosovo should create regulations for <a href="https://standards.theodi.org/" target="_blank">dataset standards</a>, which must include publishing information in open, reusable, machine-readable formats with APIs, standard metadata, and unique identifiers.</li>
                      <li>The government should also fully adopt the <a href="https://standard.open-contracting.org/latest/en/" target="_blank">OCDS</a> standard for public procurement and <a href="https://standard.open-contracting.org/latest/en/" target="_blank">OpenSpending</a> standards for public finance.</li>
                      <li>The Public Procurement Regulatory Commission should require full publication of information on the management of awarded contracts by all Contracting Authorities. It should also increase the level of published information to include contract amendments (modifications), payments and budget coding, and ensure publication of documentation and metadata via API.</li>
                    </ol>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <!-- BLOCK 7 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Disclaimers</a>
              </h2>
            </div>
            <div id="collapse7" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>The right to information, transparency, and access to public data and documents is guaranteed by the Constitution of Kosovo (Article 41), the Law on Access to Public Documents (No. 06/L-081), secondary legislation, and international Open Data standards, through the Open Government Partnership (OGP)."</p>
                <p>While we have taken every precaution to ensure the data we publish is as accurate as possible, we recommend always comparing platform data with the data provided on institutional websites. If you find inaccurate, incomplete, or misleading information, please report it to us at <a href="mailto:info@kdi-kosova.org" target="_blank">info@kdi-kosova.org</a></p>
                <p>This is the BETA version of the platform.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 8 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Contact</a>
              </h2>
            </div>
            <div id="collapse8" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Kosova Democratic Institute (KDI)</p>
                <p>Address: Bajram Kelmendi 239, Prishtinë, 10000, Kosovë</p>
                <p>Office phone: +383 (0) 38 248 038</p>
                <p>E-mail: <a href="mailto:info@kdi-kosova.org" target="_blank">info@kdi-kosova.org</a></p>
                <p>Web: <a href="http://www.kdi-kosova.org" target="_blank">www.kdi-kosova.org</a>; www. Integritywatchkosova.org</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 9 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">About Integrity Watch Project</a>
              </h2>
            </div>
            <div id="collapse9" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>The Integrity Watch platforms in Kosovo, Bosnia and Herzegovina, North Macedonia, Serbia and Türkiye are launched in December 2025 as part of the project <i>“Integrity Watch in the Western Balkans and Türkiye: civil society combating corruption with political integrity data”</i> funded by the European Commission. Neither the institutions nor the bodies of the European Union, nor any person acting on their behalf, may be held responsible for the use that may be made of the information it contains.</p>
                <p>Application design and development: <a href="https://www.chiaragirardelli.net" target="_blank">Chiara Girardelli</a></p>
                <div class="about-eu-funding"><img src="./images/flag_yellow_low.jpg" class="logo"> <p style="font-family: Arial;">The Integrity Watch platforms in Kosovo, Serbia, North Macedonia, Bosnia and Herzegovina and Türkiye are funded by the European Union.</p></div>
              </div>
            </div>
          </div>


        </div>

        <!-- ABOUT TEXT LOCAL -->
        <div class="panel-group" id="accordion" v-if="language == 'sq'">

          <!-- BLOCK 1 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Rreth Platformës</a>
              </h1>
            </div>
            <div id="collapse1" class="panel-collapse collapse show">
              <div class="panel-body">
                <p>Platforma Integrity Watch për Kosovën është një platformë e të dhënave të hapura që u mundëson qytetarëve të eksplorojnë se si ndërthuren paratë dhe pushteti në proceset e vendimmarrjes publike. E zhvilluar nga Instituti Demokratik i Kosovës (KDI), platforma bashkon të dhënat kyçe për financimin politik, prokurimin publik dhe deklarimet e pasurisë, tre fushat më të cenueshme ndaj korrupsionit dhe abuzimit me detyrën publike.</p>
                <p>Në thelb, platforma Integrity Watch për Kosovën i shndërron të dhënat publike të shpërndara në informacion të qasshëm, të kërkueshëm dhe të krahasueshëm. Platforma ka të integruar flamujt e rrezikut (red-flags) që sinjalizojnë automatikisht rreziqet e integritetit politik. Me vetëm disa klikime, mund të shihni kush i financon partitë politike, cilat kompani fitojnë kontrata publike dhe si deklarimet e pasurisë së zyrtarëve publikë nxjerrin në pah konflikte interesi të mundshme.</p>
                <p>Platforma u mundëson qytetarëve, gazetarëve, studiuesve, organeve të sundimit të ligjit dhe vendimmarrësve të shohin:</p>
                <ul>
                  <li>si financohen partitë politike, përfshirë donatorët, shumat dhe datat e kontributeve, llojin e kontributit dhe subjektin përfitues, si dhe raportet e tyre financiare.</li>
                  <li>si shpenzohen paratë publike, përfshirë njoftimet e tenderëve, institucionet, ofertuesit, periudhat e tenderimit, procedurat për dhënie të tenderëve dhe vlerat e tyre, si dhe operatorët fitues; </li>
                  <li>si i deklarojnë pasuritë dhe interesat zyrtarët publikë, përfshirë të ardhurat dhe detyrimet, funksionet/pozitat që mund të krijojnë konflikt interesi.</li>
                </ul>
                <p>Platforma mundëson shkarkimin e të dhënave në format të ripërdorshëm (.csv, .xls dhe për të dhënat e prokurimit në formatin JSON).</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 2 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pse ka rëndësi?</a>
              </h2>
            </div>
            <div id="collapse2" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Transparenca ka të bëjë me publikimin e informacionit publik në mënyrë të kuptueshme dhe të dobishme dhe jo të mjaftohet vetëm me publikimin e tij. Prej shumë kohësh, të dhënat për financimin politik, kontratat publike apo deklarimet e pasurisë në Kosovë kanë qenë teknikisht “publike”, por praktikisht të padobishme, sepse nuk kanë qenë të qasshme, miqësore dhe të krahasueshme për përdoruesin.</p>
                <p>Kjo platformë e ndryshon këtë realitet.</p>
                <p>Duke lidhur të dhëna ndërinstitucionale, platforma IW ndihmon të zbulohen modele, lidhje dhe rreziqe që përndryshe mbeten të fshehura, duke filluar nga donacione të pazakonta para zgjedhjeve, te kompani që fitojnë vazhdimisht tenderë publikë, e deri te mospërputhje në pasuritë e deklaruara të zyrtarëve me ato të raporteve financiare të partive politike.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 3 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Si funksionon?</a>
              </h2>
            </div>
            <div id="collapse3" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Qëllimi i platformës është të rrisë transparencën dhe të përmirësojë qasjen në informacion, duke mundësuar monitorimin e konflikteve të mundshme të interest, ndikimit të paligjshëm politik dhe korrupsionit.</p>
                <p>Integrity Watch ju lejon të filtroni dhe të eksploroni të dhënat në mënyrë intuitive. Brenda çdo seksioni, kur klikoni në një element grafiku, p.sh. një shtyllë në grafikun me shtylla ose një ndarje në grafikun rrethor, të dhënat bazë filtrohen sipas asaj përzgjedhjeje dhe të gjithë grafikonët e tjerë, dhe tabela përmbledhëse, përditësohen për të shfaqur vetëm të dhënat që përputhen me filtrat e zgjedhur.</p>
                <p>Përveç këtij funksionaliteti, është e mundur të përdorni edhe shiritin e kërkimit (search bar) në fund për të filtruar të të dhënat sipas një teksti të caktuar, p.sh. emrin e partie, kompanie, zyrtari publik ose institucioni që lidhet me të dhënat e seksionit.</p>
                <p>Klikimi i butonit “Rivendos filtrat” në këndin e poshtëm djathtas do t’i rivendosë filtrat, duke i kthyer të dhënat e ilustruara (paraqitura) në gjendjen fillestare.</p>
                <p>Të dhënat në këtë platformë janë mbledhur nga burime publike të tre institucioneve kyçe: Agjencia për Parandalimin e Korrupsionit në Kosovë (APK), Komisioni Qendror i Zgjedhjeve (KQZ) dhe Komisioni Rregullativ i Prokurimit Publik (KRPP). Të dhënat janë mbledhur nga dokumentet ekzistuese të publikuara në ueb-faqet e institucioneve gjegjëse, kërkesave për qasje në dokumente publike si dhe përmes përdorimit të API në rastin e prokurimit publik. Platforma i përpunon dhe i vizuelizon këto informacione në mënyrë që publiku t’i eksplorojë lehtë, t’i filtrojë sipas vitit, institucionit, emrit dhe shumë filtrave të tjerë interesantë.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 4 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Të dhënat – “Përbërësit” e Platformës</a>
              </h2>
            </div>
            <div id="collapse4" class="panel-collapse collapse in">
              <div class="panel-body">
                <h3 class="mt-0">1. Deklarimet e Pasurisë – Si ndikon pushteti në pasurinë e njerëzve?</h3>
                <p>Zyrtarët publikë janë të detyruar të deklarojnë rregullisht pasurinë e tyre. Ne i kemi bërë këto deklarime të lehta për t’u kërkuar dhe krahasuar sipas vitit dhe sipas institucionit. Mund të eksploroni se cilat institucione kanë më shumë deklarues, të identifikoni nëse deklaruesit paraqiten si pronarë dhe/ose aksionarë në biznese, të verifikoni nëse ato biznese kanë fituar tenderë publikë dhe të shihni nëse deklaruesit kanë dhënë donacione për partitë politike.</p>
                <p><strong>Do të gjeni:</strong> deklarime të pasurisë dhe interesave, pronësi apo aksione të zyrtarëve publikë në kompani private, kompanitë e zyrtarëve publik të cilët përfitojnë tenderë publik, si dhe donacionet e tyre për subjektet politike.</p>
                <h3>2. Prokurimi Publik – Ku shkojnë taksat tuaja?</h3>
                <p>Institucionet publike të Kosovës shpenzojnë qindra miliona çdo vit përmes prokurimit, dhe megjithatë, për shkak të vështirësive teknike për t’i verifikuar të gjitha, shumica e qytetarëve nuk e dinë kush fiton dhe pse. Platforma Integrity Watch për Kosovën i vizualizon tenderët që nga viti 2016, duke ju ndihmuar të shihni cilat kompani fitojnë rregullisht kontrata publike, vlerën e kontratave, nga cilat institucione vijnë dhe lidhjet e mundshme të zyrtarëve publikë me këto kontrata ose kompani.</p>
                <p><strong>Do të gjeni:</strong> kompani që fitojnë tenderë publikë, vlerat e kontratave, procedurat e përdorura, tenderë të dhënë për kompani të lidhura me zyrtarë publikë dhe indikatorë të tjerë rreziku që lidhen me shpenzimet publike.</p>
                <h3>3. Financimi Politik – Kush paguan për politikën?</h3>
                <p>Fushatat kushtojnë para. Por kush i paguan faturat dhe çfarë përfitojnë në këmbim?
                Të dhënat tona gjurmojnë donacionet e deklaruara të subjekteve politike që nga viti 2018. Këtu mund të shihni trendet e donacioneve politike, veçanërisht rreth zgjedhjeve, cilat parti marrin më shumë donacione private sipas numrit dhe sipas shumës, si dhe krahasimet sipas natyrës së donacioneve. Mund të vëreni kur donatorë të partive politike shfaqen si kontraktorë publik, ose kur raportet financiare të partive politike nuk përputhen me të dhënat e tjera.</p>
                <p><strong>Do të gjeni:</strong> lista donatorësh, raporte vjetore dhe trende të financimit ndër vite, donator të cilët kanë fituar tender pasi kanë dhënë donacione, etj.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 5 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Disponueshmëria e të Dhënave</a>
              </h2>
            </div>
            <div id="collapse5" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Për zbatimin e suksesshëm të këtij projekti, ishte e domosdoshme të bëhej vlerësimi i gjendjes së të dhënave të hapura në aspekte të ndryshme. Për këtë qëllim, në fillim të projektit vlerësuam ekzistencën dhe cilësinë e të dhënave duke përdorur një metodologji specifike të zhvilluar nga Transparency International dhe të paraqitur në raportin e shtrirjes së të dhënave lidhur me integritetin politik (<a href="https://www.transparency.org/en/publications/accountability-loading-survey-open-data-enhancing-political-integrity-western-balkans-t%C3%BCrkiye" target="_blank">Data Scoping Report</a>)</p>
                <p>Tabela më poshtë paraqet rezultatet e vlerësimit për gjendjen e të dhënave të rëndësishme për qasjen Integrity Watch, në një shkallë pikëzimi nga 0 në 10, bazuar në metodologjinë e prezantuar në Raportin e Hartëzimit të të Dhënave.</p>
                <p><i>Krahasimi 2023–2025*</i></p>
                <img src="./images/about_table_local.png" class="about-table-img" />
                <p class="small-text">*Bazuar në metodologjinë e shpjeguar në <a href="https://www.transparency.org/en/publications/accountability-loading-survey-open-data-enhancing-political-integrity-western-balkans-t%C3%BCrkiye" target="_blank">Accountability, loading: A survey of open data for… - Transparency.org</a></p>
              </div>
            </div>
          </div>
          <!-- BLOCK 6 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Progres, Stagnim apo Regres – Faktorët Shtytës</a>
              </h2>
            </div>
            <div id="collapse6" class="panel-collapse collapse in">
              <div class="panel-body">
                <h3 class="mt-0">Progresi:</h3>
                <p>Kuvendi i Kosovës tani publikon online të dhënat lidhur me votat e deputetëve. Kjo ndikoi në rritjen e vlerësimit për ekzistencën, disponueshmërinë bazike, qasjen dhe mbulueshmërinë e këtyre të dhënave. Por rritja mbetet e kufizuar sepse formatet nuk janë të përmbledhura si një regjistër, por përfshihen brenda transkripteve të seancës parlamentare, duke kufizuar ripërdorimin e tyre, si dhe mungojnë licenca e hapur dhe metadata. (+4.5 pikë).</p>
                <p>Po ashtu, publikimi i të dhënave në Geoportal është përmirësuar sa i takon formatit (shtresa për eksport në format të ripërdorshëm). Megjithatë, mekanizmat për interoperabilitet dhe metadata vazhdojnë të mungojnë, dhe të dhënat janë sfiduese për t’u përdorur për flamuj të automatizuar të rrezikut për ndikim politik ose rreziqe korrupsioni (+1.0 pikë).</p>
                <p>Në vitin 2024, Parlamenti i Kosovës miratoi Ligjin nr. 08/L-265 për Pronësinë Përfituese. Regjistri tashmë ekziston në nivel të Ministrisë së Industrisë, Ndërmarrësisë dhe Tregtisë, duke reflektuar përafrimin me normat kundër pastrimit të parave dhe pronësisë përfituese. Megjithatë, ende nuk është publikuar një dataset publik (+1.0 pikë).</p>
                <h3>Stagnimi</h3>
                <p>Sistemi i e-Prokurimit mbetet performuesi më i fortë në vend (të dhëna të strukturuara, publikim i qëndrueshëm, API sipas Standardit për të dhëna për kontrata të hapura - OCDS). Por metadata dhe dokumentimi ende mungojnë. Po ashtu, Agjencia për Parandalimin e Korrupsionit vazhdon të publikojë deklarime gjithëpërfshirëse dhe t’i përditësojë ato, por formatet mbeten PDF të lexueshme dhe interoperabiliteti/metadata ende mungojnë. Regjistri i kompanive dhe financimi politik janë të qasshëm, por u mungojnë formatet e ripërdorshme, metadata dhe interoperabiliteti; ndërsa listat e zyrtarëve publikë ekzistojnë pranë Agjencisë për Parandalimin e Korrupsionit, por nuk publikohen dhe mund të merren vetëm përmes Ligjit për Qasje në Dokumente Publike.</p>
                <h3>Regresi</h3>
                <p>Në vitin 2025, Buxheti i Qeverisë (−2.5) dhe Shpenzimet e Qeverisë (−2.5) humbën pikë për shkak të publikimeve me vonesë, mungesës së qartësisë për gjetjen e informacionit, interoperabilitetit dhe matadata, edhe pse formatet u përmirësuan (disa nga regjistrat tani publikohen në portalin kombëtar të të dhënave të hapura <a href="https://opendata.rks-gov.net" target="_blank">https://opendata.rks-gov.net</a>)</p>
                <h3>Hapat në vijim</h3>
                <p>Duke ndjekur iniciativat e Qeverisë së Kosovës për digjitalizimin e administratës publike, dhe me digjitalizimin si prioritet në planin e anëtarësimit në BE, Kosova ka potencial dhe momentum real për të rritur transparencën, fuqizuar mbikëqyrjen dhe promovuar integritetin politik duke:</p>
                <ol>
                  <li>
                    <strong>Rritja e llogaridhënies përmes digjitalizimit të plotë dhe publikimit proaktiv të grupeve të të dhënave (dataseteve): </strong>
                    <ol type="a">
                      <li>Përveç raportimit elektronik për partitë dhe kandidatët, Komisioni Qendror i Zgjedhjeve/Zyra për Menaxhimin e Financave të Subjekteve Politike duhet të publikoj raportet financiare në format të ripërdorshëm si dhe të bëhet obligativ raportimi (elektronik) edhe për fushatat e palëve të treta.</li>
                      <li>Po ashtu, Qeveria e Kosovës duhet të hartoj rregullativën që parandalon korrupsionin, duke bërë publik regjistrin e pronarëve përfitues për bizneset që japin donacione në partitë politike edhe që përfitojnë nga tenderët publik.</li>
                      <li>Agjencia për Parandalimin e Korrupsionit duhet të përditësoj deklarimet e pasurisë ku zyrtarët publik që janë pronarë apo aksionar në biznese private, duhet të deklarojnë në linjë të veçantë përfitimet nga kontratat publike. </li>
                      <li>Kuvendi i Kosovës duhet të publikoj regjistrat e votimeve parlamentare si dhe të hartoj rregullativën për regjistrimin e lobuesëve dhe publikimin e tyre.</li>
                    </ol>
                  </li>
                  <li>
                    <strong>Avancimi i të dhënave të hapura përmes standardeve për ndërveprim (interoperabilitet): </strong>
                    <ol type="a">
                      <li>Qeveria e Kosovës duhet të krijoj rregullativën për <a href="https://standards.theodi.org/" target="_blank">standardet e grupeve të të dhënave</a>, të cilat duhet të përfshijnë publikimin e informacionit në formate të hapura, të ripërdorshme, me API, metadata standarde dhe identifikues unikë.</li>
                      <li>Po ashtu, qeveria duhet të adaptoj të plota standardet <a href="https://standard.open-contracting.org/latest/en/" target="_blank">OCDS</a> për prokurimin publik, si dhe standardet <a href="https://www.bing.com/ck/a?!&&p=3a0ff0fc76eb41248e65267d6c5e4528fa2625372ec2814f85097434dd50bd80JmltdHM9MTc2MjkwNTYwMA&ptn=3&ver=2&hsh=4&fclid=1d112b12-e134-62ec-1473-3d71e0ed6361&psq=openspending+standards&u=a1aHR0cHM6Ly93d3cub3BlbnNwZW5kaW5nLm9yZy9hYm91dA" target="_blank">OpenSpending</a> për financat publike.</li>
                      <li>KRPP duhet të bëj të obligueshëm publikimin e plotë të informacionit lidhur me menaxhimin e kontratave të dhëna. Po ashtu, KRPP duhet të rrisë nivelin e informacionit të publikuar për të përfshirë edhe ndryshimet (modifikimet) në kontrata, pagesat dhe kodin buxhetor, si dhe të përfshijë publikimin e dokumentacionit dhe metadata në API.</li>
                    </ol>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <!-- BLOCK 7 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Mohim i përgjegjësisë</a>
              </h2>
            </div>
            <div id="collapse7" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>E drejta për informim, transparencë dhe qasje në të dhënat e dokumentet publike garantohet nga Kushtetuta e Kosovës (Neni 41), Ligji për Qasje në Dokumente Publike (Nr. 06/L-081), legjislacioni sekondar dhe standardet ndërkombëtare për të dhëna të hapura, përmes Partneritetit për Qeverisje të Hapur (OGP).</p>
                <p>Ndërsa kemi marrë çdo masë paraprake për të siguruar që të dhënat që publikojmë të jenë sa më të sakta, rekomandojmë që çdo informacion në platformë të krahasohet gjithmonë me të dhënat e ofruara në faqet zyrtare të institucioneve. Nëse gjeni informacione të pasakta, jo të plota ose që mund të keqkuptohen, ju lutemi na raportoni në <a href="mailto:info@kdi-kosova.org" target="_blank">info@kdi-kosova.org</a></p>
                <p>Ky është verzioni BETA i platformës.</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 8 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Kontakti</a>
              </h2>
            </div>
            <div id="collapse8" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Kosova Democratic Institute (KDI)</p>
                <p>Adresa: Bajram Kelmendi 239, Prishtinë, 10000, Kosovë</p>
                <p>Tel. zyre: +383 (0) 38 248 038</p>
                <p>E-mail: <a href="mailto:info@kdi-kosova.org" target="_blank">info@kdi-kosova.org</a></p>
                <p>Web: <a href="http://www.kdi-kosova.org" target="_blank">www.kdi-kosova.org</a>; www. Integritywatchkosova.org</p>
              </div>
            </div>
          </div>
          <!-- BLOCK 9 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Rreth projektit Integrity Watch</a>
              </h2>
            </div>
            <div id="collapse9" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Platformat Integrity Watch në Kosovë, Bosnje dhe Hercegovinë, Maqedoninë e Veriut, Serbi dhe Turqi lansohen në dhjetor 2025 si pjesë e projektit “Integrity Watch në Ballkanin Perëndimor dhe Turqi: shoqëria civile kundër korrupsionit me të dhëna për integritetin politik”, të financuar nga Komisioni Evropian. As institucionet dhe as organet e Bashkimit Evropian, e as ndonjë person që vepron në emrin e tyre, nuk mbajnë përgjegjësi për mënyrën se si mund të përdoret informacioni që përmban ky material.</p>
                <p>Dizajnimi dhe zhvillimi i aplikacionit: <a href="https://www.chiaragirardelli.net" target="_blank">Chiara Girardelli</a></p>
                <div class="about-eu-funding"><img src="./images/flag_yellow_low.jpg" class="logo"> <p style="font-family: Arial;">Platformat Integrity Watch në Kosovë, Serbi, Maqedoninë e Veriut, Bosnje dhe Hercegovinë dhe Turqi financohen nga Bashkimi Evropian.</p></div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
    <script src="static/about.js?v=3"></script>
</body>
</html>