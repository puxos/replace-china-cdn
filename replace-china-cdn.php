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
    public function __construct() {
        add_filter('style_loader_tag', array($this, 'replace_google_ustc'), 1000, 1);
        add_filter('get_avatar', array($this, 'replace_gravatar_duoshuo'), 1001, 1);
    }


    /**
     * Replace Google stuff with USTC CDN
     *
     * @param $text
     * @return mixed
     */
    public function replace_google_ustc($text) {
        return str_replace('googleapis.com', 'lug.ustc.edu.cn', $text);
    }


    /**
     * Replace gravatar stuff with DuoShuo CDN
     *
     * @param $text
     * @return mixed
     */
    public function replace_gravatar_duoshuo($text) {
        return str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com", $text);
    }
}

/**
 * bootstrap
 */
new Replace_China_Cdn;