var otp_inputs = document.querySelectorAll(".otp__digit")
var mykey = "0123456789".split("")
otp_inputs.forEach((_) => {
    _.addEventListener("keyup", handle_next_input)
})

function handle_next_input(event) {
    let current = event.target
    let index = parseInt(current.classList[1].split("__")[2])
    current.value = event.key
    if (event.keyCode == 8 && index > 1) {
        current.previousElementSibling.focus()
    }
    if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
        var next = current.nextElementSibling;
        next.focus()
    }
    var _finalKey = ""
    for (let { value } of otp_inputs) {
        _finalKey += value
    }
    if (_finalKey.length == 6) {
        document.querySelector("#_otp").classList.replace("_notok", "_ok")
        document.querySelector("#_otp").innerText = _finalKey;

        var finalOTP = document.querySelector("#_otp").innerText;
        // Send it to PHP using AJAX request
        var xmlhttp = new XMLHttpRequest();

        var PageToSendTo = "http://localhost/FOOD_STORE_WEBSITE/sign_up/verify_pass.php";
        var MyVariable = finalOTP;
        var VariablePlaceholder = "variableName=";
        var UrlToSend = PageToSendTo + "?" + VariablePlaceholder + encodeURIComponent(MyVariable);


        xmlhttp.onload = function () {
            if (xmlhttp.status === 200) {
                console.log(UrlToSend);
            }
        };

        // Direct follow UrlToSend
        window.location.replace(UrlToSend);
        exit();
    } else {
        document.querySelector("#_otp").classList.replace("_ok", "_notok")
        document.querySelector("#_otp").innerText = _finalKey;
    }
}