<?php

trait sendMail {

    
    function sendMailConfirm($id, $email, $token){
        
        $host = 'http://'.$_SERVER['HTTP_HOST'];
        $subject = 'Activation de votre compte';
        $message = '
            Félicitation, vous vous êtes bien inscrit sur le site. 
            Veuillez confirmer la création de votre compte en cliquant 
            sur ce lien: 
            <a href="'.$host.'/controllers/confirmSignUp_ctrl.php?id='.$id.'&token='.$token.'">
                Cliquez ici !
            </a>';
        mail($email,$subject, $message);

    }

}