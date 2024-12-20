<?php

namespace App\Http\Controllers;

use App\dao\FraisService;
use App\Models\Frais;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class FraisController extends Controller
{
    public function ajout(Request $request){
        try{
            $frais = new Frais();
            $frais->anneemois=$request->json('anneemois');
            $frais->id_visiteur=$request->json('id_visiteur');
            $frais->nbjustificatifs=$request->json('nbjustificatifs');
            $frais->id_etat=2;
            $frais->datemodification=now();
            $service=new FraisService();
            $service->AjoutFrais($frais);
            return response()->json(['message' => 'Insertion réalisée','id_frais'=>$frais->id_frais]);
        }catch (Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function modif(Request $request){
        try{
            $id=$request->json('id_frais');
            $service = new FraisService();
            $frais=$service->getFrais($id);
            $frais->id_frais=$request->json('id_frais');
            $frais->anneemois=$request->json('anneemois');
            $frais->id_visiteur=$request->json('id_visiteur');
            $frais->nbjustificatifs=$request->json('nbjustificatifs');
            $frais->montantvalide=$request->json('montantvalide');
            $frais->id_etat=$request->json('id_etat');
            return response()->json(['message'=>'Modification réalisée','id_frais'=>$frais->id_frais]);
        }catch (Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }
    public function suppr(Request $request){
        try{
            $id=$request->json('id_frais');
            $service = new FraisService();
            $service->delFrais($id);
            return response()->json(["message"=>'Suppression réalisée','id_frais'=>$id]);
        }catch (Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }

    }
}
