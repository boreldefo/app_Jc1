<?php

class AuthDB {
  private PDOStatement $statementRegister; 
  private PDOStatement $statementReadSession;
  private PDOStatement $statementReadUser;
  private PDOStatement $statementReadUserFromEmail;
  private PDOStatement $statementCreateSession;
  private PDOStatement $statementDeleteSession;
  private PDOStatement $statementDeleteUser;
  private PDOStatement $statementUpdateInformation;
  private PDOStatement $statementUpdateprofil;
  private PDOStatement $statementReadAll;
  function __construct(private PDO $pdo)
  {
    $this->statementRegister= $pdo->prepare('INSERT INTO user VALUES(
      DEFAULT,
      :prenom,
      :nom,
      :password,
      :telephone,
      :date_naissance,
      :ville,
      :code_postal,
      :pays_residence,
      :adresse,
      :nationalite,
      :sexe,
      :jai18ansetjacceptelesconditionsdekiloapp,
      :jesouhaiterecevoirlesemails,
      :statut
      

     )');
        $this->statementUpdateInformation = $pdo->prepare('
        UPDATE  user 
SET 
    prenom=:prenom,
    nom=:nom,
    date_naissance=:date_naissance,
    telephone=:telephone,
    ville=:ville,
    code_postal=:code_postal,
    pays_residence=:pays_residence,
    adresse=:adresse,
    statut=:statut
WHERE id=:id
        
  ');
  $this->statementUpdateprofil = $pdo->prepare('
  UPDATE  user 
SET 
    profil=:profil
WHERE id=:id
  
');
      $this->statementReadAll = $pdo->prepare('SELECT * FROM user');
      $this->statementReadSession =$pdo->prepare('SELECT *FROM session WHERE id=:id');
      $this->statementReadUser = $pdo->prepare('SELECT * FROM user WHERE id=:id');
      $this->statementReadUserFromEmail =$pdo->prepare('SELECT * FROM user WHERE telephone=:tel');
      $this->statementCreateSession = $pdo->prepare('INSERT INTO session VALUES(
        :sessionid,
        :userid
  
      )');
      $this->statementDeleteSession= $pdo->prepare('DELETE FROM session WHERE id=:id');
    
    }
    public function fetchAll():array{
      $this->statementReadAll->execute();
      return $this->statementReadAll->fetchAll();
    }
    
  function login(string $userId):void{
    $sessionId = bin2hex(random_bytes(32));
    $this->statementCreateSession->bindValue(':userid',$userId);
    $this->statementCreateSession->bindValue(':sessionid',$sessionId);
    $this->statementCreateSession->execute();
    $signature = hash_hmac('sha256', $sessionId, 'je veux devenir pretre');
    
    setcookie('session',$sessionId, time()+60*60*24*24, '','',false, true);
    setcookie('signature',$signature, time()+60*60*24*24, '','',false, true);
   return;
  }
  function register(array $user):void{
 
     $hashedPassword=password_hash($user['password'], PASSWORD_ARGON2I);
     $this->statementRegister->bindValue(':prenom',$user['firstname']);
     $this->statementRegister->bindValue(':nom',$user['lastname']);
  
     $this->statementRegister->bindValue(':password',$hashedPassword);
     $this->statementRegister->bindValue(':telephone',$user['tel']);
     $this->statementRegister->bindValue(':date_naissance','');
     $this->statementRegister->bindValue(':ville',$user['ville']);
     $this->statementRegister->bindValue(':code_postal',$user['codepostal']);
     $this->statementRegister->bindValue(':pays_residence',$user['pays']);
     $this->statementRegister->bindValue(':adresse',$user['adresse']);
     $this->statementRegister->bindValue(':nationalite','');
     $this->statementRegister->bindValue(':sexe',$user['sexe']);
     $this->statementRegister->bindValue(':jai18ansetjacceptelesconditionsdekiloapp',$user['attestation1']);
     $this->statementRegister->bindValue(':jesouhaiterecevoirlesemails',$user['attestation2']);
     $this->statementRegister->bindValue(':statut','');
     $this->statementRegister->execute();
     return;
  }
  function isLoggdin():array|false {
    $sessionId=$_COOKIE['session']??'';
    $signature=$_COOKIE['signature']??'';
    if($sessionId && $signature){
      $hash  = hash_hmac('sha256', $sessionId, 'je veux devenir pretre');
      if(hash_equals($hash, $signature)) {
        $this->statementReadSession->bindValue(':id',$sessionId);
        $this->statementReadSession->execute();
        $session = $this->statementReadSession->fetch();
        
        if($session){
         
          $this->statementReadUser->bindValue(':id',$session['userid']);
          $this->statementReadUser->execute();
          $user = $this->statementReadUser->fetch();
          
        }
      }
     
    }
    return $user ?? false;
  }
  function fetchOne($id):array{
    $this->statementReadUser->bindValue(':id',$id);
    $this->statementReadUser->execute();
    $user = $this->statementReadUser->fetch();
    return $user??false;
  }
  function getUserFromTrajet(int $id):array|false{
    
    $this->statementReadUser->bindValue(':id',$id);
    $this->statementReadUser->execute();
    $user = $this->statementReadUser->fetch();
    return $user;
  }
  function logout(string $sessionId):void{
   
    $this->statementDeleteSession->bindValue(':id',$sessionId);
    $this->statementDeleteSession->execute();
    setcookie('session','', time()-1);
    setcookie('signature','', time()-1);
  }



  function deleteUser(string $id)
  {

    $this->statementDeleteUser->bindParam(':id', $id, PDO::PARAM_INT);
    $this->statementDeleteUser->execute();
  }

  function updateInformation(array $user): void
  {
    $this->statementUpdateInformation->bindValue(':prenom', $user['firstname']);
    $this->statementUpdateInformation->bindValue(':nom', $user['lastname']);

    $this->statementUpdateInformation->bindValue(':telephone', $user['tel']);
    $this->statementUpdateInformation->bindValue(':date_naissance', $user['date_naissance']);
    $this->statementUpdateInformation->bindValue(':ville', $user['ville']);
    $this->statementUpdateInformation->bindValue(':code_postal', $user['codepostal']);
    $this->statementUpdateInformation->bindValue(':pays_residence', $user['pays']);
    $this->statementUpdateInformation->bindValue(':adresse', $user['adresse']);
    $this->statementUpdateInformation->bindValue(':statut', $user['statut']);
    $this->statementUpdateInformation->bindValue(':id', $user['id']);
    $this->statementUpdateInformation->execute();
    return;
  }

  function updateprofil(array $user): void
  {
    
   
    $this->statementUpdateprofil->bindValue(':profil', $user['profil']);
    $this->statementUpdateprofil->bindValue(':id', $user['id']);
    $this->statementUpdateprofil->execute();
    return;
  }
  function getUserFromEmail(string $tel){
    $this->statementReadUserFromEmail->bindValue(':tel', $tel);
    $this->statementReadUserFromEmail->execute();
 $user =$this->statementReadUserFromEmail->fetch();


  return $user??false;
      
  
  }
}
return new AuthDB($pdo);