<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>

<?php //var_dump($pasutijumi)?>
<?php 


function dateFormat($mysqldate){
    $phpdate = strtotime( $mysqldate );
    return date( 'd.m.Y', $phpdate );
}
?>

<div class="container main_screen">
    <table class="table table-striped">
        <tr>
            <td>Pasūtījuma datums</td>
            
            <td>Klienta vārds uzvārds</td>
            <td>Klienta tālrunis</td>
            <td>Klienta epasts</td>
            <td>Pakalpojums</td>
            <td>Darbības</td>
        </tr>
        <?php foreach($pasutijumi as $item): ?>
           <tr>
                <td><?=dateFormat($item["datums"])?></td>
                
                <td><?=$item["klienta_vards"]?> <?=$item["klienta_uzvards"]?></td>
                <td><?=$item["klienta_talrunis"]?></td>
                <td><?=$item["klienta_epasts"]?></td>
                <td><?=$item["pakalpojums"]?></td>
                <td>
                    <div class="buttons">
                        <!-- <button type="button" class="btn btn-outline-primary btn-sm" data-id="<?//=$item["pieteikuma_id"]?>">
                        Atzīmēt kā izpildītu</button> -->
                        <button type="button" class="btn btn-outline-danger btn-sm delbtn" data-id="<?=$item["pieteikuma_id"]?>">Izdzēst</button>
                    </div>
                </td>

           </tr>     

        <?php endforeach; ?>    
    </table>
</div>


<script>
    setInterval(()=>{
        location.reload();
    },10000)
</script>
<?php include("footer.php")?>