<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1';
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$DB = new PDO('mysql:host=localhost;dbname=baseTest','root','');
$destinataire = $DB->query('SELECT * from utilisateur ');
$news = $DB->query('SELECT * from newsletter ');
$contenu = $news->fetch();
	while ($donnees = $destinataire->fetch()  )
  {
    if (mail($donnees["email"],$contenu["titre"],$contenu["contenu"],$headers))
    {
      echo "Le mail pour ".$donnees["email"]." a bien été envoyé<br>";
    }
    else {
      echo "Erreur";
    }
  }
?>
