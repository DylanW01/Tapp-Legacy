<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Scan QR</title>
<script src="html5-qrcode.min.js"></script>
<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon%20(2).png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16%20(2).png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32%20(2).png">
<link rel="icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon%20(2).png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-chrome-192x192%20(2).png">
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
	</head>

<body id="page-top">
<div id="wrapper">
  <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
      <div class="sidebar-brand-icon "> <img alt="Logo" src="assets/images/logo/tapp-logos_transparent.png" style="width: 65%;"> </div>
      </a>
      <hr class="sidebar-divider my-0">
      <ul class="navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item"><a class="nav-link" href="staff-dashboard.html"><i class="fas fa-tachometer-alt"></i><span>Staff Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="users.html"><i class="fas fa-user"></i><span>User Accounts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="staff.php"><i class="fas fa-user"></i><span>Staff Accounts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="bowsers.html"><i class="fas fa-table"></i><span>Bowsers</span></a></li>
        <li class="nav-item"><a class="nav-link" href="tickets.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-tools" style="margin-right: 4px;">
            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"></path>
          </svg>
          <span>Maintenance Tickets</span></a></li>
        <li class="nav-item"><a class="nav-link" href="bowser-map.html">
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
  <div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
      <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid">
          <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
          <ul class="navbar-nav flex-nowrap ms-auto">
            
            <li class="nav-item dropdown no-arrow mx-1">
              <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                  <h6 class="dropdown-header">alerts center</h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="me-3">
                    <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                  </div>
                  <div><span class="small text-gray-500">December 12, 2019</span>
                    <p>A new monthly report is ready to download!</p>
                  </div>
                  </a><a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="me-3">
                    <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                  </div>
                  <div><span class="small text-gray-500">December 7, 2019</span>
                    <p>$290.29 has been deposited into your account!</p>
                  </div>
                  </a><a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="me-3">
                    <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                  </div>
                  <div><span class="small text-gray-500">December 2, 2019</span>
                    <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                  </div>
                  </a> </div>
              </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
              <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Dylan Warrell</span><img class="border rounded-circle img-profile" src="assets/img/IMG_20200818_153203_2.jpg"></a>
                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.html"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="login.html"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a> </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <h3 class="text-dark mb-1">Scan Bowser QR Code</h3>
		  
      </div>
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
<script src="assets/js/bs-init.js"></script> 
<script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script> 
<script src="assets/js/theme.js"></script>
</body>
</html>