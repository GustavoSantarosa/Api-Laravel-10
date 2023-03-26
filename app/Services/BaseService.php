<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseService
{
    protected ?array $data;
    protected ?Model $model;

    public function index(): Collection
    {
        return $this->model::get();
    }

    public function show(int $id): Model
    {
        return $this->model::findOrfail($id);
    }

    public function store(): Model
    {
        return $this->model::create($this->data);
    }

    public function update(int $id): Model
    {
        $user = $this->show($id);

        $user->update($this->data);

        return $user->refresh();
    }

    public function destroy(int $id): bool
    {
        $user = $this->show($id);

        return $user->delete();
    }

    public function setData(array $value): self
    {
        $this->data = $value;

        return $this;
    }

    public function setModel(string | Model $value): self
    {
        $this->model = $value instanceof Model ? $value : new $value();

        return $this;
    }
}
