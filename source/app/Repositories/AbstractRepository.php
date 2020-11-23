<?php


namespace App\Repositories;


use App\Contracts\IRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AbstractRepository implements IRepository
{

    public function getUser()
    {
        return Auth::user()??User::find(1);
    }
}
