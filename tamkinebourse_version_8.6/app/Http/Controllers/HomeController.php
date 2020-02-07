<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domaine;
use App\Directionprovinciale;
use App\Aref;
use App\Universite;
use App\Inscriptioninterne;
use App\Inscriptionexterne;
use \PDF;
use \DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } *//*
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    } */

    public function show(){

        return view('liste_info');
    }
    public function show_externe(){

        return view('liste_info_externe')->with('ex' , Inscriptionexterne::all());
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with('direction' , Directionprovinciale::all())->with('universite' , Universite::all())->with('domaine', Domaine::all())->with('aref' , Aref::all())->with('in' , Inscriptioninterne::all())->with('ex', Inscriptionexterne::all());
    }

    public function ajouterinterne(Request $request){


        $this->validate($request , [

            "type_bourse" => "required",
            "type_inscription" => "",
            "cin" => "required",
            "date_naissance" => "required",
            "telephone" => "required",
            "filiere_bac" => "required",
            "annee_inscription" => "required",
            "etablissement" => "required",
            "situation_pere" => "required",
            "situation_mere" => "required",
            "note_premierbac" => "required",
            "note_examreg" => "required",
            "featured_1" =>  "required",
            "featured_2" => "required",
            "featured_3" => "required",
            "featured_4" => "required",
            "id_aref_fk" => "required",
            "id_user_fk" => "required",
            "id_direction_fk" => "required",
            "id_universite_fk" => "required",
            "id_domaine_fk" => "required",
            "id_filiere_fk" => "required"

        ]);

        $featured_1 = $request->file('featured_1');
        $featured_new_name_1 = time().$featured_1->getClientOriginalName();
        $featured_1->move('storage/images/', $featured_new_name_1);

        $featured_2 = $request->file('featured_2');
        $featured_new_name_2 = time().$featured_2->getClientOriginalName();
        $featured_2->move('storage/images/', $featured_new_name_2);

        $featured_3 = $request->file('featured_3');
        $featured_new_name_3 = time().$featured_3->getClientOriginalName();
        $featured_3->move('storage/images/', $featured_new_name_3);

        $featured_4 = $request->file('featured_4');
        $featured_new_name_4 = time().$featured_4->getClientOriginalName();
        $featured_4->move('storage/images/', $featured_new_name_4);

        $in = Inscriptioninterne::create([

            "cin" => $request->cin,
            "type_bourse" => $request->type_bourse,
            "type_inscription" => $request->type_inscription,
            "date_naissance" => $request->date_naissance->format('d/m/Y'),
            "etablissement" => $request->etablissement,
            "telephone" => $request->telephone,
            "filiere_bac" => $request->filiere_bac,
            "situation_pere" => $request->situation_pere,
            "situation_mere" => $request->situation_mere,
            "note_premierbac" => $request->note_premierbac,
            "note_examreg"=> $request->note_examreg,
            "annee_inscription" => $request->annee_inscription,
            "id_aref_fk" => $request->id_aref_fk,
            "id_user_fk" => $request->id_user_fk,
            "id_universite_fk" => $request->id_universite_fk,
            "id_domaine_fk" => $request->id_domaine_fk,
            "id_direction_fk" => $request->id_direction_fk,
            "id_filiere_fk" => $request->id_filiere_fk,
            "featured_1" => 'storage/images/'.$featured_new_name_1,
            "featured_2" => 'storage/images/'.$featured_new_name_2,
            "featured_3" => 'storage/images/'.$featured_new_name_3,
            "featured_4" => 'storage/images/'.$featured_new_name_4

        ]);

        dd("exited");
        return redirect()->route('liste_info');
    }



    public function ajouterexterne(Request $request){
        
        $this->validate($request , [

            "type_bourse" => "required",
            "cin" => "required",
            "pays" => "required",
            "date_naissance" => "required",
            "telephone" => "required",
            "filiere_bac" => "required",
            "annee_inscription" => "required",
            "etablissement" => "required",
            "situation_pere" => "required",
            "situation_mere" => "required",
            "note_premierbac" => "required",
            "note_examreg" => "required",
            "featured_1" =>  "required",
            "featured_2" => "required",
            "featured_3" => "required",
            "featured_4" => "required",
            "id_user_fk" => "required",
            "id_universite_fk" => "required",
            "id_domaine_fk" => "required"

        ]);

        $featured_1 = $request->file('featured_1');
        $featured_new_name_01 = time().$featured_1->getClientOriginalName();
        $featured_1->move('storage/externes/', $featured_new_name_01);

        $featured_2 = $request->file('featured_2');
        $featured_new_name_02 = time().$featured_2->getClientOriginalName();
        $featured_2->move('storage/externes/', $featured_new_name_02);

        $featured_3 = $request->file('featured_3');
        $featured_new_name_03 = time().$featured_3->getClientOriginalName();
        $featured_3->move('storage/externes/', $featured_new_name_03);

        $featured_4 = $request->file('featured_4');
        $featured_new_name_04 = time().$featured_4->getClientOriginalName();
        $featured_4->move('storage/externes/', $featured_new_name_04);


        $inx = Inscriptionexterne::create([

            "cin" => $request->cin,
            "pays" => $request->pays,
            "type_bourse" => $request->type_bourse,
            "date_naissance" => $request->date_naissance,
            "etablissement" => $request->etablissement,
            "telephone" => $request->telephone,
            "filiere_bac" => $request->filiere_bac,
            "situation_pere" => $request->situation_pere,
            "situation_mere" => $request->situation_mere,
            "note_premierbac" => $request->note_premierbac,
            "note_examreg"=> $request->note_examreg,
            "annee_inscription" => $request->annee_inscription,
            "id_user_fk" => $request->id_user_fk,
            "id_universite_fk" => $request->id_universite_fk,
            "id_domaine_fk" => $request->id_domaine_fk,
            "featured_1" => 'storage/externes/'.$featured_new_name_01,
            "featured_2" => 'storage/externes/'.$featured_new_name_02,
            "featured_3" => 'storage/externes/'.$featured_new_name_03,
            "featured_4" => 'storage/externes/'.$featured_new_name_04

        ]);

        return redirect()->route('liste_info_externe');

    }



}

