<?php
    //Chama a classe de onde você a colocou
    require_once('phpmailer/class.phpmailer.php');

    //Instancia um objeto da classe PHPMailer
    $mail = new PHPMailer();

    //Define que o envio de email será pelo protocolo SMTP
    $mail->IsSMTP();    //Chama o método

    //Define o servidor de envio
    $mail->Host = 'smtp.gmail.com';

    //Define que o servidor exige autenticação
    $mail->SMTPAuth = true; //Chama o atributo

    //Configura usuário de autenticação
    $mail->Username = 'gabiiluisamoreira@gmail.com';
    //Configura senha de autenticação para este usuário
    include("senha.php");

    //Define criptografia utilizada no envio
    //Goole costuma usar criptografia TLS
    $mail->SMTPSecure = "tls";

    //Define porta utilizada no servidor
    //Google costuma utilizar a porta 587
    $mail->Port = 587;

    /**Configurações do envio:: **/
    //De qual email está sendo enviado;
    $mail->From = $from; //Pode-se colocar qualquer um (Ver exibir detalhes p mostra verdaeiro destinatário)
    //Nome de quem está enviando
    $mail->FromName = $fromName;

    //Para que enviar (email_do_destinatário, nome_do_destinatário (OPCIONAL))
    $mail->AddAddress("gabrieli.moreira@outlook.com.br", "Gabrieli L. Moreira"); //("jrbeluzo@ifsp.edu.br", "Beluzo")
    /*
        Nome do destinatário é opcional; Pode-se acrescentar o email para ser respondido;
        Pode-se acrescentar cópia e cópia oculta.
        $mail->AddAddress('ellen@example.com');
        $mail->AddReplyTo('info@example.com', 'Information');
        $mail->AddCC('cc@example.com');
        $mail->AddBCC('bcc@example.com');
    */
    //Adiciona um anexo no email
    $mail->AddAttachment("teste.png");

    //Caso queira formatar o email com HTML
    $mail->IsHTML(true);

    //Codificação do texto do email
    $mail->CharSet = 'UTF-8';
    //Define o assunto do email
    $mail->Subject = $subject;  //'Assunto do E-mail com acentuação';

    $mail->Body = "<html>
                        <head>
                            <meta charset='utf-8'/>
                        </head>
                        <body>".$mensagem."
                        </body>
                   </html>";
    
    //Aqui você define o texto alternativo para usuários que visualizam email 
    //apenas em modo texto. 
    $mail->AltBody = $mensagem; //'Texto alternativo para usuários de email sem visualizador WEB';

    //Se o método Send() retornar FALSE sinific que houve um erro no envio.
    if(!$mail->Send()){
        //Mensagem do erro ocorrido
        echo 'Mensagem não pode ser enviada: ';
        echo $mail->ErrorInfo;
        exit;
    } 
    else{
        //Caso o método retorne TRUE, o email foi enviado com sucesso.
        echo "Mensagem enviada com sucesso.";
    }
    //Engrenagem->Configurações->Contas e Importação->Outras configurações da Conta do Google->Segurança->Acesso a app menos seguro
?>