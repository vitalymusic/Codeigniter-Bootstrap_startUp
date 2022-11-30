<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>

<?php //var_dump($pasutijumi)?>
<?php 


function dateFormat($mysqldate){
    $phpdate = strtotime( $mysqldate );
    return date( 'd.m.Y', $phpdate );
}
?>

<div class="container">
    <table class="table table-striped">
        <tr>
            <td>Pasūtījuma datums</td>
            <td>Pasūtījuma laiks</td>
            <td>Klienta vārds uzvārds</td>
            <td>Klienta tālrunis</td>
            <td>Klienta epasts</td>
            <td>Pakalpojums</td>
            <td>Darbības</td>
        </tr>
        <?php foreach($pasutijumi as $item): ?>
           <tr>
                <td><?=dateFormat($item["datums"])?></td>
                <td><?=$item["laiks"]?>:00</td>
                <td><?=$item["klienta_vards"]?> <?=$item["klienta_uzvards"]?></td>
                <td><?=$item["klienta_talrunis"]?></td>
                <td><?=$item["klienta_epasts"]?></td>
                <td><?=$item["pakalpojums"]?></td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-sm">
                        Atzīmēt kā izpildītu</button>
                        <button type="button" class="btn btn-outline-danger btn-sm">Izdzēst</button>

                </td>

           </tr>     

        <?php endforeach; ?>    
    </table>
</div>



<?php include("footer.php")?>