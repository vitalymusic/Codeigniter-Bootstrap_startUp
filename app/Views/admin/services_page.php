<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>
<?php 

?>

<div class="container main_screen">
    <table class="table table-striped">
        <tr>
            <td>N.p.k</td>
            <td>Pakalpojums</td>
            <td>Darbības</td>
        </tr>
        <?php foreach($pakalpojumi as $index=>$item): ?>
           <tr>
                <td><?=$index+1?></td>
                <td><?=$item["pakalpojums"]?></td>
               
                <td>
                <div class="buttons">
                    <button type="button" class="btn btn-outline-primary btn-sm editBtn">Rediģēt</button>
                    <button type="button" class="btn btn-outline-danger btn-sm deleteBtn">Izdzēst</button>
                </div>
                </td>

           </tr>     

        <?php endforeach; ?>    
    </table>

    <button type="button" class="btn btn-primary">+ Pievienot jaunu</button>
</div>



<?php include("footer.php")?>