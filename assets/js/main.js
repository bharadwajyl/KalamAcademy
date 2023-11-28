//Global variables
var popup_timer;

//Close
function clouser(type){
    switch (type){
        case "modal":
        if ($(".modal").length > 0){
            overlay("modal");
        }
        break;
        case "popup":
            if ($(".popup").length > 0){
                popup('remove','');
            }
        break;
    }
}


//Overlay
function Overlay(){
    if ((".modal").length > 0){ overlay("modal"); }
}
function overlay(type){
    if ($(".overlay").length>0){
        $("."+type).remove();
        $(".overlay").remove();
    } else {
        $("body").append('<div class="overlay" onclick="Overlay()"></div>');
    }
}

//Modal content
function modal(type){
    overlay("modal");
    $("body").append('<div class="modal"><a href="javascript:void(0)" class="close fixed_flex" onclick="clouser(\'modal\')"><iconify-icon icon="pajamas:close"></iconify-icon></a></div>');
    switch(type){
        case "auth":
            $(".modal").append('<form class="registration padding_2x" autocomplete="off"> <article> <h2 class="title small">SignUp</h2> <p>Don\'t have an account? Create one for you.</p> </article> <fieldset class="flex"> <input type="text" name="fname" placeholder="First name" maxlength="50" /> <input type="text" name="lname" placeholder="Last name" maxlength="50" /> </fieldset> <fieldset class="flex"> <input type="tel" name="mob" placeholder="Contact no" maxlength="15" /> <input type="email" name="email" placeholder="Email address" autocomplete="off" maxlength="100" /> </fieldset> <fieldset class="flex"> <input type="text" name="pssd" placeholder="Password" autocomplete="off" maxlength="30" /> <input type="password" name="cpssd" placeholder="Confirm Password" autocomplete="off" maxlength="30" /> </fieldset> <fieldset class="flex"> <p>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us</p> </fieldset> <fieldset class="flex"> <button class="btn btn_1" onclick="form_submit()">SignUp</a> </fieldset> </form> ');
        break;
        case "post":
            $(".modal").append('<form class="post_story padding_2x"><fieldset class="flex"><textarea name="story" oninput="field()" placeholder="Your story goes here..." maxlength="200"></textarea><span class="alert">0/200</span></fieldset><fieldset class="flex"><button class="btn btn_1">Post my story</a></fieldset></form>');
        break;
    }
}

//PopUp
function popup(type, mssg){
    switch(type){
        case "remove":
            clearTimeout(popup_timer);
            $(".popup").remove();
        break;
        case "appender":
            $("body").append('<div class="popup fixed_flex padding_1x"><a href="javascript:void(0)" class="close fixed_flex" onclick="clouser(\'popup\')"><iconify-icon icon="pajamas:close"></iconify-icon></a><iconify-icon icon="octicon:alert-24" class="warning_icon"></iconify-icon><article><h4 class="title">Warning</h4><p>'+mssg+'</p></article></div>');
            popup_timer = setTimeout(function() { $(".popup").remove(); }, 10000);
        break;
        case "success":
            $("body").append('<div class="popup fixed_flex padding_1x"><a href="javascript:void(0)" class="close fixed_flex" onclick="clouser(\'popup\')"><iconify-icon icon="pajamas:close"></iconify-icon></a><iconify-icon icon="clarity:success-standard-line"></iconify-icon><article><h4 class="title">Success</h4><p>'+mssg+'</p></article></div>');
            popup_timer = setTimeout(function() { $(".popup").remove(); }, 5000);
        break;
    }
}
