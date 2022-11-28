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
        .message_footer a{
            color:white;
            text-decoration:underline;

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
        <h2>Jūsu pieteikums pakalpojumam</h2>
    </div>
    <div class="content">
            <div class="content_header">
                     <h3>Labdien. Jūs esiet pieteikušies RSMT pakalpojumam</h3>
            </div>
            <div class="content_body">
               <h5 class="bold">
                        Pakalpojuma detaļas:
                </h5>
                <p>
                    Pakalpojuma sniegšanas datums un laiks: <b><?=$datums?> <?=$laiks?>:00</b>
                </p>
                <p>
                    Meistars: <b><?=$meistara_vards?> <?=$meistara_uzvards?></b>
                </p>
                
                
                <p>
                    Pakalpojums: <b><?=$pakalpojums?></b>
                </p>

                <p>
                    Pakalpojuma sniegšanas vieta: <b><?=$adrese?></b>
                </p>

                
                
            </div>
           
    </div>
    <div class="message_footer" style="background-color: #2596be;color:#fff">

            Ja nesanāk ieraksties uz noteikto laiku lūdzam atcelt rezervējumu nospiežot uz saites: <a href="<?php echo base_url() . "/deleteApp/" . $pieteikuma_id?>">Atcelt reģistrāciju</a>
    </div>
</body>
</html>