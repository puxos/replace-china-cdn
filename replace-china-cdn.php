<?php

/**
 * Plugin Name: Replace China CDN
 * Plugin URI:  http://github.com/puxos/replace-china-cdn
 * Description: Google replaced by USTC CDN
 *              Gravatar replaced by Duoshuo CDN
 * Author:      Frank,H.L.Lai
 * Author URI:  http://www.puxos.com/
 * Version:     1.1
 * License:     GPLv2
 */

/**
 * 
 */
if (!defined('ABSPATH')) exit;

class Replace_China_Cdn
{

    /**
     * init Hook
     */
    public function __construct()
    {
        add_filter('style_loader_tag', array($this, 'cdnUSTC'), 1000, 1);
        add_filter('get_avatar', 'duoshuo_avatar', 1001, 3);
    }


    /**
     * Replace Google stuff with USTC CDN
     *
     * @param $text
     * @return mixed
     */
    public function cdnUSTC($text)
    {
        return str_replace('googleapis.com', 'lug.ustc.edu.cn', $text);
    }


    /**
     * Replace gravatar stuff with DuoShuo CDN
     *
     * @param $text
     * @return mixed
     */
    public function duoshuo_avatar($text) {
        return str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com", $text);
    }
}

/**
 * bootstrap
 */
new Replace_China_Cdn;