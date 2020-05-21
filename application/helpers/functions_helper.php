<?php
    function restClient(array $params = [])
    {
        $link = 'http://localhost/ProjetoVenda/';
        $verbo_http = strtoupper($params['method']);
        $header_default[] = 'ContentLength: 0';
        $header_default[] = 'Accept: application/json'; //'Accept: application/json, text/plain',
        //$header_default[] = 'MediaType: application/json';
        $header_default[] = 'Content-Type: application/json; charset=UTF-8'; //'Content-Type: application/x-www-form-urlencoded',
        $params_headers = (isset($params['headers']) and !empty($params['headers'])) ? json_encode($params['headers']) : [];

        foreach ($header_default as $valor)
        {
            array_push($params_headers, $valor);
        }

        //$ci = get_instance(); // usando a instância do CodeIgniter...
        $curl = curl_init($link . $params['url']);

        $params_curl = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array_unique($params_headers)
        ];

        curl_setopt_array($curl, $params_curl);

        $params_json = (isset($params['parameters']) and !empty($params['parameters'])) ? json_encode($params['parameters']) : [];

        switch($verbo_http)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params_json);
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params_json);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verbo_http);
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verbo_http);
                break;
        }

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        return [
            'httpcode' => $httpcode,
            'response' => $response
        ];
    }
?>