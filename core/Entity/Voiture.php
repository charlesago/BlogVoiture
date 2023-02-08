<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\VoitureRepository;


#[Table(name: "voitures")]
#[TargetRepository(repositoryName: VoitureRepository::class)]
class Voiture extends AbstractEntity
{
    private int $id;
    private string $model;

    private string $description;

    private string $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}