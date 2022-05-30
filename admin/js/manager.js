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


    function validate()
    {
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                status = '1';

            }
            else if($(this).prop("checked") == false){
                status = '0';
            }
        });
        
        $.ajax({
            url:'addManagerData.php',
            type:'POST',
            data:{
                fname:$('#fname').val(),
                lname:$('#lname').val(),
                pass:$('#pass').val(),
                email:$('#email').val(),
                rname:$('#rname').val(),
                address:$('#address').val(),
                country:$('#country').val(),                
                state:$('#state').val(),                
                city:$('#city').val(),
                pincode:$('#pincode').val(),
                status:$('#status').val()

            },
            cache:false,
            success:function(result)
            {
                var a = result;
                    if(a == "First Name Required !")
                    {
                       $('.fnameErr').html(result);
                            setTimeout(function(){
                                $(".nameErr").html("");
                            },5000);
                    }
                    else if(a == "Last Name is Required !")
                    {
                       $('.lnameErr').html(result);
                            setTimeout(function(){
                                $(".nameErr").html("");
                            },5000);
                    } 
                    else if(a == "Email Required !")
                    {
                       $('.emailErr').html(result);
                            setTimeout(function(){
                                $(".nameErr").html("");
                            },5000);
                    }
                    else if(a == "Password is Required !")
                    {
                       $('.passErr').html(result);
                            setTimeout(function(){
                                $(".nameErr").html("");
                            },5000);
                    }
                    else if(a == "Restaurant Required !")
                    {
                       $('.rnameErr').html(result);
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
                        var check= result;
                        
                        if(check =="Manager is already Exist")
                        {
                            alert(result);
                        }
                        else
                        {
                            alert("Data Insert Success");
                            window.location.href= "manageManager.php";
                        }
                    }
            }
        });
        return false;
    }


