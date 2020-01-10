<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Access {

    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public function _generate_security_code($length = 12) {
        return substr(md5(microtime() . $this->ci->config->item('encryption_key')), 1, $length);
    }

    public function _do_hash($password, $salt = '') {
        $hashed_password = md5($password . $salt . $this->ci->config->item('encryption_key'));
        return $hashed_password;
    }

}
