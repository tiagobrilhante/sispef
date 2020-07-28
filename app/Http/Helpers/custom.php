<?php

if (!function_exists('guid')) {
    function guid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}

if (!function_exists('tamanhoArquivo')) {
    function tamanhoArquivo($tamanho)
    {
        if ($tamanho >= 1048576) {
            $tamanho = number_format($tamanho / 1048576, 2) . ' GB';
        } else if ($tamanho >= 1024) {
            $tamanho = number_format($tamanho / 1024, 2) . ' MB';
        } else {
            $tamanho = $tamanho . ' KB';
        }

        return $tamanho;
    }
}



