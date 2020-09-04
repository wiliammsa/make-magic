<?php


namespace App\Repositories;


use App\Models\Characters;
use App\Repositories\Contracts\CharacterRepositoryInterface;

class CharacterRepository extends AbstractRepository implements CharacterRepositoryInterface
{
    protected $model;

    public function __construct(Characters $characterModel)
    {
        $this->model = $characterModel;
    }
}
