<?php
  session_start();
  ob_start();


  if(!isset($_SESSION['admin_id'])){
    header("Location: ..");
    exit(0);
  }

  //include db connection
  include_once("../mobile/db_connection.php");

  //include utility
  include_once("../mobile/utility.php");
  
  $msga = "";
  if(isset($_POST["newprofileavatar"])){
     $res = AdminImageUpload("newprofileavatar","avatar");
     if(is_array($res) && count($res) > 0){
        foreach ($res as $value) {
          $msga = $msga . "<br/> " . $value;
        }
     }else{
        try{
          $sql = "UPDATE admin SET avatar = '". $res ."' WHERE id = " . $_SESSION['admin_id'];         
          $conn->exec($sql);
        }catch(PDOException $e)
        {
          $msga = $e->getMessage();
        }
     }    
  }
  
  //load in admin
  loadPageAdminOfId($_SESSION['admin_id']);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>YAMMZIT - Admin</title>

    <!-- Ionicons -->
    <link href="ionicons-2.0.1/css/ionicons.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

    <!-- DataTables CSS -->
    <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- yammzit fonts -->
    <link rel="stylesheet" href="yammzfonts/styles.css" /> 

    <!-- star fonts -->
    <link rel="stylesheet" href="star_icon/styles.css" /> 
    <link rel = "stylesheet" type="text/css" href = "ionicons-2.0.1/css/ionicons.min.css" media="all">   
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="myjs/jquery.min.js"></script>
    <script src="myjs/theme.js"></script>
    <script src="canvasjs-1.8.5/canvasjs.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <style type="text/css">
        .yammzit{
          background-color: #BE2633 !important;
        }
        .whiteColor {
          color: white !important;
        }
        .header-logo{
            width: 50px;
            height: 50px;
            padding: 0px;
            margin: 0px;
            margin-top: -10px;
        }
        .logout{
            margin-top: 10px !important; 
        }
        .padding20{
          padding: 20px !important;
        }
        .padding10{
          padding: 10px !important;
        }
        .errorDiv{
          color: red !important;
          padding: 10px;
          width: 100%;
          text-align: left;
        }
        .red_yammz{
          color:#BE2633;
        }
        .yammzitUserItem{
          width: auto !important;
          float: left !important;
          padding: 10px !important;
        }
        .scroll250{
          min-height: 250px !important;
          max-height: 250px !important;
          overflow: auto;
        }
        .scroll500{
          min-height: 500px !important;
          max-height: 500px !important;
          overflow: auto;
        }
        .scroll400{
          min-height: 400px !important;
          max-height: 400px !important;
          overflow: auto;
        }
        .scroll300{
          min-height: 300px !important;
          max-height: 300px !important;
          overflow: auto;
        }
        .noMarginBottom{
          margin-bottom: 0px !important;
        }
        .redText{
          color: red !important;
        }
        .btn-outline {
            color: inherit;
            background-color: transparent;
            transition: all .5s;
        }
        .yammzitPanel{
          width: 99% !important;
          margin-right: 0px;
          margin-left: 0px;
        }
        .ym_panel{
          border-radius:0px;
          margin-right: 0px;
          margin-left: 0px;
          min-height:480px;

        }
        .ym_panel2{
          border-radius:0px;
          margin-right: 0px;
          margin-left: 0px;
         /* min-height:480px;*/

        }

        .bold{
          font-weight:bold;
        }
        .noSidePadding{
          padding-left: 0px;
          padding-right: 0px;
        }
        .tableFlag{
          width: 100px;
          height: 50px;
        }
        .dataTables_length{
          text-align: left !important;
        }
        @media screen and (max-width: 767px){
          div.dataTables_length, div.dataTables_filter, div.dataTables_info, div.dataTables_paginate {
              text-align: left !important;
          }
          .iconsDiv{
            font-size: 20px !important;
            color: black;
          }
        }
        .iconsDiv{
          padding: 10px;
          display: block;
          cursor: pointer;
        }

        .iconsDiv li{
          text-align: left;
          display: inline;
          margin: 20px;
          font-size: 40px;
        }
        .showScroll{
          overflow: scroll;
        }
        .showItemIcon{
          display: inline;
        }
        .hideItemIcon{
          display: none !important;
        }
        .sponsored_search_div{
          width: 100%;
          height: 150px;
          margin-bottom: 40px;
        }

        .sponsored_search_div img{
          width: 100%;
          height: 100%;
        }

        .sponsored_search_div .badge{
          position: absolute !important;
          margin-top: -40px;
          width: 40px;
          height: 40px;
          background-color: rgba(0,0,0,0.4);
          font-size: 20px;
          padding-top: 0px;
        }

        .sponsored_search_div .badge-popular{
          line-height: 45px;
        }

        .sponsored_search_div .blog-title{
          position:relative;
          display: block;
          width: 100%;
          bottom: 0px;
        }
    </style>