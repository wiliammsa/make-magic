<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function findBy(array $criteria)
    {
        if (count($criteria) > 0) {
            $model = $this->model;
            foreach ($criteria as $c)
            {
                $model = $model->where($c[0], '=', $c[1]);
            }
            return $model->get();
        }

    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
