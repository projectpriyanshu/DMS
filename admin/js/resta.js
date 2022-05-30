
        $(document).ready(function() {
            $('#country').on('change', function(){
                var country_id = this.value;
               $.ajax({
                    url: "state.php",
                    type: "POST",
                    data: {
                    country_id: country_id
                    },
                    cache: false,
                    success: function(result){
                    $("#state").html(result);
                    }
                    });
            });


            $('#state').on('change', function(){
                var state_id= this.value;
                $.ajax({
                    url:'city.php',
                    type:'POST',
                    data:{
                        state_id:state_id
                    },
                    cache: false,
                    success:function(result)
                    {
                        $('#city').html(result);
                    }
                });
            });
        });


        // add restaurent old Coding

        function validate()
        {
           
            var rname= document.getElementById('rname').value;
            var address= document.getElementById('address').value;
            var country=document.getElementById('country').value;
            var state=document.getElementById('state').value;
            var city=document.getElementById('city').value;
            var pincode=document.getElementById('pincode').value;
            var status="";
            
            $('input[type="checkbox"]').click(function(){
                if($(this).prop("checked") == true){
                    status = '1';
    
                }
                else if($(this).prop("checked") == false){
                    status = '0';
                }
            });

            alert(status);
            $.ajax({
                type:'POST',
                url:'addRestData.php',
                data:{
                    rname:rname,
                    address:address,
                    country:country,
                    state:state,
                    city:city,
                    pincode:pincode,
                    status : status
                },
                cache: false,
                success:function(result)
                {
                    
                    var a=result;
                    if(a == "Name Required !")
                    {
                       $('.nameErr').html(result);
                            setTimeout(function(){
                                $(".nameErr").html("");
                            },5000);
                    } 
                    else if(a=="Address Required !")
                    {
                        $('.addressErr').html(result);
                        setTimeout(function(){
                                $(".addressErr").html("");
                            },5000);
                    } 
                    else if(a == "Country Required !")
                    {
                        $('.countryErr').html(result);
                        setTimeout(function(){
                                $(".countryErr").html("");
                            },5000);
                    }
                    else if(a == "State Required !")
                    {
                        $('.stateErr').html(result);
                        setTimeout(function(){
                                $(".stateErr").html("");
                            },5000);
                    }
                    else if(a == "City Required !")
                    {
                        $('.cityErr').html(result);
                        setTimeout(function(){
                                $(".cityErr").html("");
                            },5000);
                    }
                    else if(a == "Pin Code Required !")
                    {
                        $('.pinErr').html(result);
                        setTimeout(function(){
                                $(".pinErr").html("");
                            },5000);
                    }
                    else
                    {
                            var check = result;

                            if(check == 'Restaurant is already Define')
                            {
                                alert(result);
                            }
                            else
                            {   alert(result);
                                window.location.href ='manageResta.php';
                            }
                    }
                                      
                }
            });
            return false;

        }


// add and remove input field

 $(document).ready(function(){
    $("#contact-btn").on("click",function(e){
        e.preventDefault();
        
          $(".temp_contact").removeClass("d-none");
          $("#contact-btn").addClass("d-none");


    });

     $("#temp-contact-btn").on("click",function(e){
        e.preventDefault();
        
          $(".temp_contact2").removeClass("d-none");
          $("#temp-contact-btn").addClass("d-none");

    });
     $("#temp-contact-btn2").on("click",function(e){
        e.preventDefault();
        
          $(".temp_contact2").addClass("d-none");
          $("#temp-contact-btn").removeClass("d-none");
    });



     $("#email-btn").on("click",function(e){
        e.preventDefault();
        
          $(".temp_email").removeClass("d-none");
          $("#email-btn").addClass("d-none");

    });

      $("#temp-email-btn").on("click",function(e){
        e.preventDefault();
        
          $(".temp_email2").removeClass("d-none");
          $("#temp-email-btn").addClass("d-none");

    });

       $("#temp-email-btn2").on("click",function(e){
        e.preventDefault();
        
          $(".temp_email2").addClass("d-none");
          $("#temp-email-btn").removeClass("d-none");
    });



});


