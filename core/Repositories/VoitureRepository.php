<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Voiture;

#[TargetEntity(entityName: Voiture::class)]

class VoitureRepository extends AbstractRepository
{

    public function insert(Voiture $voiture){

        $query= $this->pdo->prepare("INSERT INTO {$this->tableName} SET model = :model, description = :description, image =:image");

        $query->execute([
            "model"=>$voiture->getModel(),
            "description"=>$voiture->getDescription(),

            "image"=>$voiture->getImage()



        ]);
        return $this->pdo->lastInsertId();
    }
}