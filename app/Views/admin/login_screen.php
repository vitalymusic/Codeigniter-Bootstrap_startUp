<?php include("header.php")?>
<?php 

    
?>

    <div class="container main_screen">
        <div class="row justify-content-md-center">

        
         <div class="col-md-4 mt-5">   
            <form action="<?php echo base_url();?>/authorize" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jūsu epasts</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jūsu parole</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn btn-danger">Ielogoties</button>
                </div>
            </form>
        </div> 
        </div>   
    </div>
    <div class="container">
        <?php if(isset($wrong_user) && $wrong_user == true) :?>
            <div class="alert alert-danger text-center" role="alert">
                 Nepareizs lietotājvārds un/vai parole
             </div>
        <?php endif;?>     
    </div>

<?php include("footer.php")?>