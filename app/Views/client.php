<?php include "header.php"?>
<div class="container">
    <h1 class="text-center my-3"><?=$title?></h1>
    <form id="Pieteikuma_forma1">
    <div class="row">
        <div class="col-md-3">
            <p class="text-center">1. Izvēlies pakalpojumu</p>
            <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="service_select">
                <option>Atveriet lai izvēlētos</option>
               
            </select>
            </div>  
        </div>
        <div class="col-md-3 step2">
        <p class="text-center">2. Izvēlies datumu</p>
            <div class="form-group">
            <input type="date" name="service_date" id="" class="form-control">
            </div>  
        </div>
        <div class="col-md-3 step3">
        <p class="text-center">3. Izvēlies meistaru</p>
            <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="master_select">
                <option selected>Open this select menu</option>
                <option value="1">Meistars 1</option>
                <option value="2">Meistars 2</option>
                <option value="3">Meistars 3</option>
            </select>
            </div>  
        </div>
      
        <div class="col-md-3 step4">
        <p class="text-center">4. Izvēlies pieejamo laiku</p>
            <div class="form-group">
            <select class="form-select" name="time_select">
                
            </select>
            </div>  
        </div>
       
    </div>
    <div class="row justify-content-md-center">
            
        <div class="col-md-6 mt-5">
            <div class="container clientForm pt-3 pb-3">
            <h3 class="text-center">Aizpildiet datus par sevi</h3>
            <div class="form-group mt-2">
                <label for="client_name">Jūsu vārds</label>
                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Jūsu vārds">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group mt-2">
                <label for="client_surname">Jūsu uzvārds</label>
                <input type="text" class="form-control" id="client_surname" name="client_surname" placeholder="Jūsu uzvārds">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group mt-2">
                <label for="client_phone">Jūsu tālrunis</label>
                <input type="phone" class="form-control" id="client_phone" name="client_phone" placeholder="Jūsu tālrunis">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group mt-2">
                <label for="client_email">Jūsu epasts</label>
                <input type="phone" class="form-control" id="client_email" name="client_email" placeholder="Jūsu epasts">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group text-center mt-5 mb-5">
                    <button type="submit" class="btn btn-outline-primary ">Pieteikties pakalpojumam</button>
            </div>
            </div>
        </div>
    </div>



<!-- te formas beigas -->
    </form>
</div>




<?php include "footer.php"?>


  