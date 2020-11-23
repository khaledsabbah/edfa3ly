<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;

interface IEntity
{
    public function setModel(Model $model);
    public function getModel():Model ;
}
