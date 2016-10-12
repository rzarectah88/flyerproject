<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 11/10/16
 * Time: 8:38 PM
 */

function flash ($title = null, $message = null ){
    $flash = app('App\Http\Flash');

    if(func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}