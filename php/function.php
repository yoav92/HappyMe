<?php
function register($username,$password ,$email){ //for insert data in the datebase
	$pdo = new PDO('mysql:host=localhost;dbname=happyme;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

		$req = $pdo ->prepare ("INSERT INTO members SET name = ?,password = ?, email = ? , confirmation_token = ?");

		$password = password_hash($password,PASSWORD_BCRYPT);

		$token = rand(40000,600000);

		$req->execute([$username,$password ,$email, $token]);

		$user_id = $pdo->lastInsertId();

	$header="MIME-Version: 1.0\r\n";
        $header.='From:"HappyMe.com"<support@HappyMe.com>'."\n";
        $header.='Content-Type:text/html; charset="utf-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
		
        mail($email, "Confirmation d'inscription - HappyMe.com", "Pour valider votre compte, cliquer sur ce lien \n\nhttp://localhost/happyme/confirm.php?id=$user_id&token=$token",$header);

       /* $_SESSION['flash']['sucess'] = "Une confirmation d'inscription vous a été envoyé sur votre boite mail";*/

        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username; 
        $_SESSION['token'] = $token ;
        $_SESSION['id'] = $user_id ;

        return $user_id;


}

function psy($genre,$desire){ //for insert data in the datebase
        $pdo = new PDO('mysql:host=localhost;dbname=happyme;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
       
        var_dump($_SESSION['id']);
        
       
        $req = $pdo ->prepare ("INSERT INTO psy SET id_member=?,genre = ?,desire=?");
        $req->execute([$_SESSION['id'],$genre,$desire]);
}

function event($id,$date,$time ,$num){ //for insert data in the datebase
        $pdo = new PDO('mysql:host=localhost;dbname=happyme;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $req = $pdo ->prepare ("INSERT INTO events SET id_members = ?,date_event = ?, time_event = ? , number_event = ?");
        $req->execute([$id,$date ,$time, $num]);
}
?>