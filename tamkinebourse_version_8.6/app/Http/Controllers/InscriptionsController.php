<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Domaine;
use App\Directionprovinciale;
use App\Aref;
use App\Filiere;
use App\Universite;
use App\Inscriptioninterne;
use App\Inscriptionexterne;
use App\Inscriptionsuite;
use \PDF;
use \DB;
use Excel;

class InscriptionsController extends Controller
{
    public function finale_externe(){

        $ext = DB::table('inscriptionsuite')
        ->join('inscriptions', 'inscriptions.id', '=', 'inscriptionsuite.id_inscriptions_fk')
        ->join('users' , 'users.id', '=' , 'inscriptions.id_user_fk')
        ->join('universites' , 'universites.id', '=' , 'inscriptions.id_universite_fk')
        ->join('domaines' , 'domaines.id', '=' , 'inscriptions.id_domaine_fk')
        ->join('filieres' , 'filieres.id', '=' , 'inscriptions.id_filiere_fk')
        ->select('inscriptions.*' , 'inscriptionsuite.*' , 'users.*', 'universites.*', 'domaines.*' , 'filieres.*')
        ->where('type_inscription', '=', "E"  )
        ->get();


         //dd($sui);
        return view('etapefinale.finale_externe' , compact('ext'));

    }

    public function finale_interne(){

        $in = DB::table('inscriptionsuite')
        ->join('inscriptions', 'inscriptions.id', '=', 'inscriptionsuite.id_inscriptions_fk')
        ->join('users' , 'users.id' , '=' , 'inscriptions.id_user_fk')
        ->join('universites' , 'universites.id' , '=' , 'inscriptions.id_universite_fk')
        ->join('arefs' , 'arefs.id' , '=' , 'inscriptions.id_aref_fk')
        ->join('domaines' , 'domaines.id' , '=' , 'inscriptions.id_domaine_fk')
        ->join('filieres' , 'filieres.id' , '=' , 'inscriptions.id_filiere_fk')
        ->join('directionprovinciales' , 'directionprovinciales.id' , '=' , 'inscriptions.id_direction_fk')
        ->select('inscriptions.*' , 'inscriptionsuite.*' , 'users.*' , 'universites.*' , 'arefs.*' , 'domaines.*' , 'filieres.*' , 'directionprovinciales.*')
        ->where('type_inscription', '=', "M"  )
        ->get();



        return view('etapefinale.finale_interne' , compact('in'));

    }
    public function form_valide(){

        return view('inscriptions.valider');
    }

    public function inscriptions_suite(Request $request){

        $this->validate($request , [

            'note_bac' => "required",
            'featured_01' => "required",
            'featured_02' => "required",
        ]);

        $featured_01 = $request->file('featured_01');
        $featured_new_name_1 = time().$featured_01->getClientOriginalName();
        $featured_01->move('storage/suite/', $featured_new_name_1);

        $featured_02 = $request->file('featured_02');
        $featured_new_name_2 = time().$featured_02->getClientOriginalName();
        $featured_02->move('storage/suite/', $featured_new_name_2);

        $iins = Inscriptionsuite::create([
            "note_bac" => $request->note_bac,
            "id_inscriptions_fk" => $request->id_inscriptions_fk,
            "featured_01" => 'storage/suite/'.$featured_new_name_1,
            "featured_02" => 'storage/suite/'.$featured_new_name_2
        ]);

        return \Redirect::to("/reussi");
}

    public function form_suite(){

        return view('inscriptions.inscriptionsuite');
    }


    public function validationRules()
    {
        return $rules = [
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
            "id_aref_fk" => "",
            "id_user_fk" => "required",
            "pays" => "",
            "id_direction_fk" => "",
            "id_universite_fk" => "required",
            "id_domaine_fk" => "required",
            "id_filiere_fk" => "required"
        ];
    }

    public function delete_inscription($id)
    {
        $delete_inscription = Inscriptioninterne::find($id);
        $delete_inscription->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $inscriptions = Inscriptioninterne::find($id);
        $aref = Aref::all();
        $universite = Universite::all();

        $direction = Directionprovinciale::where("id_aref_fk", "=", $inscriptions->id_aref_fk)->get();
        $domaine = Domaine::where("id_universite_fk", "=", $inscriptions->id_universite_fk)->get();
        $filiere = Filiere::where("id_domaine_fk", "=", $inscriptions->id_domaine_fk)->get();

        return view("inscriptions.edit")->with("inscriptions", $inscriptions)->with("aref", $aref)->with("direction", $direction)->with("universite", $universite)->with("domaine", $domaine)->with("filiere", $filiere);
    }

