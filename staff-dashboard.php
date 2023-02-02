<?php
	session_start();
	require "src/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Staff Dashboard - Tapp</title>
<link rel="shortcut icon" href="assets/images/logo/favicon_io/favicon (2).ico" type="image/png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
<link rel="stylesheet" href="assets/css/Bootstrap-4---Payment-Form.css">
<link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
<link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
<style>
.content {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

.footer {
	padding: 2%;
}

.footer-clean {
  padding:50px 0;
  background-color:#fff;
  color:#4b4c4d;
}

.footer-clean h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-clean ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-clean ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-clean ul a:hover {
  opacity:1;
}

.footer-clean .item.social {
  text-align:right;
}

.footer-clean .item.social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin-left:10px;
  margin-top:22px;
  color:inherit;
  opacity:0.75;
}

.footer-clean .item.social > a:hover {
  opacity:0.9;
}

@media (max-width:991px) {
  .footer-clean .item.social > a {
    margin-top:40px;
  }
}

@media (max-width:767px) {
  .footer-clean .item.social > a {
    margin-top:10px;
  }
}

.footer-clean .copyright {
  margin-top:14px;
  margin-bottom:0;
  font-size:13px;
  opacity:0.6;
}	
</style>
	<script>
<?php
	include "src/bowserPieChart.php";
?>
	</script>
	</head>

<body id="page-top">
<div id="wrapper">
  <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
      <div class="sidebar-brand-icon "> <img alt="Logo" src="assets/images/logo/tapp-logos_transparent.png" style="width: 65%;"> </div>
      </a>
      <hr class="sidebar-divider my-0">
      <ul class="navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item"><a class="nav-link active" href="staff-dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Staff Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="staff.php"><i class="fas fa-user"></i><span>Staff Accounts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="bowsers.php"><i class="fas fa-table"></i><span>Bowsers</span></a></li>
        <li class="nav-item"><a class="nav-link" href="tickets.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-tools" style="margin-right: 4px;">
            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"></path>
          </svg>
          <span>Maintenance Tickets</span></a></li>
        <li class="nav-item"><a class="nav-link" href="bowser-map.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-map" style="margin-right: 4px;">
            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"></path>
          </svg>
          <span>Bowser Map</span></a></li>
        <li class="nav-item"></li>
        <li class="nav-item"></li>
      </ul>
      <div class="text-center d-none d-md-inline">
        <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
      </div>
    </div>
  </nav>
  <?php
    if (isset($_SESSION['userID'])) {
        echo '
  <div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
      <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid">
          <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
          <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown no-arrow">
              <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">'.$_SESSION['userForename'].'&nbsp;'.$_SESSION['userSurname'].'</span><img class="border rounded-circle img-profile" src="assets/images/avatar-1577909.svg"></a>
                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                  <a class="dropdown-item" href="src/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a> </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h3 class="text-dark mb-0">Staff Dashboard</h3>
        </div>
        <div class="row">
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
              <div class="card-body">
                <div class="row align-items-center no-gutters">
                  <div class="col me-2">
                    <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Active Bowsers</span></div>
                    <div class="text-dark fw-bold h5 mb-0"><span id="activeBowserCardData"></span></div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-water fa-2x text-gray-300">
                      <path d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z"></path>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
              <div class="card-body">
                <div class="row align-items-center no-gutters">
                  <div class="col me-2">
                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Open Tickets</span></div>
                    <div class="text-dark fw-bold h5 mb-0"><span id="openTicketValue"></span></div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-tools fa-2x text-gray-300">
                      <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"></path>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
              <div class="card-body">
                <div class="row align-items-center no-gutters">
                  <div class="col me-2">
                    <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Pending Tickets</span></div>
                    <div class="row g-0 align-items-center">
                      <div class="col-auto">
                        <div class="text-dark fw-bold h5 mb-0 me-3"><span id="pendingTicketValue"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-clock fa-2x text-gray-300">
                      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
              <div class="card-body">
                <div class="row align-items-center no-gutters">
                  <div class="col me-2">
                    <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Number of staff accounts</span></div>
                    <div class="row g-0 align-items-center">
                      <div class="col-auto">
                        <div class="text-dark fw-bold h5 mb-0 me-3"><span id="staffAccountValue"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-people fa-2x text-gray-300">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-xl-4">
            <div class="card shadow mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Bowser Status</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Active&quot;,&quot;Problematic&quot;,&quot;Inactive&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#5cb85c&quot;,&quot;#d9534f&quot;,&quot;#f0ad4e&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;'.$Activerowcount.'&quot;,&quot;'.$Issuerowcount.'&quot;,&quot;'.$Inactiverowcount.'&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;,&quot;display&quot;:false}}}"></canvas>
                </div>
                <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-success text-primary"></i>&nbsp;Active</span><span class="me-2"><i class="fas fa-circle text-danger text-success"></i>&nbsp;Problematic</span><span class="me-2"><i class="fas fa-circle text-warning text-info"></i>&nbsp;Inactive</span></div>
              </div>
            </div>
        </div>
		<div class="col-lg-7 col-xl-8">
            <div class="card shadow mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Staff Bulletin</h6>
              </div>
              <div class="card-body">
			  Welcome to the Tapp staff dashboard!
			  <br><br>
			  This site has full functionality on both desktops and mobile devices such as smartphones and tablets. Administrators can generate new staff accounts on the <a href="/staff.php">Staff Accounts</a>
 page; however, maintenance personnel can only view the list of email addresses.
			  <br><br>
			  Water bowsers can be added, removed and modified from the <a href="/bowsers.php">bowsers page</a>, maintenance tickets can be managed <a href="/tickets.php">HERE</a>, and to view all our water bowsers on a map, you can see them on the <a href="/bowser-map.php">bowser map</a> page. 
              </div>
            </div>
        </div>
        
      </div>';
	} else {
		echo '	<div class="container-fluid">
		<h3 class="text-dark mb-1">Please log in to see this content.</h3>
	</div>';
	} ?>
    </div>
