<?php
/*
* main helper functions
*/

if (!function_exists('this_user')) {
    function this_user()
    {
        $ci = &get_instance();

        return intval($ci->session->userdata('user_id'));

    }
}
