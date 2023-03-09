<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?> lietotājam <?= $user->meistara_vards?>  <?= $user->meistara_uzvards?></h1>
<div class="container">

<form id="set_password_form"> 
<div class="row">
      
        <div class="col-md-6">
            <div class="mb-3">
                    <label for="password" class="form-label">Parole</label>
                    <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                    <label for="password" class="form-label">Parole atkārtot</label>
                    <input type="password" class="form-control" id="password_repeat" name="password_repeat">
            </div>
        </div>
        </div>
       
    </div>
    <div class="row justify-content-center mt-5">
            <div class="col-md-6 d-flex justify-content-end ">
                <button type="button" class="btn btn-danger d-block save_password_Btn disabled">Saglabāt paroli</button>
            </div>
         
    </div>
    <input type="hidden" name="userId" value="<?=$user->id?>">
    </form> 
    <script>
        $('input[name="password_repeat"]').keyup(function(){
            if($('input[name="password"]').val() !== $('input[name="password_repeat"]').val()){
                $('.alert-danger').remove();
                $('.save_password_Btn').addClass('disabled');
                $('#set_password_form').parent().append(`
                    <div class="alert alert-danger" role="alert">
                        Paroles nesakrīt
                    </div>
                `);
            }else{
                $('.alert-danger').remove();
                $('.save_password_Btn').removeClass('disabled');
            }
        })
    </script>

    <script>
        $('.save_password_Btn').click(function(){
           let userId = $('input[name="userId"]').val();
            if($('input[name="password"]').val().length >= 6 && $('input[name="password_repeat"]').val().length >= 6){
                data = $('#set_password_form').serialize();
                $.post('<?= base_url('admin/updateUserPassword');?>/'+userId,data,function(data){
                    if(data=="success"){
                        $('#set_password_form').parent().append(`
                            <div class="alert alert-success text-center" role="alert">
                                Parole veiksmīgi saglabāta
                            </div>
                         `);
                    setTimeout(() => {
                        $('.alert-success').hide();
                        location.href = "<?=base_url('admin')?>/users";
                    }, 1000); 
                }
                });
            }else{
                $('#set_password_form').parent().append(`
                    <div class="alert alert-danger text-center" role="alert">
                        Parolē jābūt vismaz 6 simboliem
                    </div>
                `);
            }
        })
    </script>
    <?php include("footer.php")?>