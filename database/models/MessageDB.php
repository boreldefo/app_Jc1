<?php 

class MessageDB {

  private PDOStatement $statementCreateOne;
  private PDOStatement $statementReadOne;
  private PDOStatement $statementUpdateOne;

  private PDOStatement $statementReadAll;
  private PDOStatement $statementDeleteOne;


  function __construct(private PDO $pdo){
    $this->statementCreateOne= $pdo->prepare('
INSERT INTO messages(
  message,
  id_destinataire,
  author,
  date_publication

) VALUES (
  :message,
  :id_destinataire,
  :author,
  :date_publication
)') ;


$this->statementUpdateOne=$pdo->prepare('
UPDATE  messages 
SET 
    destination_message=:destination_message,
    description=:description,
    telephone_destinataire=:telephone_destinataire,
    etat_message=:etat_message,
    poids=:poids,
    largeur=:largeur,
    longueur=:longueur,
    hauteur=:hauteur,
    
  
WHERE id=:id

') ;
$this->statementReadOne= $pdo->prepare('SELECT messages.*, user.prenom, user.nom FROM messages LEFT JOIN user ON messages.author=user.id WHERE messages.id=:id') ;

$this->statementReadAll = $pdo->prepare('SELECT messages.* ,user.prenom, user.nom,user.email FROM messages LEFT JOIN user ON messages.author=user.id WHERE messages.author=:authorId OR messages.id_destinataire=:authorId');



$this->statementDeleteOne = $pdo->prepare('DELETE FROM message WHERE id=:id');



}
  

  public function fetchAll($authorId):array{
    $this->statementReadAll->bindValue(':authorId', $authorId['author']);
    $this->statementReadAll->bindValue(':Id', $authorId['destinataire']);
    $this->statementReadAll->execute();
    return $this->statementReadAll->fetchAll();
  }
  public function fetchOne(int $id):array{
    $this->statementReadOne->bindValue(':id',$id);
    $this->statementReadOne->execute();
    return $this->statementReadOne->fetch();
    

  }
  public function deleteOne(int $id):string{
    $this->statementDeleteOne->bindValue(':id',$id);
    $this->statementDeleteOne->execute();
    return $id;


  }
  public function createOne($message):array{
    $this->statementCreateOne->bindValue(':message',$message['message']);
    $this->statementCreateOne->bindValue(':id_destinataire',$message['author']);
   
  
    $this->statementCreateOne->bindValue(':author',$message['id_destinataire']);
    $this->statementCreateOne->bindValue(':date_publication',$message['date_publication']);

  
    $this->statementCreateOne->execute(); 

    return $this->fetchOne($this->pdo->lastInsertId());
  }
  public function updateOne($trajet){
}



}

return new messageDB($pdo);