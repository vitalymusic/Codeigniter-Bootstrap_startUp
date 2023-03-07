<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSMT pakalpojumi</title>
    <link rel="icon" href="https://rsmt.lv/wp-content/uploads/2022/02/cropped-android-chrome-512x512-1-32x32.png" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .clientForm{
            /* margin:15px; */
            border: 1px solid #EE2025;
            border-radius:20px;
            margin-bottom:30px;
        }
        #Pieteikuma_forma1 p{
            margin-top:20px;
        }

        a{
            text-decoration:none !important;
        }

        .navbar-brand img{
            filter:invert(100%)
        }
        .navbar {
            background:#EE2025 !important; 
            box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.232);
        }
        h1{
            color:#EE2025 !important;
            /* text-shadow:0px 0px 5px rgba(0, 0, 0, 0.426); */
        }
        .invalid-feedback{
            padding-left:1em;
        }
        
        .fab, .fa-brands{
            color: #EE2025 !important;
            filter:opacity(.65);
        }
        
        .fab:hover, .fa-brands:hover{
            filter:opacity(1);
        }
        .rsmt_red{
            color: #EE2025 !important;
        }

        .form-select:focus, .form-control:focus{
            border-color: rgba(255,0,0,0.5);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.3);
        }
        @media screen and (min-width:1200px) {
            .main_screen{
            min-height:calc(100vh - 145px - 90px) !important;
        }
        }
    </style>
</head>
<body>
<?php include("top_nav.php")?>    