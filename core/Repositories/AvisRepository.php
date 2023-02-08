<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Avis;
use Entity\Voiture;

#[TargetEntity(entityName: Avis::class)]
class AvisRepository extends AbstractRepository
{
    public function findAllByVoiture(Voiture $voiture){

        $query= $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE voiture_id= :voiture_id");

        $query->execute(["voiture_id"=>$voiture->getId()]);
        $avis = $query->fetchAll(\PDO::FETCH_CLASS, get_class($this->targetEntity));


        return $avis;
    }

    public function insert(Avis $avis){
        $request = $this->pdo->prepare("INSERT INTO {$this->tableName} SET voiture_id = :voiture_id, content = :content");


        $request->execute([
            "voiture_id"=> $avis->getVoitureId(),
            "content"=>$avis->getContent()
        ]);
    }

    public function update(\Entity\Avis $avis){
        $requete = $this->pdo->prepare("UPDATE {$this->tableName} SET content = :content WHERE id = :id");
        $requete->execute([
            'id'=>$avis->getId(),
            'content'=>$avis->getContent(),
        ]);
    }

}