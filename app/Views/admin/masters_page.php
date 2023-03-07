<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>

<?php //var_dump($meistari)?>
<?php 

?>

<div class="container main_screen">
    <table class="table table-striped">
        <tr>
            <td>Vārds uzvārds</td>
            <td>Tālrunis</td>
            <td>Epasts</td>
           
            <td>Darba dienas</td>
            <td>Darbības</td>
        </tr>
        <?php foreach($meistari as $item): ?>
           <tr>
                <td><?=$item["meistara_vards"]?> <?=$item["meistara_uzvards"]?></td>
                <td><?=$item["meistara_talr"]?></td>
                <td><?=$item["meistara_epasts"]?></td>
                
                <td><?=$item["pieejamas_dienas"]?></td>
                <td>
                <div class="buttons">
                    <button type="button" class="btn btn-outline-primary btn-sm editUsersBtn" data-user_id="<?=$item["id"]?>">Rediģēt</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm setPasswordBtn" data-user_id="<?=$item["id"]?>">Iestatīt paroli</button>
                    <button type="button" class="btn btn-outline-danger btn-sm deleteUsersBtn" data-user_id="<?=$item["id"]?>">Izdzēst</button>
                 </div>    
                </td>

           </tr>     

        <?php endforeach; ?>    
    </table>

    <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('admin/create_user')?>'">+ Pievienot jaunu</button>
</div>



<?php include("footer.php")?>