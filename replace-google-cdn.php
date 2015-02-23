<?php

/**
 * Plugin Name: Replace Google CDN
 * Plugin URI:  http://github.com/puxos/replace-google-cdn
 * Description: Use USTC CDN to replace Google.
 * Author:      Frank,H.L.Lai
 * Author URI:  http://www.puxos.com/
 * Version:     1.0
 * License:     GPLv2
 */

/**
 * 
 */
if (!defined('ABSPATH')) exit;

class Replace_Google_Cdn
{

    /**
     * init Hook
     */
    public function __construct()
    {
        add_filter('style_loader_tag', array($this, 'cdnUSTC'), 1000, 1);
    }


    /**
     * Use USTC CDN to replace Google.
     *
     * @param $text
     * @return mixed
     */
    public function cdnUSTC($text)
    {
        return str_replace('googleapis.com', 'lug.ustc.edu.cn', $text);
    }
}

/**
 * bootstrap
 */
new Replace_Google_Cdn;