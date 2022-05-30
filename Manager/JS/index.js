        $(document).ready(function(){
            $('#form_data').on('submit',function(e){
                e.preventDefault();
                
                var formData = new FormData(this);

                $.ajax({
                    url:'uploadfile.php',
                    type:'POST',
                    data:formData,
                    contentType:false,
                    processData:false,
                    success:function(res)
                    {
                        $('#file_data').val('');
                        // var a =res;
                        // if(a== "File Upload Successful")
                        // {
                        //     alert(res)
                        // }
                        // else
                        // {
                        //     alert(res);
                        // }
                            if($.trim(res) == "File Upload Successful")
                            {
                                alert("Thank's for fill your record and your document Uploaded Successfully");
                                window.location.reload();                               
                            }
                            else
                            {
                                alert(res);
                            }
                            // File Upload Successful

                    }
                });

            });



            
        });



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

$(document).ready(function(){
   $('#update_form').on('submit',function(e){
    e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url:'employeeEditData.php',
            type:'POST',
            data:formData,
            contentType:false,
            processData:false,
           
            success: function(result)
            {
                 var a = result;
                    if($.trim(a) == "First Name is Required")
                    {
                       $('.fnameErr').html(result);
                            setTimeout(function(){
                                $(".fnameErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Last Name is Required")
                    {
                       $('.lnameErr').html(result);
                            setTimeout(function(){
                                $(".lnameErr").html("");
                            },5000);
                    } 
                    else if($.trim(a) == "Email is Required")
                    {
                       $('.emailErr').html(result);
                            setTimeout(function(){
                                $(".emailErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Date Of Join is Required")
                    {
                       $('.dojErr').html(result);
                            setTimeout(function(){
                                $(".dojErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Job Role is Required")
                    {
                       $('.jobroleErr').html(result);
                            setTimeout(function(){
                                $(".jobroleErr").html("");
                            },5000);
                    } 
                    else if($.trim(a)=="Address is Required")
                    {
                        $('.addressErr').html(result);
                        setTimeout(function(){
                                $(".addressErr").html("");
                            },5000);
                    } 
                    else if($.trim(a) == "Country Required !")
                    {
                        $('.countryErr').html(result);
                        setTimeout(function(){
                                $(".countryErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "State Required !")
                    {
                        $('.stateErr').html(result);
                        setTimeout(function(){
                                $(".stateErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "City Required !")
                    {
                        $('.cityErr').html(result);
                        setTimeout(function(){
                                $(".cityErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Pin Code is Required")
                    {
                        $('.pinErr').html(result);
                        setTimeout(function(){
                                $(".pinErr").html("");
                            },5000);
                    }
                    else
                    {  
                        // alert(result);
                        var a =result; 
                        if($.trim(a) == "Success")
                        {
                            alert("Data Update Successfully");
                            window.location.href='employeeManage.php';
                            // alert("documentUpload.php");
                            // html("hiii")
                        }
                        else if($.trim(a) == "SuccessFile Upload Successful")
                        {
                            alert("Data Update Successfully");
                            window.location.href='employeeManage.php';
                        }
                        else
                        {
                            alert(result);
                        }
                    }
            }
        });
   });


   $(document).on("click","#delete",function(){
     if(confirm("Are you sure you want remove this image ?"))
     {
        var path = $("#delete").data("path");
        alert(path);
        // $.ajax({
        //     url:'delete_image.php',
        //     type:'POST',
        //     data:{path:path},
        //     success:function(data)
        //     {
        //         alert(data);
        //     }
        // });
     }
        
   });

});

function update_data()
{   
        // var yes = document.getElementById("status");
        // var status="";
        // if (yes.checked == true){
        //        status=1;
        // } 
        // else if (yes.checked == false){
        //    status=0;
        // }

        var formData = new FormData(this);


        $.ajax({
            url:'employeeEditData.php',
            type:'POST',
            data:formData,
            contentType:false,
            processData:false,
           
            success: function(result)
            {
                alert(result);

                var a = result;
                    // if(a == "First Name Required !")
                    // {
                    //    $('.fnameErr').html(result);
                    //         setTimeout(function(){
                    //             $(".fnameErr").html("");
                    //         },5000);
                    // }
                    // else if(a == trim("Last Name is Required !"))
                    // {
                    //    $('.lnameErr').html(result);
                    //         setTimeout(function(){
                    //             $(".lnameErr").html("");
                    //         },5000);
                    // } 
                    // else if(a == "Email Required !")
                    // {
                    //    $('.emailErr').html(result);
                    //         setTimeout(function(){
                    //             $(".emailErr").html("");
                    //         },5000);
                    // }
                    // else if(a == "Date Of Join is Required !")
                    // {
                    //    $('.dojErr').html(result);
                    //         setTimeout(function(){
                    //             $(".dojErr").html("");
                    //         },5000);
                    // }
                    // else if(a == "Job Role Required !")
                    // {
                    //    $('.jobroleErr').html(result);
                    //         setTimeout(function(){
                    //             $(".jobroleErr").html("");
                    //         },5000);
                    // } 
                    // else if(a=="Address Required !")
                    // {
                    //     $('.addressErr').html(result);
                    //     setTimeout(function(){
                    //             $(".addressErr").html("");
                    //         },5000);
                    // } 
                    // else if(a == "Country Required !")
                    // {
                    //     $('.countryErr').html(result);
                    //     setTimeout(function(){
                    //             $(".countryErr").html("");
                    //         },5000);
                    // }
                    // else if(a == "State Required !")
                    // {
                    //     $('.stateErr').html(result);
                    //     setTimeout(function(){
                    //             $(".stateErr").html("");
                    //         },5000);
                    // }
                    // else if(a == "City Required !")
                    // {
                    //     $('.cityErr').html(result);
                    //     setTimeout(function(){
                    //             $(".cityErr").html("");
                    //         },5000);
                    // }
                    // else if(a == "Pin Code Required !")
                    // {
                    //     $('.pinErr').html(result);
                    //     setTimeout(function(){
                    //             $(".pinErr").html("");
                    //         },5000);
                    // }
                    // else
                    // {   
                    //     // alert(result);
                
                    //     var check = result;
                    //     if(check== trim("Success"))
                    //     {
                    //         window.location.href='employeeManage.php';
                    //         alert(result);
                    //         // alert("employeeDoc.php");

                    //         // $('#link').html("DDiwakar");   
                    //     }
                    //     else
                    //     {
                    //         alert(result);
                    //     }
                    // }
            }

        });
        return false;

}

function validate()
    {
        
        var yes = document.getElementById("status");
        var status="";
        if (yes.checked == true){
               status=1;
        } 
        else if (yes.checked == false){
           status=0;
        }

          
        $.ajax({
            url:'employeeAddData.php',
            type:'POST',
            data:{
                fname:$('#fname').val(),
                lname:$('#lname').val(),
                email:$('#email').val(),
                doj:$('#doj').val(),
                jobrole:$('#jobrole').val(),
                address:$('#address').val(),
                country:$('#country').val(),                
                state:$('#state').val(),                
                city:$('#city').val(),
                pincode:$('#pincode').val(),
                status:status

            },
            cache:false,
            success:function(result)
            {
                
                var a = result;
                    if($.trim(a) == "First Name Required !")
                    {
                       $('.fnameErr').html(result);
                            setTimeout(function(){
                                $(".fnameErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Last Name is Required !")
                    {
                       $('.lnameErr').html(result);
                            setTimeout(function(){
                                $(".lnameErr").html("");
                            },5000);
                    } 
                    else if($.trim(a) == "Email Required !")
                    {
                       $('.emailErr').html(result);
                            setTimeout(function(){
                                $(".emailErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Date Of Join is Required !")
                    {
                       $('.dojErr').html(result);
                            setTimeout(function(){
                                $(".dojErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Job Role Required !")
                    {
                       $('.jobroleErr').html(result);
                            setTimeout(function(){
                                $(".jobroleErr").html("");
                            },5000);
                    } 
                    else if($.trim(a)=="Address Required !")
                    {
                        $('.addressErr').html(result);
                        setTimeout(function(){
                                $(".addressErr").html("");
                            },5000);
                    } 
                    else if($.trim(a) == "Country Required !")
                    {
                        $('.countryErr').html(result);
                        setTimeout(function(){
                                $(".countryErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "State Required !")
                    {
                        $('.stateErr').html(result);
                        setTimeout(function(){
                                $(".stateErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "City Required !")
                    {
                        $('.cityErr').html(result);
                        setTimeout(function(){
                                $(".cityErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Pin Code Required !")
                    {
                        $('.pinErr').html(result);
                        setTimeout(function(){
                                $(".pinErr").html("");
                            },5000);
                    }
                    else if($.trim(a) == "Employee is already Exist")
                    {
                        alert("Employee is already Exist");
                    }
                    else
                    {  
                        // alert(result);
                        var a = result;
                        if($.trim(a) != "0")
                        {
                                alert("Data Insert Successfully ");
                            // // window.location.href='employeeManage.php';
                             window.location.href='documentUpload.php?id='+a;
                            

                            // // alert("documentUpload.php");
                            // // html("hiii")
                            // alert
                        }
                        else
                        {
                            alert(result);
                        }
                    }
            }
        });
        return false;
    }



