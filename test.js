var my_xmlhttp = null, buf_request_in_progress = !1, ftm_push_status_timeout = null, elm_username = document.getElementById("username"), elm_secretkey = document.getElementById("secretkey"), elm_twofactor = document.getElementById("auth_two_factor"), elm_authtoken = document.getElementById("auth_token"), elm_tokenmsg = document.getElementById("token_msg"), elm_tokencode = document.getElementById("token_code"), elm_ftm_push_enabled = document.getElementById("ftm_push_enabled"), ftm_pushed_enabled = Number(elm_ftm_push_enabled && elm_ftm_push_enabled.value), elm_button = document.getElementById("login_button"), str_table = fgt_lang, GUI_LOGIN_STATUS_OK = "1", GUI_LOGIN_STATUS_LOCKOUT = "2", GUI_LOGIN_STATUS_NEED_TFA = "3", GUI_LOGIN_STATUS_CHANGE_PWD = "4", GUI_LOGIN_STATUS_FTM_PUSH_PARAMS = "5", GUI_LOGIN_STATUS_FTM_PUSH_STATUS = "6", GUI_LOGIN_STATUS_FTM_PUSH_FAILURE = "7", FNBAM_SUCCESS = "0", FNBAM_DENIED = "1", FNBAM_PENDING = "4", FNBAM_ERROR = "5";

