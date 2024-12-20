<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class FraisService
{
public function AjoutFrais(Frais $frais){
    try{
        $frais->save();
    }catch(QueryException $e){
        $erreur=$e->getMessage();
        throw new MonException($erreur,5);
    }

//recupere un $frais et mettre un save
}
public function getFrais($id){
    try{
        return Frais::query()
            ->findOrFail($id);
    }catch (QueryException $e){
        throw new MonException($e->getMessage(),5);
    }
}
public function delFrais($id){
    try{
        Frais::destroy($id);
    }catch (QueryException $e){
        throw new MonException($e->getMessage(),5);
    }
}
}

