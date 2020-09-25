$(document).ready(function(){
    $("#registerBtn").on('click',function(){
       $('.loginModalTeamofit').hide(); 
       $('.registerModalTeamofit').show(); 
       $('.modal-title').html('ورود به تیموفیت')
    });
    $("#loginBtn").on('click',function(){
       $('.loginModalTeamofit').show(); 
       $('.registerModalTeamofit').hide(); 
       $('.modal-title').html('ثبت نام در تیموفیت')
    });
});