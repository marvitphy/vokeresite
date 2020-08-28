<?php 

    if(isset($_POST['enviar'])){
        $nomeR = $_POST['nomeR'];
        $nomeE = $_POST['nomeE'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $contato = $_POST['contato'];
        $delivery = $_POST['delivery'];

        $to = 'markdjay.contato@gmail.com';
        $sub = 'Quero ser um parceiro Vokerê!';
        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message .= '<b>Nome:</b> ' . $nomeR . '<br><b>Nome da empresa:</b> ' . $nomeE . '<br><b>Cidade:</b> ' . $cidade . '<br><b>Endereço:</b> ' . $endereco . '<br><b>Cep:</b> ' . $cep . '<br><b>Contato:</b> ' . $contato . '<br><b>Empresa tem delivery?</b> ' . $delivery;
        $message .= '</body></html>';

        if(mail($to, $sub, $message, $headers)){
            echo 'Enviado com sucesso! Agradecemos!';

        }else{
            echo 'Ouve algum erro.';
        }

    }



?>