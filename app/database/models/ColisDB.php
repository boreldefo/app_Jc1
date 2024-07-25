<?php 

class ColisDB {

  private PDOStatement $statementCreateOne;
  private PDOStatement $statementReadOne;
  private PDOStatement $statementUpdateOne;

  private PDOStatement $statementReadAll;
  private PDOStatement $statementDeleteOne;
  private PDOStatement $statementReadUserAll;
  private PDOStatement $statementReadAllforSearch ;

  function __construct(private PDO $pdo){
    $this->statementCreateOne= $pdo->prepare('
INSERT INTO colis(
  destination_colis,
  description,
  telephone_destinataire,
  etat_colis,
  poids,
  largeur,
  longueur,
  hauteur,
  author,
  date_publication,
  livreur
) VALUES (
  :destination_colis,
  :description,
  :telephone_destinataire,
  :etat_colis,
  :poids,
  :largeur,
  :longueur,
  :hauteur,
  :author,
  :date_publication,
  :livreur
)') ;


$this->statementUpdateOne=$pdo->prepare('
UPDATE  colis 
SET 
    destination_colis=:destination_colis,
    description=:description,
    telephone_destinataire=:telephone_destinataire,
    etat_colis=:etat_colis,
    poids=:poids,
    largeur=:largeur,
    longueur=:longueur,
    hauteur=:hauteur,
    
  
WHERE id=:id

') ;
$this->statementReadOne= $pdo->prepare('SELECT colis.*, user.prenom, user.nom FROM colis LEFT JOIN user ON colis.author=user.id WHERE colis.id=:id') ;

$this->statementReadAll = $pdo->prepare('SELECT colis.* ,user.prenom, user.nom FROM colis LEFT JOIN user ON colis.author=user.id WHERE colis.author=:authorId');



$this->statementDeleteOne = $pdo->prepare('DELETE FROM colis WHERE id=:id');



}
  

  public function fetchAll($authorId):array{
    $this->statementReadAll->bindValue(':authorId', $authorId);
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
  public function createOne($colis):array{
    $this->statementCreateOne->bindValue(':destination_colis',$colis['destination_colis']);
    $this->statementCreateOne->bindValue(':description',$colis['description']);
    $this->statementCreateOne->bindValue(':telephone_destinataire',$colis['telephone_destinataire']);
    $this->statementCreateOne->bindValue(':etat_colis',$colis['etat_colis']);
    $this->statementCreateOne->bindValue(':poids',$colis['poids']);
    $this->statementCreateOne->bindValue(':largeur',$colis['largeur']);
    $this->statementCreateOne->bindValue(':longueur',$colis['longueur']);
    $this->statementCreateOne->bindValue(':hauteur',$colis['hauteur']);
  
    $this->statementCreateOne->bindValue(':author',$colis['author']);
    $this->statementCreateOne->bindValue(':date_publication',$colis['date_publication']);

    $this->statementCreateOne->bindValue(':livreur',$colis['livreur']);
    $this->statementCreateOne->execute(); 

    return $this->fetchOne($this->pdo->lastInsertId());
  }
  public function updateOne($trajet){
}



}

return new ColisDB($pdo);