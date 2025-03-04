<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Fire Track</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="icon" type="image/png" sizes="32x32" href="../FireTrack_logo.png">
    <meta name="theme-color" content="#ffffff">
    <script src="assets/js/config.js"></script>

    <script src="vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>

    <!-- Swwet Alert -->
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <link href="vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">

    <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
    <script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
    }
    </script>



    <?php 
  error_reporting(0);
  date_default_timezone_set("Asia/Kolkata"); ?>
    <style>
    td {
        padding: 0 10px;
    }

    .receipt {
        margin-left: auto;
        margin-right: auto;
        /* border: 2px solid black; */
        padding: 20px;
        /* border-radius: 10px; */
    }

    @media only screen and (max-width: 760px) {
        .img {
            width: 310px;
            height: auto;
        }

        .name {
            margin-top: -357px !important;
            margin-left: 100px !important;
            font-size: 10px !important;
            width: 140px !important;
            overflow-wrap: break-word !important;

        }

        .age {
            margin-top: -356px !important;
            margin-left: 267px !important;
            font-size: 7px !important;
        }

        .gender {
            margin-top: -370px !important;
            margin-left: 100px !important;
            font-size: 10px !important;


        }

        .rdate {
            margin-top: -372px !important;
            margin-left: 260px !important;
            font-size: 7px !important;
            overflow-wrap: normal !important;
        }
    }

    @media print {
        body {
            background-color: white !important;
        }

        .receipt {
            width: 750px !important;
            margin: 20px !important;
            margin-top: 10px !important;
        }

        .img300 {
            width: 40% !important;
            height: 60px !important;
        }

        .img400 {
            width: 80% !important;
            height: 60px !important;
        }

        .img1 {
            /* display:none; */
            visibility: hidden;
        }

        .contact {
            margin-left: 250px !important;
        }

        .img1 {

            width: 100% !important;
            /* border: 2px solid black; */
            /* height: 1055px !important;; */
            height: 100vh !important;
        }

        .name {
            margin-top: -905px !important;
            margin-left: 270px !important;
            font-size: 13px !important;
        }

        .age {
            margin-top: -905px !important;
            margin-left: 682px !important;
            font-size: 13px !important;
        }

        .gender {
            margin-top: -935px !important;
            margin-left: 255px !important;
            font-size: 13px !important;
        }

        .rdate {
            margin-top: -945px !important;
            margin-left: 665px !important;
            font-size: 13px !important;
        }

    }



    .loader {
        position: relative;
        width: 350px;
        height: 350px;
        background-color: #fff;
        background-image: url(loader.gif);
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }
    </style>
</head>


<body>
    <?php include "../dbcon.php"; ?>