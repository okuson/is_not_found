<?php

/**
 * ４０４か否かを返す。
 * @param $url 対象のURL
 * @return bool
 */
function is_not_found($url)
{
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);

    $info = curl_getinfo($ch);

    $is_error = false;
    if (404 == $info['http_code']) {
        $is_error = true;
    }

    curl_close($ch);

    return $is_error;
}
