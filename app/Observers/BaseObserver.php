<?php

namespace App\Observers;

class BaseObserver
{
    /**
     * @param $model
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function creating($model)
    {
        $model->created_by = request()->get('token_decode')['id'];
        $model->updated_by = request()->get('token_decode')['id'];
    }

    /**
     * @param $model
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function updating($model)
    {
        $model->updated_by = request()->get('token_decode')['id'];
    }

    /**
     * @param $model
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function deleting($model)
    {
        $model->deleted_by = request()->get('token_decode')['id'];
    }
}
