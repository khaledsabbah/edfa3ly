<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;

interface IOffer
{

    public function applyAnOffer(int $discount);
}
