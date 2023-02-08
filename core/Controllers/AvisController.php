<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Voiture;


#[DefaultEntity(entityName: Avis::class)]
class AvisController extends AbstractController
{

    protected string $defaultEntityName = Avis::class;


    public function create(){
        $content = null;
        $voiture_id = null;

        if (!empty($_POST['voiture_id']) && ctype_digit($_POST["voiture_id"])){
            $voiture_id = $_POST['voiture_id'];

        }

        if (!empty($_POST['content'])){
            $content = htmlspecialchars($_POST["content"]) ;
        }


        if ($content && $voiture_id){

            $voitureEntity = new Voiture();


            $voiture = $this->getRepository(Voiture::class)->findById($voiture_id);

                if (!$voiture){
                    return $this->redirect();
                }

            $avis = new Avis();
            $avis->setContent($content);
            $avis->setVoitureId($voiture_id);

            $this->getRepository(Avis::class)->insert($avis);

            return $this->redirect([
                "type"=>"voiture",
                "action"=>"show",
                "id"=>$voiture->getId()
            ]);
        }
    }
    public function remove(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $id = $_GET['id'];
        }

        if(!$id){  return $this->redirect(); }

        $avis = $this->repository->findById($id);

        if(!$avis){  return $this->redirect(); }

        $this->repository->delete($avis);

        return $this->redirect([
            "type"=>"voiture",
            "action"=>"show",
            "id"=>$avis->getVoitureId()
        ]);


    }
    public function update(){

        $id = null;
        $content = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){
            $id = $_POST['id'];
        }

        if(!empty($_POST['content'])){
            $content = htmlspecialchars($_POST['content']);
        }

        if($id && $content){

            $avis = $this->repository->findById($id);

            if(!$avis){  return $this->redirect(); }

            $avis->setContent($content);

            $this->repository->update($avis);

            return $this->redirect([
                "type"=>"avis",
                "action"=>"update",
                "id"=>$avis->getVoitureId()
            ]);

        }


        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $id = $_GET['id'];
        }

        if(!$id){  return $this->redirect(); }

        $avis = $this->repository->findById($id);

        if(!$avis){  return $this->redirect(); }


        return $this->render('avis/update', [
            "avis"=>$avis,
            "pageTitle"=> "Modifier votre comment",

        ]);

    }

}