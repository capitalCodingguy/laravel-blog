<?php 

namespace App\Http\Repositories;

abstract class Repository
{
   public abstract function model();

   public abstract function tag();

   public function find($id)
   {
        $model = $this->model()->findOrFail($id); 
        return $model;
   }

   public function count()
   {
       $count = $this->model()-count();
       return $count;
   }

   public function all()
   {
        $all = $this->model()-all();
        return $all;
   }
}