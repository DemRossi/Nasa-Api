<?php
    class ConfigUtil{
        public static function getConfig()
        {
            // get the config file
            return parse_ini_file(__DIR__.'/../../config/config.ini');
        }
    }