<div class="footer-clean">
  <footer>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 col-md-3 item">
          <h3>Tapp Staff</h3>
          <ul>
            <li><a href="login.html">Login To Staff Account</a></li>
            <li><a href="staff-dashboard.php">Staff Dashboard</a></li>
            <li><a href="staff.php">Manage Users</a></li>
            <li><a href="tickets.php">Maintenance Tickets</a></li>
            <li><a href="bowsers.php">Bowser Database</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3 item">
          <h3>About</h3>
          <ul>
            <li><a href="index.php#mapModal">Find A Bowser</a></li>
            <li><a href="Request.php">Report An Issue</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3 item">
          <h3>System Management</h3>
          <ul>
            <li><a href="https://hpanel.hostinger.com/hosting/dylanwarrell.com/advanced/git">Server Login</a></li>
            <li><a href="https://hpanel.hostinger.com/hosting/dylanwarrell.com/redirect?l=phpMyAdmin&db_name=u539298194_Tapp">Database Management</a></li>
          </ul>
        </div>
        <div class="col-lg-3 item social"> <img src="/assets/images/logo/tapp-logos_black_icon.png" width="15%">
          <p class="copyright">Tapp © 2022</p>
        </div>
      </div>
    </div>
  </footer>
</div>
  </div>
  <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a> </div>
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/js/chart.min.js"></script> 
<script src="assets/js/bs-init.js"></script> 
<script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script> 
<script src="assets/js/theme.js"></script>
<script >
	window.onload = function(){
		document.getElementById('activeBowserCardData').innerHTML = activeBowserCardData;
 		document.getElementById('openTicketValue').innerHTML = openTicketValue;
		document.getElementById('pendingTicketValue').innerHTML = pendingTicketValue;
		document.getElementById('staffAccountValue').innerHTML = staffAccountValue;
	};
</script>
</body>
</html>