    public function update(Request $request, $id)
    {

        $rules = [
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
            "featured_1" =>  "",
            "featured_2" => "",
            "featured_3" => "",
            "featured_4" => "",
            "id_aref_fk" => "",
            "id_user_fk" => "required",
            "pays" => "",
            "id_direction_fk" => "",
            "id_universite_fk" => "required",
            "id_domaine_fk" => "required",
            "id_filiere_fk" => "required"
        ];


        $inscriptions = Inscriptioninterne::find($id);

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return \Redirect::to('/home')->withErrors($validator)->withInput($request->all());
        } else {

            if ( $request->hasFile('featured_1')) {

                $featured_1 = $request->file('featured_1');
                $featured_new_name_1 = time() . $featured_1->getClientOriginalName();
                $featured_1->move('storage/images/', $featured_new_name_1);
                $inscriptions->featured_1 = 'storage/images/' . $featured_new_name_1;
            }

            if ($request->hasFile('featured_2')) {
                $featured_2 = $request->file('featured_2');
                $featured_new_name_2 = time() . $featured_2->getClientOriginalName();
                $featured_2->move('storage/images/', $featured_new_name_2);
                $inscriptions->featured_2 = 'storage/images/' . $featured_new_name_2;
            }

            if ($request->hasFile('featured_3')) {
                $featured_3 = $request->file('featured_3');
                $featured_new_name_3 = time() . $featured_3->getClientOriginalName();
                $featured_3->move('storage/images/', $featured_new_name_3);
                $inscriptions->featured_3 = 'storage/images/' . $featured_new_name_3;
            }

            if ($request->hasFile('featured_4')) {
                $featured_4 = $request->file('featured_4');
                $featured_new_name_4 = time() . $featured_4->getClientOriginalName();
                $featured_4->move('storage/images/', $featured_new_name_4);
                $inscriptions->featured_4 = 'storage/images/' . $featured_new_name_4;
            }

            $inscriptions->cin = $request->cin;
            $inscriptions->type_bourse = $request->type_bourse;
            $inscriptions->type_inscription = $request->type_inscription;
            $inscriptions->date_naissance = $request->date_naissance;
            $inscriptions->etablissement = $request->etablissement;
            $inscriptions->telephone = $request->telephone;
            $inscriptions->filiere_bac = $request->filiere_bac;
            $inscriptions->situation_pere = $request->situation_pere;
            $inscriptions->situation_mere = $request->situation_mere;
            $inscriptions->note_premierbac = $request->note_premierbac;
            $inscriptions->note_examreg = $request->note_examreg;
            $inscriptions->annee_inscription = $request->annee_inscription;
            $inscriptions->id_aref_fk = $request->id_aref_fk;
            $inscriptions->id_user_fk = $request->id_user_fk;
            $inscriptions->id_universite_fk = $request->id_universite_fk;
            $inscriptions->id_domaine_fk = $request->id_domaine_fk;
            $inscriptions->id_direction_fk = $request->id_direction_fk;
            $inscriptions->id_filiere_fk = $request->id_filiere_fk;

            $inscriptions->save();

            return redirect()->to("/info");
        }
    }

    public function liste_inscriptions()
    {
        $inscriptions = Inscriptioninterne::where("id_user_fk", "=", \Auth::user()->id)->paginate(10);
        return view("inscriptions.index", compact("inscriptions"));
    }

    public function detail_inscriptions()
    {
        $suites = Inscriptionsuite::all();
        $is_in = false;
        foreach( $suites as $suite ) {
            if( $suite->id_inscriptions_fk == \Auth::user()->inscription_interne->id ) {
                $is_in = true;
            }
        }

        if (!\Auth::user()->inscription_interne) {
            return \Redirect::to("/home");
        }
        $inscription = Inscriptioninterne::find(\Auth::user()->inscription_interne->id);
        return view("inscriptions.detail", compact('inscription', "is_in"));
    }

    public function ajouter(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->validationRules());

        if ($validator->fails()) {
            $messages = $validator->messages();
            return \Redirect::to('/home')->withErrors($validator)->withInput($request->all());
        } else {
            $featured_1 = $request->file('featured_1');
            $featured_new_name_1 = time() . $featured_1->getClientOriginalName();
            $featured_1->move('storage/images/', $featured_new_name_1);

            $featured_2 = $request->file('featured_2');
            $featured_new_name_2 = time() . $featured_2->getClientOriginalName();
            $featured_2->move('storage/images/', $featured_new_name_2);

            $featured_3 = $request->file('featured_3');
            $featured_new_name_3 = time() . $featured_3->getClientOriginalName();
            $featured_3->move('storage/images/', $featured_new_name_3);

            $featured_4 = $request->file('featured_4');
            $featured_new_name_4 = time() . $featured_4->getClientOriginalName();
            $featured_4->move('storage/images/', $featured_new_name_4);

            if ($request->type_inscription == "M") {
                $in = Inscriptioninterne::create([
                    "cin" => $request->cin,
                    "type_bourse" => $request->type_bourse,
                    "type_inscription" => $request->type_inscription,
                    "date_naissance" => $request->date_naissance,
                    "etablissement" => $request->etablissement,
                    "telephone" => $request->telephone,
                    "filiere_bac" => $request->filiere_bac,
                    "situation_pere" => $request->situation_pere,
                    "situation_mere" => $request->situation_mere,
                    "note_premierbac" => $request->note_premierbac,
                    "note_examreg" => $request->note_examreg,
                    "annee_inscription" => $request->annee_inscription,
                    "id_aref_fk" => $request->id_aref_fk,
                    "id_user_fk" => $request->id_user_fk,
                    "id_universite_fk" => $request->id_universite_fk,
                    "id_domaine_fk" => $request->id_domaine_fk,
                    "id_direction_fk" => $request->id_direction_fk,
                    "id_filiere_fk" => $request->id_filiere_fk,
                    "featured_1" => 'storage/images/' . $featured_new_name_1,
                    "featured_2" => 'storage/images/' . $featured_new_name_2,
                    "featured_3" => 'storage/images/' . $featured_new_name_3,
                    "featured_4" => 'storage/images/' . $featured_new_name_4
                ]);
            } else if ($request->type_inscription == "E") {
                $in = Inscriptioninterne::create([
                    "cin" => $request->cin,
                    "pays" => $request->pays,
                    "type_bourse" => $request->type_bourse,
                    "type_inscription" => $request->type_inscription,
                    "date_naissance" => $request->date_naissance,
                    "etablissement" => $request->etablissement,
                    "telephone" => $request->telephone,
                    "filiere_bac" => $request->filiere_bac,
                    "situation_pere" => $request->situation_pere,
                    "situation_mere" => $request->situation_mere,
                    "note_premierbac" => $request->note_premierbac,
                    "note_examreg" => $request->note_examreg,
                    "annee_inscription" => $request->annee_inscription,
                    "id_user_fk" => $request->id_user_fk,
                    "id_universite_fk" => $request->id_universite_fk,
                    "id_domaine_fk" => $request->id_domaine_fk,
                    "id_filiere_fk" => $request->id_filiere_fk,
                    "featured_1" => 'storage/images/' . $featured_new_name_1,
                    "featured_2" => 'storage/images/' . $featured_new_name_2,
                    "featured_3" => 'storage/images/' . $featured_new_name_3,
                    "featured_4" => 'storage/images/' . $featured_new_name_4
                ]);
            }



            return \Redirect::to("/info");
        }
    }

    public function show()
    {

        return view('admin.liste_info');
    }

    public function show_externe()
    {

        return view('admin.liste_info_externe'); //->with('ex' , Inscriptionexterne::all());
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home')->with('direction' , Directionprovinciale::all())->with('universite' , Universite::all())->with('domaine', Domaine::all())->with('aref' , Aref::all())->with('in' , Inscriptioninterne::all())->with('ex', Inscriptionexterne::all());
        return view('home')->with('direction', Directionprovinciale::all())->with('universite', Universite::all())->with('domaine', Domaine::all())->with('aref', Aref::all())->with('in', Inscriptioninterne::all());
    }

    public function exportpdf()
    {

        $pdf = PDF::loadView('admin.liste_infopdf')->setPaper('a4', 'landscape');
        return $pdf->download('info_etudiant.pdf');
    }

    public function exportpdf_externe()
    {

        $pdf = PDF::loadView('admin.liste_info_externepdf')->setPaper('a4', 'landscape');
        return $pdf->download('info_etudiant.pdf');
    }

    public function gestionall()
    {

        $total_inscriptions = InscriptionInterne::all()->count();

        $m = InscriptionInterne::where("type_inscription", "=", "M")->get();

        $inscrit = InscriptionInterne::where("type_inscription", "=", "M")->get()->count();
        $inscritex = InscriptionInterne::where("type_inscription", "=", "E")->get()->count();

        $ex_1 = Inscriptioninterne::where('id_aref_fk', '=', 1)->where("type_inscription", "=", "M")->get();
        $ex_2 = Inscriptioninterne::where('id_aref_fk', '=', 2)->where("type_inscription", "=", "M")->get();
        $ex_3 = Inscriptioninterne::where('id_aref_fk', '=', 3)->where("type_inscription", "=", "M")->get();
        $ex_4 = Inscriptioninterne::where('id_aref_fk', '=', 4)->where("type_inscription", "=", "M")->get();
        $ex_5 = Inscriptioninterne::where('id_aref_fk', '=', 5)->where("type_inscription", "=", "M")->get();
        $ex_6 = Inscriptioninterne::where('id_aref_fk', '=', 6)->where("type_inscription", "=", "M")->get();
        $ex_7 = Inscriptioninterne::where('id_aref_fk', '=', 7)->where("type_inscription", "=", "M")->get();
        $ex_8 = Inscriptioninterne::where('id_aref_fk', '=', 8)->where("type_inscription", "=", "M")->get();
        $ex_9 = Inscriptioninterne::where('id_aref_fk', '=', 9)->where("type_inscription", "=", "M")->get();
        $ex_10 = Inscriptioninterne::where('id_aref_fk', '=', 10)->where("type_inscription", "=", "M")->get();
        $ex_11 = Inscriptioninterne::where('id_aref_fk', '=', 11)->where("type_inscription", "=", "M")->get();
        $ex_12 = Inscriptioninterne::where('id_aref_fk', '=', 12)->where("type_inscription", "=", "M")->get();

        $di_01 = Inscriptioninterne::where('id_direction_fk', '=', 1)->where("type_inscription", "=", "M")->get();
        $di_02 = Inscriptioninterne::where('id_direction_fk', '=', 2)->where("type_inscription", "=", "M")->get();
        $di_03 = Inscriptioninterne::where('id_direction_fk', '=', 3)->where("type_inscription", "=", "M")->get();
        $di_04 = Inscriptioninterne::where('id_direction_fk', '=', 4)->where("type_inscription", "=", "M")->get();
        $di_05 = Inscriptioninterne::where('id_direction_fk', '=', 5)->where("type_inscription", "=", "M")->get();
        $di_06 = Inscriptioninterne::where('id_direction_fk', '=', 6)->where("type_inscription", "=", "M")->get();
        $di_07 = Inscriptioninterne::where('id_direction_fk', '=', 7)->where("type_inscription", "=", "M")->get();
        $di_08 = Inscriptioninterne::where('id_direction_fk', '=', 8)->where("type_inscription", "=", "M")->get();
        $di_09 = Inscriptioninterne::where('id_direction_fk', '=', 9)->where("type_inscription", "=", "M")->get();
        $di_10 = Inscriptioninterne::where('id_direction_fk', '=', 10)->where("type_inscription", "=", "M")->get();
        $di_11 = Inscriptioninterne::where('id_direction_fk', '=', 11)->where("type_inscription", "=", "M")->get();
        $di_12 = Inscriptioninterne::where('id_direction_fk', '=', 12)->where("type_inscription", "=", "M")->get();
        $di_13 = Inscriptioninterne::where('id_direction_fk', '=', 13)->where("type_inscription", "=", "M")->get();
        $di_14 = Inscriptioninterne::where('id_direction_fk', '=', 14)->where("type_inscription", "=", "M")->get();
        $di_15 = Inscriptioninterne::where('id_direction_fk', '=', 15)->where("type_inscription", "=", "M")->get();
        $di_16 = Inscriptioninterne::where('id_direction_fk', '=', 16)->where("type_inscription", "=", "M")->get();
        $di_17 = Inscriptioninterne::where('id_direction_fk', '=', 17)->where("type_inscription", "=", "M")->get();
        $di_18 = Inscriptioninterne::where('id_direction_fk', '=', 18)->where("type_inscription", "=", "M")->get();
        $di_19 = Inscriptioninterne::where('id_direction_fk', '=', 19)->where("type_inscription", "=", "M")->get();
        $di_20 = Inscriptioninterne::where('id_direction_fk', '=', 20)->where("type_inscription", "=", "M")->get();
        $di_21 = Inscriptioninterne::where('id_direction_fk', '=', 21)->where("type_inscription", "=", "M")->get();
        $di_22 = Inscriptioninterne::where('id_direction_fk', '=', 22)->where("type_inscription", "=", "M")->get();
        $di_23 = Inscriptioninterne::where('id_direction_fk', '=', 23)->where("type_inscription", "=", "M")->get();
        $di_24 = Inscriptioninterne::where('id_direction_fk', '=', 24)->where("type_inscription", "=", "M")->get();
        $di_25 = Inscriptioninterne::where('id_direction_fk', '=', 25)->where("type_inscription", "=", "M")->get();
        $di_26 = Inscriptioninterne::where('id_direction_fk', '=', 26)->where("type_inscription", "=", "M")->get();
        $di_27 = Inscriptioninterne::where('id_direction_fk', '=', 27)->where("type_inscription", "=", "M")->get();
        $di_28 = Inscriptioninterne::where('id_direction_fk', '=', 28)->where("type_inscription", "=", "M")->get();
        $di_29 = Inscriptioninterne::where('id_direction_fk', '=', 29)->where("type_inscription", "=", "M")->get();
        $di_30 = Inscriptioninterne::where('id_direction_fk', '=', 30)->where("type_inscription", "=", "M")->get();
        $di_31 = Inscriptioninterne::where('id_direction_fk', '=', 31)->where("type_inscription", "=", "M")->get();
        $di_32 = Inscriptioninterne::where('id_direction_fk', '=', 32)->where("type_inscription", "=", "M")->get();
        $di_33 = Inscriptioninterne::where('id_direction_fk', '=', 33)->where("type_inscription", "=", "M")->get();
        $di_34 = Inscriptioninterne::where('id_direction_fk', '=', 34)->where("type_inscription", "=", "M")->get();
        $di_35 = Inscriptioninterne::where('id_direction_fk', '=', 35)->where("type_inscription", "=", "M")->get();
        $di_36 = Inscriptioninterne::where('id_direction_fk', '=', 36)->where("type_inscription", "=", "M")->get();
        $di_37 = Inscriptioninterne::where('id_direction_fk', '=', 37)->where("type_inscription", "=", "M")->get();
        $di_38 = Inscriptioninterne::where('id_direction_fk', '=', 38)->where("type_inscription", "=", "M")->get();
        $di_39 = Inscriptioninterne::where('id_direction_fk', '=', 39)->where("type_inscription", "=", "M")->get();
        $di_40 = Inscriptioninterne::where('id_direction_fk', '=', 40)->where("type_inscription", "=", "M")->get();
        $di_41 = Inscriptioninterne::where('id_direction_fk', '=', 41)->where("type_inscription", "=", "M")->get();
        $di_42 = Inscriptioninterne::where('id_direction_fk', '=', 42)->where("type_inscription", "=", "M")->get();
        $di_43 = Inscriptioninterne::where('id_direction_fk', '=', 43)->where("type_inscription", "=", "M")->get();
        $di_44 = Inscriptioninterne::where('id_direction_fk', '=', 44)->where("type_inscription", "=", "M")->get();
        $di_45 = Inscriptioninterne::where('id_direction_fk', '=', 45)->where("type_inscription", "=", "M")->get();
        $di_46 = Inscriptioninterne::where('id_direction_fk', '=', 46)->where("type_inscription", "=", "M")->get();
        $di_47 = Inscriptioninterne::where('id_direction_fk', '=', 47)->where("type_inscription", "=", "M")->get();
        $di_48 = Inscriptioninterne::where('id_direction_fk', '=', 48)->where("type_inscription", "=", "M")->get();
        $di_49 = Inscriptioninterne::where('id_direction_fk', '=', 49)->where("type_inscription", "=", "M")->get();
        $di_50 = Inscriptioninterne::where('id_direction_fk', '=', 50)->where("type_inscription", "=", "M")->get();
        $di_51 = Inscriptioninterne::where('id_direction_fk', '=', 51)->where("type_inscription", "=", "M")->get();
        $di_52 = Inscriptioninterne::where('id_direction_fk', '=', 52)->where("type_inscription", "=", "M")->get();
        $di_53 = Inscriptioninterne::where('id_direction_fk', '=', 53)->where("type_inscription", "=", "M")->get();
        $di_54 = Inscriptioninterne::where('id_direction_fk', '=', 54)->where("type_inscription", "=", "M")->get();
        $di_55 = Inscriptioninterne::where('id_direction_fk', '=', 55)->where("type_inscription", "=", "M")->get();
        $di_56 = Inscriptioninterne::where('id_direction_fk', '=', 56)->where("type_inscription", "=", "M")->get();
        $di_57 = Inscriptioninterne::where('id_direction_fk', '=', 57)->where("type_inscription", "=", "M")->get();
        $di_58 = Inscriptioninterne::where('id_direction_fk', '=', 58)->where("type_inscription", "=", "M")->get();
        $di_59 = Inscriptioninterne::where('id_direction_fk', '=', 59)->where("type_inscription", "=", "M")->get();
        $di_60 = Inscriptioninterne::where('id_direction_fk', '=', 60)->where("type_inscription", "=", "M")->get();
        $di_61 = Inscriptioninterne::where('id_direction_fk', '=', 61)->where("type_inscription", "=", "M")->get();
        $di_62 = Inscriptioninterne::where('id_direction_fk', '=', 62)->where("type_inscription", "=", "M")->get();
        $di_63 = Inscriptioninterne::where('id_direction_fk', '=', 63)->where("type_inscription", "=", "M")->get();
        $di_64 = Inscriptioninterne::where('id_direction_fk', '=', 64)->where("type_inscription", "=", "M")->get();
        $di_65 = Inscriptioninterne::where('id_direction_fk', '=', 65)->where("type_inscription", "=", "M")->get();
        $di_66 = Inscriptioninterne::where('id_direction_fk', '=', 66)->where("type_inscription", "=", "M")->get();
        $di_67 = Inscriptioninterne::where('id_direction_fk', '=', 67)->where("type_inscription", "=", "M")->get();
        $di_68 = Inscriptioninterne::where('id_direction_fk', '=', 68)->where("type_inscription", "=", "M")->get();
        $di_69 = Inscriptioninterne::where('id_direction_fk', '=', 69)->where("type_inscription", "=", "M")->get();
        $di_70 = Inscriptioninterne::where('id_direction_fk', '=', 70)->where("type_inscription", "=", "M")->get();
        $di_71 = Inscriptioninterne::where('id_direction_fk', '=', 71)->where("type_inscription", "=", "M")->get();
        $di_72 = Inscriptioninterne::where('id_direction_fk', '=', 72)->where("type_inscription", "=", "M")->get();
        $di_73 = Inscriptioninterne::where('id_direction_fk', '=', 73)->where("type_inscription", "=", "M")->get();

        $u_01 = Inscriptioninterne::where('id_universite_fk', '=', 1)->where("type_inscription", "=", "M")->get();
        $u_02 = Inscriptioninterne::where('id_universite_fk', '=', 2)->where("type_inscription", "=", "M")->get();
        $u_03 = Inscriptioninterne::where('id_universite_fk', '=', 3)->where("type_inscription", "=", "M")->get();





        $aref = Aref::all();
        return view('admin.gestion', compact("total_inscriptions",  'm', 'inscrit', 'inscritex','di_01','di_02',  'di_03', 'di_04', 'di_05' , 'di_06', 'di_07', 'di_08' ,'di_09' , 'di_10','di_11','di_12','di_13','di_14','di_15','di_16','di_17','di_18','di_19','di_20','di_21','di_22','di_23','di_24','di_25','di_26','di_27','di_28','di_29','di_30','di_31','di_32','di_33','di_34','di_35','di_36','di_37','di_38','di_39','di_40','di_41','di_42','di_43','di_44','di_45','di_46','di_47','di_48','di_49','di_50','di_51','di_52','di_53','di_54','di_55','di_56','di_57','di_58','di_59','di_60','di_61','di_62','di_63','di_63','di_64','di_65','di_66','di_67','di_68','di_69','di_70','di_70','di_71','di_72','di_73','ex_1', 'ex_2', 'ex_3', 'ex_4', 'ex_5', 'ex_6', 'ex_7', 'ex_8', 'ex_9', 'ex_10', 'ex_11', 'ex_12', 'aref','u_01','u_02','u_03'));
        /* return view('admin.gestion'); */
    }

    public function exportexterne(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $data = Inscriptioninterne::where('type_inscription', '=', "E")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->get();

        // $data = Inscriptioninterne::where('type_inscription', "=" , "E")->get();
        //$data  = DB::table('inscriptions')->where('type_inscription', "=" , "E")->get()->toArray();
        //$uni = Universite::all();

        $data_array[] = array(
            'prenom ', 'nom', 'email', 'ville', 'type_bourse', 'cin', 'date_naissance', 'telephone', 'etablissement', 'filiere_bac',
            'situation_pere', 'situation_mere', 'note_premierbac', 'note_examreg', 'annee_inscription', 'pays',   'Universite',  'Domaine', 'Filiere'
        );
        foreach ($data as  $d) {
             dd($d->universite);
            $data_array[] = array(

                'prenom' =>  $d->user->prenom,
                'nom' =>  $d->user->nom,
                'email' =>  $d->user->email,
                'ville' =>  $d->user->ville,
                'type_bourse' =>  $d->type_bourse,
                'cin' =>  $d->cin,
                'date_naissance' =>  $d->date_naissance,
                'telephone' =>  $d->telephone,
                'etablissement' =>  $d->etablissement,
                'filiere_bac' =>  $d->filiere_bac,
                'situation_pere' =>  $d->situation_pere,
                'situation_mere' =>  $d->situation_mere,
                'note_premierbac' =>  $d->note_premierbac,
                'note_examreg' =>  $d->note_examreg,
                'annee_inscription' =>  $d->annee_inscription,
                'pays' =>  $d->pays,
                'Universite' =>  $d->universite->nom_universite,
                'Domaine' =>  $d->domaine->nom_domaine,
                'Filiere' =>  $d->filiere->nom_filiere,


            );
        }

        Excel::create('Liste_Etudiant_E',  function ($excel)
        use ($data_array) {
            $excel->setTitle('Liste_Etudiant_E');
            $excel->sheet('Liste_Etudiant_E',  function ($sheet) use ($data_array) {
                $sheet->fromArray($data_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    public function exportinterne(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $data = Inscriptioninterne::where('type_inscription', '=', "M")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->get();


        //$data = Inscriptioninterne::where('type_inscription', "=" , "M")->get();
        //$data  = DB::table('inscriptions')->where('type_inscription', "=" , "M")->get()->toArray();
        //$uni = Universite::all();

        $data_array[] = array(
            'prenom ', 'nom', 'email', 'ville', 'type_bourse', 'cin', 'date_naissance', 'telephone', 'etablissement', 'filiere_bac',
            'situation_pere', 'situation_mere', 'note_premierbac', 'note_examreg', 'annee_inscription', 'Academie', 'Direction', 'Universite',  'Domaine', 'Filiere'
        );
        foreach ($data as  $d) {
            //dd( $d->filiere->nom_filiere );
            $data_array[] = array(


                'prenom' =>  $d->user->prenom,
                'nom' =>  $d->user->nom,
                'email' =>  $d->user->email,
                'ville' =>  $d->user->ville,
                'type_bourse' =>  $d->type_bourse,
                'cin' =>  $d->cin,
                'date_naissance' =>  $d->date_naissance,
                'telephone' =>  $d->telephone,
                'etablissement' =>  $d->etablissement,
                'filiere_bac' =>  $d->filiere_bac,
                'situation_pere' =>  $d->situation_pere,
                'situation_mere' =>  $d->situation_mere,
                'note_premierbac' =>  $d->note_premierbac,
                'note_examreg' =>  $d->note_examreg,
                'annee_inscription' =>  $d->annee_inscription,
                //'pays' =>  $d->pays,
                'Academie' =>  $d->aref->nom_aref,
                'Direction' =>  $d->direction->nom_direction,
                'Universite' =>  $d->universite->nom_universite,
                'Domaine' =>  $d->domaine->nom_domaine,
                'Filiere' =>  $d->filiere->nom_filiere,

            );
        }

        Excel::create('Liste_Etudiant_M',  function ($excel)
        use ($data_array) {
            $excel->setTitle('Liste_Etudiant_M');
            $excel->sheet('Liste_Etudiant_M',  function ($sheet) use ($data_array) {
                $sheet->fromArray($data_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    public function etudiantinterne()
    {

        $ins = Inscriptioninterne::where('type_inscription', "=", "M")->paginate(50);
        return view("admin.liste_etudiantinterne", compact("ins"));

        // return view('liste_etudiantinterne')->with('ins', Inscriptioninterne::all());
    }

    public function etudiantexterne()
    {

         //dd($sui);

        $ex = Inscriptioninterne::where('type_inscription', "=", "E")->paginate(50);
        return view("admin.liste_etudiantexterne", compact("ex"));

        //return view('liste_etudiantexterne')->with('ex', Inscriptionexterne::all());

    }

    public function inscription_m()
    {

        $m = InscriptionInterne::where("type_inscription", "=", "M")->get();

        return view("admin.gestion", compact("m"));

        // return view('liste_etudiantinterne')->with('ins', Inscriptioninterne::all());
    }

    public function plusuniversiteuemf()
    {

        return view('bourses.plusuniversiteuemf');
    }

    public function bourse_solidarite()
    {

        return view('bourses.bourse_solidarite');
    }

    public function bourse_afrique()
    {

        return view('bourses.bourse_afrique');
    }

    public function bourse_merite()
    {

        return view('bourses.bourse_merite');
    }

    public function bourse_excellence()
    {

        return view('bourses.bourse_excellence');
    }

    public function internesearch(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $filtrerinterne = Inscriptioninterne::where('type_inscription', '=', "M")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->paginate(10);

        if ($filtrerinterne->count()) {

            return view('admin.liste_etudiantinterne')->with([
                'ins' => $filtrerinterne
            ]);
        } else {
            return redirect('/liste_etudiant_interne')->with(['status' => 'Votre recherche indisponible, réessayer à nouveau']);
        }
    }

    public function externesearch(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $filtrerexterne = Inscriptioninterne::where('type_inscription', '=', "E")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->paginate(10);

        /* dd( $filtrerexterne ); */

        if ($filtrerexterne->count()) {

            /* dd( $filtrerexterne ); */

            $ex = $filtrerexterne;

            return view('admin.liste_etudiantexterne', compact("ex"));
        } else {

            return redirect('/liste_etudiant_externe')->with([
                'status' => 'Votre recherche indisponible, réessayer à nouveau'
            ]);
        }
    }


    public function exportfinaleexterne(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $data = Inscriptioninterne::where('type_inscription', '=', "E")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->get();

        // $data = Inscriptioninterne::where('type_inscription', "=" , "E")->get();
        //$data  = DB::table('inscriptions')->where('type_inscription', "=" , "E")->get()->toArray();
        //$uni = Universite::all();

        $data_array[] = array(
            'prenom ', 'nom', 'email', 'ville', 'type_bourse', 'cin', 'date_naissance', 'telephone', 'etablissement', 'filiere_bac',
            'situation_pere', 'situation_mere', 'note_premierbac', 'note_examreg', 'annee_inscription', 'pays',   'Universite',  'Domaine', 'Filiere','note_bac'
        );
        foreach ($data as  $d) {
             //dd($d->universite);
            $data_array[] = array(

                'prenom' =>  $d->user->prenom,
                'nom' =>  $d->user->nom,
                'email' =>  $d->user->email,
                'ville' =>  $d->user->ville,
                'type_bourse' =>  $d->type_bourse,
                'cin' =>  $d->cin,
                'date_naissance' =>  $d->date_naissance,
                'telephone' =>  $d->telephone,
                'etablissement' =>  $d->etablissement,
                'filiere_bac' =>  $d->filiere_bac,
                'situation_pere' =>  $d->situation_pere,
                'situation_mere' =>  $d->situation_mere,
                'note_premierbac' =>  $d->note_premierbac,
                'note_examreg' =>  $d->note_examreg,
                'annee_inscription' =>  $d->annee_inscription,
                'pays' =>  $d->pays,
                'Universite' =>  $d->universite->nom_universite,
                'Domaine' =>  $d->domaine->nom_domaine,
                'Filiere' =>  $d->filiere->nom_filiere,
                'Bac generale' =>  $d->suite->note_bac,


            );
        }

        Excel::create('Liste_Etudiant_E',  function ($excel)
        use ($data_array) {
            $excel->setTitle('Liste_Etudiant_E');
            $excel->sheet('Liste_Etudiant_E',  function ($sheet) use ($data_array) {
                $sheet->fromArray($data_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }


    public function exportfinaleinterne(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }


        $data = Inscriptioninterne::where('type_inscription', '=', "M")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->get();


        //$data = Inscriptioninterne::where('type_inscription', "=" , "M")->get();
        //$data  = DB::table('inscriptions')->where('type_inscription', "=" , "M")->get()->toArray();
        //$uni = Universite::all();

        $data_array[] = array(
            'prenom ', 'nom', 'email', 'ville', 'type_bourse', 'cin', 'date_naissance', 'telephone', 'etablissement', 'filiere_bac',
            'situation_pere', 'situation_mere', 'note_premierbac', 'note_examreg','note_bac', 'annee_inscription', 'Academie', 'Direction', 'Universite',  'Domaine', 'Filiere'
        );
        foreach ($data as  $d) {
            //dd( $d->filiere->nom_filiere );
            $data_array[] = array(


                'prenom' =>  $d->user->prenom,
                'nom' =>  $d->user->nom,
                'email' =>  $d->user->email,
                'ville' =>  $d->user->ville,
                'type_bourse' =>  $d->type_bourse,
                'cin' =>  $d->cin,
                'date_naissance' =>  $d->date_naissance,
                'telephone' =>  $d->telephone,
                'etablissement' =>  $d->etablissement,
                'filiere_bac' =>  $d->filiere_bac,
                'situation_pere' =>  $d->situation_pere,
                'situation_mere' =>  $d->situation_mere,
                'note_premierbac' =>  $d->note_premierbac,
                'note_examreg' =>  $d->note_examreg,
                'note_bac' =>  $d->suite->note_bac,
                'annee_inscription' =>  $d->annee_inscription,
                //'pays' =>  $d->pays,
                'Academie' =>  $d->aref->nom_aref,
                'Direction' =>  $d->direction->nom_direction,
                'Universite' =>  $d->universite->nom_universite,
                'Domaine' =>  $d->domaine->nom_domaine,
                'Filiere' =>  $d->filiere->nom_filiere,

            );
        }

        Excel::create('Liste_Etudiant_M',  function ($excel)
        use ($data_array) {
            $excel->setTitle('Liste_Etudiant_M');
            $excel->sheet('Liste_Etudiant_M',  function ($sheet) use ($data_array) {
                $sheet->fromArray($data_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    public function externe_search_final(Request $request)
    {


        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $request->validate(['note_bac1'  => '']);
        $request->validate(['note_bac2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        $note_bac1 = $request->note_bac1;
        $note_bac2 = $request->note_bac2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }

        if (!$note_bac1) {
            $note_bac1 = 0;
        }
        if (!$note_bac2) {
            $note_bac2 = 20;
        }

        /* $filtrerexterne = DB::table('inscriptionsuite') */
        $filtrerexternesuite = DB::table('inscriptionsuite')
            ->join('inscriptions', 'inscriptions.id', '=', 'inscriptionsuite.id_inscriptions_fk')
            ->join('users' , 'users.id', '=' , 'inscriptions.id_user_fk')
            ->join('universites' , 'universites.id', '=' , 'inscriptions.id_universite_fk')
            ->join('domaines' , 'domaines.id', '=' , 'inscriptions.id_domaine_fk')
            ->join('filieres' , 'filieres.id', '=' , 'inscriptions.id_filiere_fk')
            ->where('type_inscription', '=', "E")
            ->where('cin', 'like', '%' . $cin . '%')
            ->where('telephone', 'like', '%' . $telephone . '%')
            ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
            ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
            ->whereBetween('note_bac', array([$note_bac1, $note_bac2]))
            ->paginate(10);

        if ($filtrerexternesuite->count()) {

             //dd( $request->ext );

            $ext = $filtrerexternesuite;

            return view('etapefinale.finale_externe', compact('ext'));/* admin.liste_etudiantexterne */
        } else {

            return redirect('/liste_finale_externe')->with([
                'status' => 'Votre recherche indisponible, réessayer à nouveau'
            ]);
        }
    }

    public function interne_search_final(Request $request)
    {

        $request->validate(['cin'  => '']);
        $request->validate(['telephone'  => '']);

        $request->validate(['note_premierbac1'  => '']);
        $request->validate(['note_premierbac2'  => '']);

        $request->validate(['note_regionale1'  => '']);
        $request->validate(['note_regionale2'  => '']);

        $request->validate(['note_bac1'  => '']);
        $request->validate(['note_bac2'  => '']);

        $cin = $request->cin;
        $telephone = $request->telephone;

        $note_premierbac1 = $request->note_premierbac1;
        $note_premierbac2 = $request->note_premierbac2;

        $note_regionale1 = $request->note_regionale1;
        $note_regionale2 = $request->note_regionale2;

        $note_bac1 = $request->note_bac1;
        $note_bac2 = $request->note_bac2;

        if (!$note_premierbac1) {
            $note_premierbac1 = 0;
        }
        if (!$note_premierbac2) {
            $note_premierbac2 = 20;
        }

        if (!$note_regionale1) {
            $note_regionale1 = 0;
        }
        if (!$note_regionale2) {
            $note_regionale2 = 20;
        }

        if (!$note_bac1) {
            $note_bac1 = 0;
        }
        if (!$note_bac2) {
            $note_bac2 = 20;
        }

        /* $filtrerexterne = DB::table('inscriptionsuite') */
        $filtrerinternesuite = DB::table('inscriptionsuite')

        ->join('inscriptions', 'inscriptions.id', '=', 'inscriptionsuite.id_inscriptions_fk')
        ->join('users' , 'users.id', '=' , 'inscriptions.id_user_fk')
        ->join('universites' , 'universites.id', '=' , 'inscriptions.id_universite_fk')
        ->join('domaines' , 'domaines.id', '=' , 'inscriptions.id_domaine_fk')
        ->join('filieres' , 'filieres.id', '=' , 'inscriptions.id_filiere_fk')
        ->join('arefs' , 'arefs.id' , '=' , 'inscriptions.id_aref_fk')
        ->join('directionprovinciales' , 'directionprovinciales.id' , '=' , 'inscriptions.id_direction_fk')
        ->select('inscriptions.*' , 'inscriptionsuite.*' , 'users.*' , 'universites.*' , 'arefs.*' , 'domaines.*' , 'filieres.*' , 'directionprovinciales.*')
        ->where('type_inscription', '=', "M")
        ->where('cin', 'like', '%' . $cin . '%')
        ->where('telephone', 'like', '%' . $telephone . '%')
        ->whereBetween('note_premierbac', array([$note_premierbac1, $note_premierbac2]))
        ->whereBetween('note_examreg', array([$note_regionale1, $note_regionale2]))
        ->whereBetween('note_bac', array([$note_bac1, $note_bac2]))
        ->paginate(10);

        if ($filtrerinternesuite->count()) {

             //dd( $request->ext );

            $in = $filtrerinternesuite;

            return view('etapefinale.finale_interne', compact('in'));/* admin.liste_etudiantexterne */
        } else {

            return redirect('/liste_finale_interne')->with([
                'status' => 'Votre recherche indisponible, réessayer à nouveau'
            ]);
        }
    }


}