//Add restaurent New Coding
$(document).ready(function(){
    $("#add-restautent").on("submit",function(e){
        e.preventDefault();

        var input = document.getElementsByClassName("required");

        var temp=[];
    $(input).each(function(i){

            var a= $(this).val();
            
            if( $(this).val().trim() == ''  || $(this).val().trim() == 'Select Country' || $(this).val().trim() == 'Select State' || $(this).val().trim() == 'Select City' || $(this).val().trim() == null )
            {
                if(this.nextSibling.nodeName == "SMALL")
                {
                    this.nextSibling.remove();
                }
                
                var link = $(this).parent("div").find("label");

                $(this).addClass("border-danger");
                $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>"+link.text()+" is required</small>").insertAfter(this);
            }
            else
            {
                temp[i] = $(this).val().trim();
                if(this.type == "email")
                {
                    validate_email(this);
                }
            }


    });


    if(temp.length == input.length && $(".required-notice").length == 0)
    {
        $.ajax({
            url:"addRestData.php",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(result)
            {
                if($.trim(result) == "Invalide File Format")
                {
                    var input = document.getElementById("file_data");
                    
                   if(input.nextSibling.nodeName == "SMALL")
                    {
                        input.nextSibling.remove();
                    }

                    $(input).addClass("border-danger");
                    $("<small class='text-danger '><i class='fas fa-exclamation-triangle'></i>Invalide File Format</small>").insertAfter(input); 
                    setTimeout(function(){
                            $(input).removeClass("border-danger");
                            input.nextSibling.remove();
                        },5000); 

                }
                else if( $.trim(result) == "Success")
                {
                    setTimeout(function() {
                                $(window).attr('location','manageResta.php');
                            }, 2000);
                                            

                                 toastr.options.timeOut = 2500; // 1.5s
                                 toastr.success('Record Add Successfully');

                }
                else if($.trim(result) == "already Exists")
                {
                     toastr.options.timeOut = 2500; // 1.5s
                     toastr.error('Restaurent name is already exist');
                }
                else
                {
                    alert($.trim(result));
                }
                
            }
                   
        }); 
    
    }

    // remove require message on input
    $(input).each(function(){
        $(this).on("input",function(){

            if(this.nextSibling.nodeName == "SMALL")
            {
                $(this).removeClass("border-danger");
                this.nextSibling.remove();
            }
        });
    });

    function validate_email(input)
    {
    var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(!reg.test(input.value))
        {
            if(input.nextSibling.nodeName == "SMALL")
                    {
                        input.nextSibling.remove();
                    }

                    $(input).addClass("border-danger");
                    $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Enter a valide email id</small>").insertAfter(input);
        }
    }



    });
});



//Edit and update Restaurants details

$(document).ready(function(){

    $("#editResta").on('submit',function(e){
        e.preventDefault();
        var input = document.getElementsByClassName("required");

        var temp=[];
    $(input).each(function(i){

            var a= $(this).val();
            
            if( $(this).val().trim() == ''  || $(this).val().trim() == 'Select Country' || $(this).val().trim() == 'Select State' || $(this).val().trim() == 'Select City' || $(this).val().trim() == null )
            {
                if(this.nextSibling.nodeName == "SMALL")
                {
                    this.nextSibling.remove();
                }
                 var link = $(this).parent("div").find("label");

                $(this).addClass("border-danger");
                $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>"+link.text()+" is required</small>").insertAfter(this);
            }
            else
            {
                temp[i] = $(this).val().trim();
                if(this.type == "email")
                {
                    validate_email(this);
                }
            }


    });


    if(temp.length == input.length && $(".required-notice").length == 0)
    {
        $.ajax({
            url:"edit_restra.php",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(result)
            {
                if($.trim(result) == "Invalide File Format")
                {
                    var input = document.getElementById("file_data");
                    
                   if(input.nextSibling.nodeName == "SMALL")
                    {
                        input.nextSibling.remove();
                    }

                    $(input).addClass("border-danger");
                    $("<small class='text-danger '><i class='fas fa-exclamation-triangle'></i>Invalide File Format</small>").insertAfter(input); 
                    setTimeout(function(){
                            $(input).removeClass("border-danger");
                            input.nextSibling.remove();
                        },5000); 

                }
                else if( $.trim(result) == "Success")
                {
                    
                    setTimeout(function() {
                                $(window).attr('location','manageResta.php');
                            }, 2000);
                                            

                                 toastr.options.timeOut = 2500; // 1.5s
                                 toastr.success('Data Update Successfully');
                }
                else
                {
                    alert($.trim(result));
                }
            }
                   
        }); 

    }

    // remove require message on input
    $(input).each(function(){
        $(this).on("input",function(){

            if(this.nextSibling.nodeName == "SMALL")
            {
                $(this).removeClass("border-danger");
                this.nextSibling.remove();
            }
        });
    });

    function validate_email(input)
    {
    var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(!reg.test(input.value))
        {
            if(input.nextSibling.nodeName == "SMALL")
                    {
                        input.nextSibling.remove();
                    }

                    $(input).addClass("border-danger");
                    $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Enter a valide email id</small>").insertAfter(input);
        }
    }





    });      

});
  



