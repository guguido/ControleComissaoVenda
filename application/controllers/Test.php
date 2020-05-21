<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('api');
        //$this->action();
    }


    public function action()
    {
        $output = "";
        $params = ""; // variáveis recuperadas na requisição

        $params_api = [
            'method' => 'GET',
            'parameters' => $params,
            'url' => ''
        ];

        $api = restClient($params_api);
        //echo "<pre>"; print_r($api); echo "<pre>"; exit;
        $array = json_decode($api['response'], true);
        
        //echo "<pre>"; print_r($array); echo "<pre>"; //exit;

        if ($array['data']['num_rows'] > 0)
        {
            $output = '<thread>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Comissão</th>
                            </tr>
                        </thread>';

            foreach($array['data']['result'] as $row)
            {
                $output .= '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nome'].'</td>
                    <td>'.$row['email'].'</td>
                    <td><buton type="button" name="vender" class="btn btn-success btn-xs edit" id="'.$row['id'].'">Vender</button></td>
                </tr>
                ';
            }
        }
        else{
            $output .= '
                <tr>
                    <td colspan="4">Não há vendedores cadastrados</td>
                </tr>
                ';
        }
        echo $output;

        }

    }
?>