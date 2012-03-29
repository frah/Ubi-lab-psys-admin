<?php
function init_session() {
    session_name('ubilab-pos_admin');
    session_set_cookie_params(3600);
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
    }
}

function login_check() {
    init_session();
    if(!isset($_SESSION['logging']) || $_SESSION['logging'] !== true) {
        //header("Location: /", true, 302);
    }
}

function session_end() {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
}
?>