//Edit and update Managers details

$(document).ready(function(){
    // var status = "";
    //     $('input[type="checkbox"]').click(function(){
    //         if($(this).prop("checked") == true){
    //             status = '1';

    //         }
    //         else if($(this).prop("checked") == false){
    //             status = '0';
    //         }
    //     });

    

    $("#edit_manager_btn").click(function(){

        // var yes = document.getElementById("status");
        var status="";
        // if (yes.checked == true){
        //        status=1;
        // } 
        // else if (yes.checked == false){
        //    status=0;
        // }

        $.ajax({
            type : "POST",
            url : "edit_manager.php",
            data : {
                id : $("#r_id").val(),
                fname : $("#fname").val(),
                lname : $("#lname").val(),
                email : $("#email").val(),
                address : $("#address").val(),
                restaurant : $("#restaurant").val(),
                country : $("#country").val(),
                state : $("#state").val(),
                city : $("#city").val(),
                post_code : $("#pincode").val(),
                status : status,
            },
            success : function(response){
                               
                   var a    = response;
                   if($.trim(a) == 'Success')
                    {
                            // alert("done");

                        alert("Data Update Successfully");
                       window.location.href='manageManager.php';
                   }
                   else
                   {
                        alert(response);
                   }
                   // else
                   // {
                   //      alert(response);
                   // }

            }
        });
    });
});
  

// Job Role Add

 $(document).ready(function(){
    $("#jobrole").on("submit",function(e){
        e.preventDefault();
        
        $.ajax({
            type:"POST",
            url:"jobAddData.php",
            data: {
                job_role : $("#role_name").val()
            },
            success:function(result)
            {
                if($.trim(result) == "require")
                {
                    $(".error").html("Jab Role is Required");
                    setTimeout(function(){
                                $(".error").html("");
                            },5000);
                }
                else if($.trim(result) == "Job Role is already exist")
                {
                    $(".error").html("Job Role is already exist !");
                    setTimeout(function(){
                                $(".error").html("");
                            },5000);
                }
                else if($.trim(result) == "Success")
                {
                    alert("Job Role is add Successfully");
                    window.location.href="jobRole.php";
                }
                else
                {
                     $(".error").html(result);
                    setTimeout(function(){
                                $(".error").html("");
                            },5000); 
                }


            }
        });
    });
});


 // job Role Update


  $(document).ready(function(){
    $("#jobrole_update").on("submit",function(e){
        e.preventDefault();

             var yes = document.getElementById("status");
        var status="";
        if (yes.checked == true){
               status=1;
        } 
        else if (yes.checked == false){
           status=0;
        }

        
        $.ajax({
            type:"POST",
            url:"jobEditData.php",
            data: {
                id:$("#id").val(),
                job_role : $("#role_name").val(),
                job_role_dummy : $("#role_name_dummy").val(),
                status:status
            },
            success:function(result)
            {
                if($.trim(result) == "require")
                {
                    $(".error").html("Jab Role is Required");
                    setTimeout(function(){
                                $(".error").html("");
                            },5000);
                }
                else if($.trim(result) == "Job Role is already exist")
                {
                    $(".error").html("Job Role is already exist !");
                    setTimeout(function(){
                                $(".error").html("");
                            },5000);
                }
                else if($.trim(result) == "Update")
                {
                    alert("Job Role is Update Successfully");
                    window.location.href="jobRole.php";
                }
                else
                {
                     $(".error").html(result);
                    setTimeout(function(){
                                $(".error").html("");
                            },5000); 
                }

            }
        });
    });
});
