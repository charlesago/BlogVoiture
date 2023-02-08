<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\AvisRepository;

#[Table(name: "avis")]
#[TargetRepository(repositoryName: AvisRepository::class)]
class Avis extends AbstractEntity
{


    private int $id;

    private string $content;

    private int $voiture_id;

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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getVoitureId(): int
    {
        return $this->voiture_id;
    }

    /**
     * @param int $voiture_id
     */
    public function setVoitureId(int $voiture_id): void
    {
        $this->voiture_id = $voiture_id;
    }


}