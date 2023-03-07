<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



<script>
    $(document).ready(()=>{
        select1 = $("select[name='service_select']");
        select2 = $("select[name='address_select']");
        select3 = $("input[name='service_date']"); 
        select4 = $("select[name='master_select']"); 
        $('.clientForm').hide();
        // select2.attr("disabled",true);
        select3.attr("disabled",true);
        select4.attr("disabled",true);

        $('.step2,.step3,.step4').hide();

        //console.log($("select[name='service_select']"));
        // select1.focus(function(e){
            //console.log(e.target);
            $.get("get_services", function(data){
                select1.empty();
                select1.append(`<option value="">Atveriet lai izvēlētos</option>`);
                for (x in data){
                    $("select[name='service_select']").append(`
                        <option value="${data[x].id}">${data[x].pakalpojums}</option>
                    `);
                }
            })
            $.get("get_places", function(data){
                select2.empty();
                select2.append(`<option value="">Atveriet lai izvēlētos</option>`);
                for (x in data){
                    select2.append(`
                        <option value="${data[x].id}">Salons - "${data[x].nosaukums}" ${data[x].adrese}</option>
                    `);
                }
            })
        
            select1.change(function(e){
                if($(this).val()){
                    select2.attr("disabled",false);
                    $('.step2').show();

                }else{
                    select2.attr("disabled",true);

                    $('.step2,.step3,.step4, .clientForm').hide();
                }
            }) 


           
            select3.change(function(e){
                serviceDate = $(this).val();
                date = new Date(serviceDate);
                weekDay = (date.getDay()==0)? "7": date.getDay();
                
                $.get(`get_masters/${select1.val()}/${select2.val()}/${weekDay}`, function(data){
                    // console.log(data);
                if(data.length != 0){
                select4.empty();
                select4.append(`<option value="">Atveriet lai izvēlētos</option>`);

                for (x in data){
                    select4.append(`
                        <option value="${data[x].id}">${data[x].meistara_vards} ${data[x].meistara_uzvards}</option>
                    `);
                }
            }else{
                select4.empty();
                select4.append(`
                    <option>Šajā datumā neviens nepieņem</option>
                `);  
            }
            })

            if($(this).val()){
                    select2.attr("disabled",false);
                    $('.step3').show();
                }else{
                    select2.attr("disabled",true);
                    $('.step3').hide();
                }

            })
            select2.change(function(e){ 
                if($(this).val()){
                            select3.attr("disabled",false);
                            $('.step3').show();
                        }else{
                            select3.attr("disabled",true);
                            $('.step3').hide();
                        }
            })


            select3.change(function(e){ 
                        //console.log(time);
                    
               
                if($(this).val()){
                            select4.attr("disabled",false);
                            $('.step4').show();
                        }else{
                            select3.attr("disabled",true);
                            $('.step4').hide();
                        }
            })

            select4.change(function(){
                if($(this).val()){
                    $('.clientForm').fadeIn();
                }else{
                    $('.clientForm').fadeOut();
                }
            })

            $('button[type="submit"]').click(function(e){
                    formError = false;
                    e.preventDefault();
                    // Check Form Data
                    if($('input[name="client_name"]').val()==""){
                        $('input[name="client_name"]').addClass('is-invalid');
                        formError = true;

                    }else{
                        $('input[name="client_name"]').removeClass('is-invalid');
                        formError = false;
                    }
                    if($('input[name="client_surname"]').val()==""){
                        $('input[name="client_surname"]').addClass('is-invalid');
                        formError = true;
                    }else{
                        $('input[name="client_surname"]').removeClass('is-invalid');
                        formError = false;
                    }
                    if($('input[name="client_phone"]').val()==""){
                        $('input[name="client_phone"]').addClass('is-invalid');
                        formError = true;    
                    }else{
                        $('input[name="client_phone"]').removeClass('is-invalid');
                        formError = false;
                    }
                    if($('input[name="client_email"]').val()==""){
                        $('input[name="client_email"]').addClass('is-invalid');
                        formError = true;
                    }else{
                        $('input[name="client_email"]').removeClass('is-invalid');
                        formError = false;
                    }

                    if(formError == false){

                    
                    $('button[type="submit"]').append(`
                    <div class="spinner-border text-light spinner-border-sm mx-1" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                        `);
                        
                    data = $('#Pieteikuma_forma1').serialize();
                    $.post(`putApplication`,data,function(){
                        
                    }).then(function(data){
                        $('.clientForm').html(`
                                <h3 class="text-center">Jūsu pieteikums ir veiksmīgi reģistrēts</h3>
                                <div class="container">
                                    <p class="fw-bold">Pieteikuma detaļas:</p>
                                    <p>Pakalpojuma datums: <b>${data[0].datums}</b><p>
                                    <p>Pakalpojuma adrese: <b>Frizētava "${data[0].nosaukums}" ${data[0].adrese}</b><p>
                                    <p>Pakalpojuma meistare: <b>${data[0].meistara_vards} ${data[0].meistara_uzvards}</b><p>
                                    <p>Pakalpojuma nosaukums: <b>${data[0].pakalpojums}</b><p>
                                    <p >
                                        ${data[0].google_maps} 
                                    </p>
                                    <p>Paldies par pieteikumu. Pakalpojuma laiku saskaņos mūsu administrātors</p>
                                    <div class="text-center">
                                        <button class="btn btn-danger" onclick="location.reload();">Aizvērt logu</button>
                                    </div>
                                </div>

                        `);
                        // console.log(data);
                    })
                }
            })

    })
</script>