function getQueryValue(url, name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var results = new RegExp("[\\?&]" + name + "=([^&#]*)").exec(url);
    if (results) return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function login_sso(url) {
    url += "?fallback=" + encodeURIComponent(location.origin + "/login");
    var redir = getQueryValue(location.href, "redir");
    redir && (url += "&redir=" + encodeURIComponent(redir)), location.href = url;
}

function login_send_request(str_url, str_body) {
    (my_xmlhttp = new XMLHttpRequest()).onreadystatechange = handle_buffer_statechange,
        my_xmlhttp.open("POST", str_url, !0), my_xmlhttp.setRequestHeader("Pragma", "no-cache"),
        my_xmlhttp.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate"),
        my_xmlhttp.setRequestHeader("If-Modified-Since", "Sat, 1 Jan 2000 00:00:00 GMT"),
        my_xmlhttp.send(str_body);
}

function handle_buffer_statechange(ev) {
    4 == my_xmlhttp.readyState && handle_buffer_ready();
}

function addQuery(key) {
    var xstr = "", value = getQueryValue(location.href, key);
    return value && (xstr += "&" + key + "=" + encodeURIComponent(value)), xstr;
}

function try_login() {
    if (buf_request_in_progress) throw "Avoid sending conflicting request\n";
    buf_request_in_progress = !0;
    var xstr = "ajax=1&username=" + encodeURIComponent(elm_username.value) + "&secretkey=" + encodeURIComponent(elm_secretkey.value);
    elm_twofactor && elm_authtoken && (xstr += "&auth_two_factor=1&auth_token=" + encodeURIComponent(elm_authtoken.value)),
    elm_tokencode && 0 == elm_tokencode.disabled && (xstr += "&token_code=" + encodeURIComponent(elm_tokencode.value)),
        xstr += addQuery("redir"), xstr += addQuery("saml_idp"), clear_error_status_line(),
        disable_input();
    try {
        login_send_request("/logincheck", xstr);
    } catch (e) {
        buf_request_in_progress = !1, update_error_status_line(str_table.server_unreachable),
            reenable_input(), abort_current_request();
    }
}

function trigger_ftm_push() {
    if (!buf_request_in_progress) {
        buf_request_in_progress = !0;
        var xstr = "ajax=1&username=" + encodeURIComponent(elm_username.value) + "&ftm_push_trigger=1" + addQuery("redir") + addQuery("saml_idp");
        try {
            login_send_request("/logincheck", xstr);
        } catch (e) {
            buf_request_in_progress = !1, abort_current_request();
        }
    }
}

function get_ftm_push_status(query_params) {
    if (!buf_request_in_progress) {
        buf_request_in_progress = !0;
        var xstr = "ajax=1&username=" + encodeURIComponent(elm_username.value) + "&secretkey=" + encodeURIComponent(elm_secretkey.value) + "&ftm_push_status=1&" + query_params + addQuery("redir") + addQuery("saml_idp");
        try {
            login_send_request("/logincheck", xstr);
        } catch (e) {
            buf_request_in_progress = !1, abort_current_request();
        }
    }
}

function start_ftm_push_poll(query_params) {
    cancel_ftm_push_poll(), get_ftm_push_status(query_params), ftm_push_status_timeout = setTimeout(function() {
        start_ftm_push_poll(query_params);
    }, 2e3);
}

function cancel_ftm_push_poll() {
    clearTimeout(ftm_push_status_timeout);
}

function update_error_status_line(msg) {
    document.getElementById("err_msg_content").textContent = msg, document.getElementById("err_msg").style.display = null;
}

function clear_error_status_line() {
    document.getElementById("warn_msg").style.display = "none", document.getElementById("err_msg").style.display = "none";
}

function update_warning_status_line(msg) {
    document.getElementById("warn_msg_content").textContent = msg, document.getElementById("warn_msg").style.display = null;
}

function handle_buffer_ready() {
    if (buf_request_in_progress) {
        buf_request_in_progress = !1;
        var retval = my_xmlhttp.responseText;
        if (my_xmlhttp = null, 0 == retval.length) return update_error_status_line(str_table.server_unreachable),
            void reenable_input();
        var rv = retval.charAt(0), rv2 = retval.substring(1);
        rv == GUI_LOGIN_STATUS_OK ? eval(rv2) : rv == GUI_LOGIN_STATUS_LOCKOUT ? (update_error_status_line(str_table.lockout_msg),
            setTimeout("reenable_input();", 6e4)) : rv == GUI_LOGIN_STATUS_NEED_TFA ? (update_error_status_line(str_table.token_needed),
            showToken(!0, parseInt(rv2[0]), retval.substring(2)), elm_button.disabled = !1,
            elm_tokencode.focus()) : rv === GUI_LOGIN_STATUS_CHANGE_PWD ? eval(rv2) : rv === GUI_LOGIN_STATUS_FTM_PUSH_PARAMS ? start_ftm_push_poll(rv2) : rv === GUI_LOGIN_STATUS_FTM_PUSH_STATUS ? rv2 !== FNBAM_NEED_TOKEN && cancel_ftm_push_poll() : rv === GUI_LOGIN_STATUS_FTM_PUSH_FAILURE ? cancel_ftm_push_poll() : (update_error_status_line(str_table.login_failed),
            clear_input(), cancel_ftm_push_poll(), reenable_input(), showToken(!1));
    }
}

function disable_input() {
    elm_username.disabled = !0, elm_secretkey.disabled = !0;
}

function reenable_input() {
    var two_factor_auth = !!document.getElementById("auth_two_factor");
    elm_username.disabled = !1, elm_secretkey.disabled = !1, elm_button.disabled = !1,
        elm_tokencode.disabled = !1, elm_username.blur(), two_factor_auth ? elm_secretkey.focus() : elm_username.focus();
}

function login_get_cmd_kbd_event(evt_p) {
    return evt_p || (evt = window.event, evt || null);
}

function login_crack_kbd_event(evt) {
    return evt.which ? evt.which : evt.keyCode ? evt.keyCode : evt.charCode ? evt.charCode : 0;
}

function key_pressdown(evt_p) {
    try {
        var evt = login_get_cmd_kbd_event(evt_p);
        if (null == evt) return;
        var key_code = login_crack_kbd_event(evt);
        if (0 == key_code) return;
        if (13 == key_code) return elm_button.click(), !1;
    } catch (e) {}
    return !0;
}

function update_token_msg(msg) {
    for (;elm_tokenmsg.childNodes.length; ) elm_tokenmsg.removeChild(elm_tokenmsg.childNodes[0]);
    var txt = document.createTextNode(msg);
    elm_tokenmsg.appendChild(txt), setTimeout('var elem = document.getElementById("token_msg");', 100);
}

function showToken(show, token_type, token_info) {
    var d = "none";
    if (show && (d = ""), elm_tokenmsg && (elm_tokenmsg.style.display = d, show)) switch (token_type) {
        case 1:
            elm_tokenmsg.style.display = "none";
            break;

        case 2:
            update_token_msg(str_table.mail_token_msg + " <" + token_info + "> " + str_table.token_msg_rest);
            break;

        case 3:
            update_token_msg(str_table.sms_token_msg + " <" + token_info + "> " + str_table.token_msg_rest);
    }
    elm_tokencode && (elm_tokencode.style.display = d), elm_tokencode && (elm_tokencode.disabled = !show),
    show && ftm_pushed_enabled && 1 === token_type && trigger_ftm_push(), elm_button.disabled = !1;
}

function clear_input() {
    !!document.getElementById("auth_two_factor") || (elm_username.value = ""), elm_secretkey.value = "",
        elm_tokencode.value = "";
}

function abort_current_request() {
    my_xmlhttp.abort(), delete my_xmlhttp, my_xmlhttp = null;
}

FNBAM_NEED_TOKEN = "7", document.addEventListener("DOMContentLoaded", function() {
    var msg = getQueryValue(location.href, "msg");
    msg && update_warning_status_line(str_table[msg]);
});
