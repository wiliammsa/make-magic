<?php


namespace App\Repositories;


use App\Models\Character;
use App\Repositories\Contracts\CharacterRepositoryInterface;

class CharacterRepository extends AbstractRepository implements CharacterRepositoryInterface
{
    protected $model;

    public function __construct(Character $characterModel)
    {
        $this->model = $characterModel;
    }
}
