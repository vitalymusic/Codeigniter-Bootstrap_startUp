<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-pasts no mājaslapas</title>
    <style>
        .message_header{
            background-color: #2596be;
            color:#fff;
            padding:20px;
        }
        .message_footer{
            height:100px;
            background-color:grey;
            padding:20px;
        }
        .content{
            border:2px solid blue;
            padding:30px;
            margin:10px;
        }
    </style>
</head>
<body>
    <div class="message_header" style="background-color: #2596be;color:#fff">
        <h2>Jauns pakalpojuma pieteikums no mājaslapas</h2>
    </div>
    <div class="content">
            <div class="content_header">
                     <h3>Sveiki. Jums ir jauns pakalpojuma pieteikums </h3>
            </div>
            <div class="content_body">
               <h5 class="bold">
                        Klienta dati:
                </h5>
                <p>
                    Pakalpojuma sniegšanas datums un laiks: <b><?=$datums?> <?=$laiks?>:00</b>
                </p>
                <p>
                    Klienta vārds: <b><?=$klienta_vards?></b>
                </p>
                <p>
                    Klienta uzvārds: <b><?=$klienta_uzvards?></b>
                </p>
                <p>
                    Klienta epasts: <b><?=$klienta_epasts?></b>
                </p>
                <p>
                    Klienta tālrunis: <b><?=$klienta_talrunis?></b>
                </p>
                <p>
                    Pakalpojums: <b><?=$pakalpojums?></b>
                </p>
                
                
            </div>
           
    </div>
    <div class="message_footer" style="background-color: #2596be;color:#fff">

            Ja rodas problēmas ar apstrādi lūdzam sazināties ar klientu
            Ja nestrādā sistēma, tad lūdzam rakstīt uz epastu: vitalijs.korabelnikovs@gmail.com
    </div>
</body>
</html>