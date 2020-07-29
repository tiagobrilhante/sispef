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

if (!function_exists('dataDeHoje')) {
    function dataDeHoje()
    {
        $data = date('Y-m-d');
        return $data;
    }
}

if (!function_exists('contatempo')) {
    function contatempo($data_inicial, $data_final)
    {

        // Usa a função strtotime() e pega o timestamp das duas datas:
        $time_inicial = strtotime($data_inicial);
        $time_final = strtotime($data_final);
        // Calcula a diferença de segundos entre as duas datas:
        $diferenca = $time_final - $time_inicial; // 19522800 segundos
        // Calcula a diferença de dias
        $dias = (int)floor($diferenca / (60 * 60 * 24)); // 225 dias
        // retorna o resultado:

        return abs($dias);
    }
}


