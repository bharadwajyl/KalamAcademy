//Global variables
var form_type, serialize, url, result;

//Form buttons onclick
function form_submit(){
    event.preventDefault();
    $("form").css("pointer-events","none");
    $("form").hasClass("registration") ? form_type = "registration" : form_type = "login";
    serialize = $("form").serialize() + "&FormType="+form_type;
    url = "root/";
    call_ajax(form_type);
    $("form").css("pointer-events","auto");
}


//Call Ajax
function call_ajax(type){
    if (type == "logout") { serialize = "FormType=logout"; url="./../root/"; }
    $.ajax({
        type: "POST",
        url: url,
        data: serialize,
        success: function(output){
            if (output.match(/success:/g)){
                popup("success", output.replace(/success:/g, ""));
                setTimeout(function(){location.reload();},3000);
            } else if(output.match(/loggedin/g) || output.match(/loggedout/g)){
                location.reload();
            } else {
                popup("appender", output.replace(/error:/g, ""));
            }
        }
    });
}