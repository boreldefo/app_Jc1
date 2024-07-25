<?php 

class TrajetDB {

  private PDOStatement $statementCreateOne;
  private PDOStatement $statementReadOne;
  private PDOStatement $statementUpdateOneforaller;
  private PDOStatement $statementUpdateOneforretour;
  private PDOStatement $statementReadAll;
  private PDOStatement $statementDeleteOne;
  private PDOStatement $statementReadUserAll;
  private PDOStatement $statementReadAllforSearch ;

  private PDOStatement $statementCreateadress1;
  private PDOStatement $statementCreateadress2;
  private PDOStatement $statementUpdateOneadress1;
  private PDOStatement $statementUpdateOneadress2;
  function __construct(private PDO $pdo){
    $this->statementCreateOne= $pdo->prepare('
INSERT INTO trajet(
  lieu_depart,
  lieu_arrivee,
  date_depart,
  kilo_disponible,
  prix_kilo,
  author,
  date_publication
) VALUES (
  :lieu_depart,
  :lieu_arrivee,
  :date_depart,
  :kilo_disponible,
  :prix_kilo,
  :author,
  :date_publication
)') ;

$this->statementUpdateOneforretour=$pdo->prepare('
UPDATE  trajet 
SET 
    date_retour=:date_retour,
    kilo_retour=:kilo_retour,
    prix_kilo_retour=:prix_kilo_retour
WHERE id=:id

') ;
$this->statementUpdateOneforaller=$pdo->prepare('
UPDATE  trajet 
SET 
    lieu_depart=:lieu_depart,
    lieu_arrivee=:lieu_arrivee,
    date_depart=:date_depart,
    kilo_disponible=:kilo_disponible,
    prix_kilo=:prix_kilo
WHERE id=:id

') ;
$this->statementReadOne= $pdo->prepare('SELECT trajet.*, user.prenom, user.nom FROM trajet LEFT JOIN user ON trajet.author=user.id WHERE trajet.id=:id') ;

$this->statementReadAll = $pdo->prepare('SELECT trajet.* ,user.prenom, user.nom FROM trajet LEFT JOIN user ON trajet.author=user.id WHERE trajet.author=:authorId');

$this->statementReadAllforSearch = $pdo->prepare('SELECT trajet.* ,user.prenom, user.nom FROM trajet LEFT JOIN user ON trajet.author=user.id WHERE lieu_arrivee LIKE :lieu_arrivee');

$this->statementDeleteOne = $pdo->prepare('DELETE FROM trajet WHERE id=:id');

$this->statementReadUserAll = $pdo->prepare('SELECT *  FROM article  WHERE author=:authorId');
$this->statementReadAllforSearch = $pdo->prepare('SELECT * FROM trajet WHERE lieu_arrivee LIKE :lieu_arrivee');
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
  public function createOne($trajet){
    $this->statementCreateOne->bindValue(':lieu_depart',$trajet['searchdepart']);
    $this->statementCreateOne->bindValue(':lieu_arrivee',$trajet['searcharrivee']);
    $this->statementCreateOne->bindValue(':date_depart',$trajet['date']);
    $this->statementCreateOne->bindValue(':kilo_disponible',$trajet['nbrekilo']);
    $this->statementCreateOne->bindValue(':prix_kilo',$trajet['prixkilo']);
  
    $this->statementCreateOne->bindValue(':author',$trajet['author']);
    $this->statementCreateOne->bindValue(':date_publication',$trajet['date_publication']);

    $this->statementCreateOne->execute(); 

    return $this->fetchOne($this->pdo->lastInsertId());
  }
  public function updateOne($trajet):array{
if(isset($trajet['date_retour'])){
  $this->statementUpdateOneforretour->bindValue(':date_retour',$trajet['date_retour']);
$this->statementUpdateOneforretour->bindValue(':kilo_retour',$trajet['kilo_retour']);
$this->statementUpdateOneforretour->bindValue(':prix_kilo_retour',$trajet['prix_kilo_retour']);
$this->statementUpdateOneforretour->bindValue(':id',$trajet['id']);
$this->statementUpdateOneforretour->execute();
} else {
  $this->statementUpdateOneforaller->bindValue(':lieu_depart',$trajet['lieu_depart']);
$this->statementUpdateOneforaller->bindValue(':lieu_arrivee',$trajet['lieu_arrivee']);
$this->statementUpdateOneforaller->bindValue(':date_depart',$trajet['date_depart']);
$this->statementUpdateOneforaller->bindValue(':kilo_disponible',$trajet['kilo_disponible']);
$this->statementUpdateOneforaller->bindValue(':prix_kilo',$trajet['prix_kilo']);
$this->statementUpdateOneforaller->bindValue(':id',$trajet['id']);

$this->statementUpdateOneforaller->execute();
}




return $trajet;
  }

  public function fetchTrajets(string $lieu_arrivee):array{
    $this->statementReadUserAll->bindValue(':lieu_arrivee', $lieu_arrivee);
    $this->statementReadUserAll->execute();
    return $this->statementReadUserAll->fetchAll();
  }

  public function search(string $lieu_arrivee):array{
   $this->statementReadAllforSearch->bindValue(':lieu_arrivee', '%'.$lieu_arrivee.'%');
$this->statementReadAllforSearch->execute();
 
   return $this->statementReadAllforSearch->fetchAll(); 

  }
}

return new TrajetDB($pdo);