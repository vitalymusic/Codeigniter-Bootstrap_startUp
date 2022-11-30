<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>

<?php //var_dump($meistari)?>
<?php 

?>

<div class="container">
    <table class="table table-striped">
        <tr>
            <td>Vārds uzvārds</td>
            <td>Tālrunis</td>
            <td>Epasts</td>
            <td>Pakalpojums</td>
            <td>Darba dienas</td>
            <td>Darba laiks</td>
            <td>Darbības</td>
        </tr>
        <?php foreach($meistari as $item): ?>
           <tr>
                <td><?=$item["meistara_vards"]?> <?=$item["meistara_uzvards"]?></td>
                <td><?=$item["meistara_talr"]?></td>
                <td><?=$item["meistara_epasts"]?></td>
                <td><?=$item["pakalpojums"]?></td>
                <td><?=$item["pieejamas_dienas"]?></td>
                <td><?=$item["pieejamas_stundas"]?></td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-sm editBtn">
                        Rediģēt</button>
                        <button type="button" class="btn btn-outline-danger btn-sm deleteBtn">Izdzēst</button>

                </td>

           </tr>     

        <?php endforeach; ?>    
    </table>

    <button type="button" class="btn btn-primary">+ Pievienot jaunu</button>
</div>



<?php include("footer.php")?>