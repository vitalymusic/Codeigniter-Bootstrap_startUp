<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

 

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



<script>
    $(document).ready(()=>{
        select1 = $("select[name='service_select']");
        select2 = $("select[name='master_select']");
        select3 = $("input[name='service_date']"); 
        select4 = $("select[name='time_select']"); 
        $('.clientForm').hide();
        select2.attr("disabled",true);
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
        
            select1.change(function(e){
                if($(this).val()){
                    select3.attr("disabled",false);
                    $('.step2').show();

                }else{
                    select3.attr("disabled",true);
                    $('.step2').hide();
                }
            }) 

           
            select3.change(function(e){
                serviceDate = $(this).val();
                date = new Date(serviceDate);
                weekDay = date.getDay();
                //console.log(weekDay);
                $.get(`get_masters/${select1.val()}/${weekDay}`, function(data){
                if(data.length != 0){
                select2.empty();
                select2.append(`<option value="">Atveriet lai izvēlētos</option>`);

                for (x in data){
                    select2.append(`
                        <option value="${data[x].id}">${data[x].meistara_vards} ${data[x].meistara_uzvards}</option>
                    `);
                }
            }else{
                select2.empty();
                select2.append(`
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
                $.get(`get_masters_time/${$(this).val()}`, function(data){
                    console.log(data);
                    if(data){
                        time = data[0].pieejamas_stundas.split(',');
                        select4.empty();
                        select4.append(`<option value="">Izvēlieties laiku</option>`);
                        for(y in time){
                            select4.append(`
                                <option value="${time[y]}">${time[y]}:00</option>  
                            `);
                        }
                        
                        //console.log(time);
                    }
                })
                if($(this).val()){
                            select4.attr("disabled",false);
                            $('.step4').show();
                        }else{
                            select4.attr("disabled",true);
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
                    e.preventDefault();
                    data = $('#Pieteikuma_forma1').serialize();
                    $.post(`putApplication`,data,function(data){
                        console.log(data);
                    })
            })

    })
</script>
</body>
</html>