// add Employee Data

    $(document).ready(function(){

        $('#EmployeeAdd').on('submit',function(e){
            e.preventDefault();

             var passport = $(".passport").val();
                            if(passport != "")
                            {
                                
                                $(".passport-exp").addClass("required");
                            }
                            else
                            {
                                $(".passport-exp").removeClass("required");
                                $(".passport-exp").val('');
                     
                                $(".passport-exp").removeClass("border-danger");
                                $(".passport-exp").next().remove();

                            }
             
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

                        window.scrollTo(0,0);
                         $(this).addClass("border-danger");
                         $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>"+link.text()+" is Required</small>").insertAfter(this);
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
                    type:"POST",
                    url:"employeeAddData.php",
                    data : new FormData(this),
                    contentType:false,
                    processData:false,
                    beforeSend:function(){
                        $(".add-emp").attr("disabled");
                        $(".add-emp").html("Processing... Please Wait");
                    },
                    success:function(result)
                    {
                        if($.trim(result) == "done")
                        {
                            
                             setTimeout(function() {
                            $(window).attr('location','employeeManage.php');
                        }, 2000);
                                        

                             toastr.options.timeOut = 2500; // 1.5s
                             toastr.success('Data Add Successfully');

                        }
                        else if($.trim(result) == "Email Id is already Exist")
                        {
                                var email = document.getElementsByClassName("email-val");
                                $(email).addClass("border-danger");
                                $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i> Email is already exist !</small>").insertAfter(email);
                                 
                                toastr.options.timeOut = 2000; // 1.5s
                                toastr.error('Email is already Exist !');
                        }
                        else
                        {
                            // alert(result);
                            $(".mas").html(result);
                        }


                        // $(".msg").html(result);
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

         $("#jobrole").on("change",function(){
                var manager = this.value;
                
                if(this.value == "6")
                {
                    $(".manager-user").removeClass("d-none");
                    $(".user-name").addClass("required");
                    $(".password").addClass("required");


                // var a = $(".user-name").val();
                // // alert(a);

                //       $(".user-name").val(a);
                //      // $(".password").val('');

                }
                else
                {


                      $(".user-name").val('');
                     $(".password").val('');
                     
                     $(".user-name").removeClass("border-danger");
                     $(".password").removeClass("border-danger");
                     $(".user-name").next().remove();
                     $(".password").next().remove();


                    $(".user-name").removeClass("required");
                    $(".password").removeClass("required");

                    
                    $(".manager-user").addClass("d-none");

                }
            });

         // Contact Number Validate
        $(".contact").on("keyup",function(){
            var value = $(this).val();
            // alert(value);
            if(value.length <  6 || value.length >12)
            {
                if(this.nextSibling.nodeName == "SMALL")
                    {
                        this.nextSibling.remove();
                    }
                    $(this).addClass("border-danger");
                    $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Contact numbers must be between 6 and 12 digits</small>").insertAfter(this);
                
            }
            else
            {
                $(this).removeClass("border-danger");
                 $(this).next().remove();
            }

            if( value == "")
            {
                 $(this).removeClass("border-danger");
                 $(this).next().remove();   
            }
            
        });

        // Date Validate

        var date = document.getElementsByClassName("date-val");
        $(date).on("change",function(){
            var val= $(this).val();

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            // alert(today);

            if(val < today)
            {
                if(this.nextSibling.nodeName == "SMALL")
                    {
                        this.nextSibling.remove();
                    }
                    $(this).addClass("border-danger");
                    $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Date is not valide</small>").insertAfter(this);
            }
            else
            {
                $(this).removeClass("border-danger");
                $(this).next().remove();
            }

        }); 

         // file validate
         var file = document.getElementsByClassName("FilUploader");
         $(file).each(function(){
            $(this).on("change",function(){
                   
                 var fileExtension = ['jpeg','jpg'];
                
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1){
                    // alert("Only formats are allowed : "+fileExtension.join(', '));
                     if(this.nextSibling.nodeName == "SMALL")
                        {
                            this.nextSibling.remove();
                        }
                        $(this).addClass("border-danger");
                        $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Only jpeg jpg formats are allowed </small>").insertAfter(this);
                    }
                    else if( this.files[0].size > 2000000)
                    {
                        if(this.nextSibling.nodeName == "SMALL")
                        {
                            this.nextSibling.remove();
                        }
                        $(this).addClass("border-danger");
                        $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Please upload file less than 2MB. Thanks! </small>").insertAfter(this);
                        // alert("Please upload file less than 2MB. Thanks!!");
                        // $(this).val('');
                    }
                    else
                    {
                                 $(this).removeClass("border-danger");
                                 $(this).next().remove();  
                    }

                    if($(this).val() == "")
                    {
                        $(this).removeClass("border-danger");
                        $(this).next().remove();   
                    }

            });   
         });


       // $("input[type='file']").on("change", function () {
       //   if(this.files[0].size > 2000000) {
       //     alert("Please upload file less than 2MB. Thanks!!");
       //     $(this).val('');
       //   }
       //  });



 // file validate

      $(".brp").on("change",function(){    
        var data = $(".brp").val();
        var file1 = document.getElementsByClassName("brp-exp");
        
            if(data != "")
            {
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });


        $(".ecs").on("change",function(){    
        var data = $(".ecs").val();
        var file1 = document.getElementsByClassName("ecs-exp");
        
            if(data != "")
            {
                
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });


        $(".driving").on("change",function(){    
        var data = $(".driving").val();
        var file1 = document.getElementsByClassName("driving-exp");
        
            if(data != "")
            {
                
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });

         $(".car").on("change",function(){    
        var data = $(".car").val();
        var file1 = document.getElementsByClassName("car-exp");
        
            if(data != "")
            {
                
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });


          $(".tax").on("change",function(){    
        var data = $(".tax").val();
        var file1 = document.getElementsByClassName("tax-exp");
        
            if(data != "")
            {
                
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });

           $(".mot").on("change",function(){    
        var data = $(".mot").val();
        var file1 = document.getElementsByClassName("mot-exp");
        
            if(data != "")
            {
                
                $(file1).addClass("required");
            }
            else
            {
               file_validate(file1);
            }
        });

        function file_validate(file1)
        {
            $(file1).removeClass("required");
            $(file1).val('');
 
            $(file1).removeClass("border-danger");
            $(file1).next().remove();

        }

    });


// update empoloyee Data
    
    $(document).ready(function(){

        $('#updateEmployee').on('submit',function(e){
            e.preventDefault();
             var passport = $(".passport").val();
                            if(passport != "")
                            {
                                
                                $(".passport-exp").addClass("required");
                            }
                            else
                            {
                                $(".passport-exp").removeClass("required");
                                $(".passport-exp").val('');
                     
                                $(".passport-exp").removeClass("border-danger");
                                $(".passport-exp").next().remove();

                            }
             
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

                        window.scrollTo(0,0);
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
                    type:"POST",
                    url:"employeeEditData.php",
                    data : new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(result)
                    {
                        if($.trim(result) == "done")
                        {
                             setTimeout(function() {
                                $(window).attr('location','employeeManage.php');
                            }, 2000);
                                            

                                 toastr.options.timeOut = 2500; // 1.5s
                                 toastr.success('Data Update Successfully');

                        }
                        else
                        {
                            // alert(result);
                            $(".mas").html(result);

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



    $(document).ready(function(){
        // Document Approve and Reject

           $(".approve").on("click",function(){
                var a= $(this).prev().val();

                var r = confirm("Do you want to approve documents ? ");
                if (r == true) {
                     $.ajax({
                    url:"documentApprove.php",
                    type:"POST",
                    data: {
                        id:a
                    },
                    success:function(result)
                    {
                        if($.trim(result) == "Done")
                        {
                            toastr.options.timeOut = 2500; // 1.5s
                            toastr.success('Document Approve Successfully');  

                             
                             setTimeout(function() {
                                location.reload();
                            }, 2000);

                        }
                        else
                        {
                            toastr.options.timeOut = 2500; // 1.5s
                            toastr.error($.trim(result));      
                        }

                         
                    }
                });
                }             
            });

            $(".reject").on("click",function(){
                var a= $(this).prev().prev().val();
               var r = confirm("Do you want to reject documents ? ");
                if (r == true) {
                     $.ajax({
                    url:"documentReject.php",
                    type:"POST",
                    data: {
                        id:a
                    },
                    success:function(result)
                    {
                        if($.trim(result) == "Done")
                        {
                            toastr.options.timeOut = 2500; // 1.5s
                            toastr.error('Document Reject Successfully');  

                            setTimeout(function() {
                                location.reload();
                            }, 2000); 
                        }
                        else
                        {
                            toastr.options.timeOut = 2500; // 1.5s
                            toastr.error($.trim(result));      
                        }
                    }
                });
                }
        });
    });




    // employee send mail link


$(document).ready(function(){
    $("#EmployeeSendMail").on("submit",function(e){
        e.preventDefault();

        var passport = $(".passport").val();
                            if(passport != "")
                            {
                                
                                $(".passport-exp").addClass("required");
                            }
                            else
                            {
                                $(".passport-exp").removeClass("required");
                                $(".passport-exp").val('');
                     
                                $(".passport-exp").removeClass("border-danger");
                                $(".passport-exp").next().remove();

                            }
             
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

                        window.scrollTo(0,0);
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
                    type:"POST",
                    url:"EmployeeSendMailData.php",
                    data : new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(result)
                    {
                        if($.trim(result) == "done")
                        {
                             setTimeout(function() {
                                $(window).attr('location','UpdateSuccess.php');
                            }, 2000);
                                            

                                 toastr.options.timeOut = 2500; // 1.5s
                                 toastr.success('Data Update Successfully');

                        }
                        else
                        {
                            // alert(result);
                            $(".mas").html(result);

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