<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>

<?php //var_dump($meistari)?>
<?php 

?>

<div class="container main_screen">
    <form id="new_user">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Vārds</label>
                <input type="text" class="form-control" id="name" name="users_name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="surname" class="form-label">Uzvārds</label>
                <input type="text" class="form-control" id="surname" name="users_surname">
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Ēpasts</label>
                <input type="email" class="form-control" id="email" name="users_email">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Tālrunis</label>
                <input type="text" class="form-control" id="phone" name="users_phone">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="working_days" class="form-label">Darba dienas</label>
                <input type="email" class="form-control" id="working_days" name="working_days" placeholder="Piem: 1,2,4,5">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="place" class="form-label">Frizētava</label>
                <select class="form-select" aria-label="Default select example" id="place" name="place">
                    <option selected value="0">Izvēlieties</option>
                </select>
            </div>
        </div>
    </div> 
</form>
    <div class="d-flex justify-content-end">
        <button class="btn btn-danger save_user">
            Saglabāt lietotāju
        </button>
    </div> 
    
    
    


</div>

<?php include("footer.php")?>
<script>
    $(document).ready(()=>{
     load_places();
    })
</script>