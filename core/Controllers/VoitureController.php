<?php

namespace Controllers;

use App\File;
use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Voiture;
use Repositories\VoitureRepository;

#[DefaultEntity(entityName: Voiture::class)]
class VoitureController extends AbstractController
{
    protected string $defaultEntityName = Voiture::class;

    public function index()
{

    $voitures = $this->repository->findAll();

    return $this->render("Voitures/index", [
        "pageTitle" => "les voitures",
        "voitures" => $voitures
    ]);
}
    public function show(){

        $id= null;

        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])){
            $id = $_GET["id"];
        }

        if(!$id){ return $this->redirect(); }

    $voiture = $this->repository->findById($id);

        if (!$voiture){return  $this->redirect();}

        $avisRepository = $this->getRepository(Avis::class);

        $avis = $avisRepository->findAllByVoiture($voiture);


        return $this->render("voitures/show", [
            "pageTitle"=> $voiture->getModel(),
            "avis"=>$avis,
            "voiture"=>$voiture,

        ]);
    }

    public function create(){
    $image = null;
    $model = null;
    $description = null;

        if (!empty($_POST["model"])){
            $model = htmlspecialchars($_POST["model"]);
        }
        if (!empty($_POST["description"])){
            $description = htmlspecialchars($_POST["description"]);
        }
        if (!empty($_POST['image'])) {
            $image = htmlspecialchars($_POST['image']);
        }

        if ($model && $description){

            $image = new File("image");

            $voiture = new Voiture();

            $voiture->setModel($model);
            $voiture->setDescription($description);


            if ($image->isImage()){$image->upload();

                $voiture->setImage($image->getName());

            };

            $this->repository->insert($voiture);

        }
        return $this->render("voitures/create", [
            "pageTitle"=>"Nouvelle Voiture"
        ]);
    }

    public function remove(){
        $id= null;

        if (!empty($_GET["id"]) && ctype_digit($_GET["id"])){
            $id = $_GET["id"];
        }

        if(!$id){ return $this->redirect(); }

        $voiture = $this->repository->findById($id);

        if (!$voiture){return  $this->redirect();}

        $this->repository->delete($voiture);

        return $this->redirect();
    }



}