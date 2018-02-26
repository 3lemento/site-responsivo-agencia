<?php
    // variáveis
    $nome = $_POST['nome'];
    $email_cliente = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $assunto = 'Contato pelo site';
    $email_servidor = '3lemento.digital@gmail.com';
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');
    
    // corpo do email
    $arquivo = "
    <style type='text/css'>
        body {
            margin:0px;
            font-family:Verdane;
            font-size:12px;
            color: #666666;
        }
        a{
            color: #666666;
            text-decoration: none;
        }
        a:hover {
            color: #FF0000;
            text-decoration: none;
        }
    </style>
        <html>
            <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                <tr>
                    <td>
                        <tr>
                            <td width='500'>Nome:$nome</td>
                        </tr>
                    <tr>
                        <td width='320'>E-mail:<b>$email_cliente</b></td>
                    </tr>
                    <tr>
                        <td width='320'>Mensagem:$mensagem</td>
                    </tr>
                </td>
                </tr>  
                <tr>
                    <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
                </tr>
            </table>
        </html>
    ";

    // headers
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $nome <$email_cliente>";
    
    // enviando email
    $enviar_email = mail($email_servidor, $assunto, $arquivo, $headers);

    // redirecionando
    if($enviar_email) {
        header("Location:sucess_mail.php");
    } else {
        header("Location:error_mail.php");
    }
?>