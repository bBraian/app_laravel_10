<?php

namespace App\Repositories;

use App\DTO\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Models\Support;
use stdClass;

class SupportRepository
{
    public function __construct(
        protected Support $model
    )
    {}

    public function getAll(?string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter) {
                        if($filter) {
                            $query->where('subject', 'LIKE', "%{$filter}%")
                                  ->orWhere('body', 'LIKE', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id): stdClass | null
    {
        $support = $this->model->find($id);
        if(!$support) {
            return null;
        }
        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create((array) $dto);
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass | null
    {
        $support = $this->model->find($dto->id);
        if(!$support) {
            return null;
        }
        $support->update((array) $dto);
        return (object) $support->toArray();
    }

}
