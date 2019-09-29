<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;


class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(',', [
            'id',
            'CONCAT (id, "." title) AS id_title',
        ]);

        $result[] = $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }


    /**
     * @param null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'parent_id',
        ];

        $result = $this->startConditions()->select($columns)->paginate($perPage);

        return $result;
    }
}