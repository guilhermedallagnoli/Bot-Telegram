<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Comunication\Alert;

try {

    //URL DE VERIFICAÇÃO
    $url = 'https://github.com/guilhermedallagnoli';

    //CONFIGURAÇÃO DO CURL
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10
    ]);

    //EXECUTAR A REQUISIÇÃO CURL
    curl_exec($curl);

    //CÓDIGO DE STATUS DA RESPONSE
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    //FECHA A CONEXÃO COM CURL
    curl_close($curl);

    //VERIFICAÇÃO DO CÓDIGO DE STATUS
    if ($httpCode != 200) {
        throw new \Exception('ATENÇÃO! A url "' . $url . '" retornou o status "' . $httpCode . '".', $httpCode);
    }

    echo "Sucesso \n";

} catch (\Exception $e) {

    echo $e->getMessage() . "\n";

    Alert::sendMessage($e->getCode() . ':' . $e->getMessage());
}
