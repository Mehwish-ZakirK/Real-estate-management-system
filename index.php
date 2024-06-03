<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description"
    content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Ample Admin Lite Template by WrapPixel</title>
  <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png" />
  <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" />
  <link href="css/style.min.css" rel="stylesheet" />

</head>

<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
          <a class="navbar-brand" href="index.html">
            <b class="logo-icon">
              <img src="plugins/images/logo-icon.png" alt="homepage" />
            </b>
            <span class="logo-text">
              <img src="plugins/images/logo-text.png" alt="homepage" />
            </span>
          </a>
          <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
          </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <ul class="navbar-nav ms-auto d-flex align-items-center">
            <li class="in">
              <form role="search" class="app-search d-none d-md-block me-3">
                <input type="text" placeholder="Search..." class="form-control mt-0" />
                <a href="" class="active">
                  <i class="fa fa-search"></i>
                </a>
              </form>
            </li>
            <li>
              <a class="profile-pic" href="#">
                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle" />
                <span class="text-white font-medium">Steave</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin6">
      <div class="scroll-sidebar">
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li class="sidebar-item pt-2">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false">
                <i class="far fa-clock" aria-hidden="true"></i><span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html"
                aria-expanded="false">
                <i class="fa fa-table" aria-hidden="true"></i><span class="hide-menu">Basic Table</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="data-management.php"
                aria-expanded="false">
                <i class="fas fa-cog" aria-hidden="true"></i><span class="hide-menu">Data Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="owner-property.php"
                aria-expanded="false">
                <i class="fa fa-building" aria-hidden="true"></i><span class="hide-menu">Owner Property Report</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customer-report.php"
                aria-expanded="false">
                <i class="fas fa-address-card" aria-hidden="true"></i><span class="hide-menu">Customers Report</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="page-wrapper">
      <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
          </div>
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
              <ol class="breadcrumb ms-auto">
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Total Visit</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash">
                    <canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto">
                  <span class="counter text-success">
                    20
                  </span>
                </li>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Total Page Views</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash2">
                    <canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto">
                  <span class="counter text-purple">869</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
              <h3 class="box-title">Unique Visitor</h3>
              <ul class="list-inline two-part d-flex align-items-center mb-0">
                <li>
                  <div id="sparklinedash3">
                    <canvas width="67" height="30"
                      style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                  </div>
                </li>
                <li class="ms-auto">
                  <span class="counter text-info">911</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
              <h3 class="box-title">Products Yearly Sales</h3>
              <div class="graph-container">
              <canvas id="line-chart"></canvas>
    </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
              <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Recent sales</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                  <select class="form-select shadow-none row border-top">
                    <option>March 2021</option>
                    <option>April 2021</option>
                    <option>May 2021</option>
                    <option>June 2021</option>
                    <option>July 2021</option>
                  </select>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table no-wrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">#</th>
                      <th class="border-top-0">Name</th>
                      <th class="border-top-0">Status</th>
                      <th class="border-top-0">Date</th>
                      <th class="border-top-0">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td class="txt-oflo">Elite admin</td>
                      <td>SALE</td>
                      <td class="txt-oflo">April 18, 2021</td>
                      <td><span class="text-success">$24</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td class="txt-oflo">Real Homes WP Theme</td>
                      <td>EXTENDED</td>
                      <td class="txt-oflo">April 19, 2021</td>
                      <td><span class="text-info">$1250</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td class="txt-oflo">Ample Admin</td>
                      <td>EXTENDED</td>
                      <td class="txt-oflo">April 19, 2021</td>
                      <td><span class="text-info">$1250</span></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td class="txt-oflo">Medical Pro WP Theme</td>
                      <td>TAX</td>
                      <td class="txt-oflo">April 20, 2021</td>
                      <td><span class="text-danger">-$24</span></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td class="txt-oflo">Hosting press html</td>
                      <td>SALE</td>
                      <td class="txt-oflo">April 21, 2021</td>
                      <td><span class="text-success">$24</span></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td class="txt-oflo">Digital Agency PSD</td>
                      <td>SALE</td>
                      <td class="txt-oflo">April 23, 2021</td>
                      <td><span class="text-danger">-$14</span></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td class="txt-oflo">Helping Hands WP Theme</td>
                      <td>MEMBER</td>
                      <td class="txt-oflo">April 22, 2021</td>
                      <td><span class="text-success">$64</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer text-center">
          2021 © Ample Admin brought to you by
          <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
      </div>
    </div>
  </div>
  <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app-style-switcher.js"></script>
  <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="js/waves.js"></script>
  <script src="js/sidebarmenu.js"></script>
  <script src="js/custom.js"></script>
  <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
  <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>