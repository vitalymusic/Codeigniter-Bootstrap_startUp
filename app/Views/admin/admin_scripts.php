<script>
$(document).ready(()=>{

    $('.delbtn').click((e)=>{
        if(confirm("Tiešām izdzēst?")){
            id = e.target.dataset.id;
            $.get("<?= base_url()?>/deleteApp/"+id,function(data){
                location.reload();
                })
         }
        
    })

    $('.save_user').click(()=>{
        if($('[name="users_name"]').val()=="" || 
        $('[name="users_surname"]').val()=="" || 
        $('[name="users_email"]').val()=="" || 
        $('[name="users_phone"]').val()=="" || 
        $('[name="working_days"]').val()=="" || 
        $('[name="place"]').val()=="0"){
            $('.alert-danger').remove();
            $('form').append(`
            <div class="alert alert-danger" role="alert">
                Aizpildiet lūdzu visus laukus!
                </div>
            `);
        }else{
            $('.alert-danger').remove();
            data = $('form#new_user').serialize();
            $.post('<?= base_url('admin'); ?>/save_user',data,function(data){
                if(data=="success"){
                    location.href = "<?=base_url('admin')?>/users";
                }
            })
        } 
        
        
    })

    $('.deleteUsersBtn').click(function(){
        if(confirm("Tiešām izdzēst?")){
            id = $(this).attr('data-user_id');
            $.get('<?=base_url('admin/delete_user')?>/' + id, function(data){
            console.log(data);
        })
        } 
    })

    $('.setPasswordBtn').click(function(){
        id = $(this).attr('data-user_id');
        location.href = "<?=base_url('admin/set_password')?>/"+id
    })
})



// Functions


function load_places(){
        $.get('<?=base_url()?>/get_places',function(data){
            data.forEach((item)=>{
                $('#place').append(`
                    <option value="${item.id}">${item.nosaukums} ${item.adrese}</option>`);
            })
        })
        }
</script>