<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DNS2D;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($payload)
    {
      $utilisateurs = DB::select('select * from menu');
      $json_result = json_encode($request);
      return $json_result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store($payload)
    {
      /*

      $nom = $request->lastname;
      $prenom = $request->firstname;
      $phone = $request->phone;
      $email = $request->email;
      $sexe = $request->sexe;
      $password = $request->password;
      $hash = $this->hashSSHA($password);
      $encrypted_password = $hash["encrypted"]; // encrypted password
      $salt = $hash["salt"]; // salt
*/

      $now = \Carbon\Carbon::now();
      //$insert = DB::insert('insert into utilisateurs (nom, prenom, phone, email, sexe, date_ajout, date_modification, mdp, token) values(?,?,?,?,?,?,?,?,?)',[$nom, $prenom, $phone, $email, $sexe, $now, $now, $encrypted_password, $hash]);
      //echo 'L\'utilisateur a bien été enregistrée';
      //return $request->all();
      return "capp";

      /*if ($request->hasFile('imgUpload')) {
        if ($request->file('imgUpload')->isValid()) {
          $image = $request->imgUpload->store('menuPics');
        }
      }
      if($request->hasFile('imgUpload')) {
      DB::insert('insert into menu (id_restaurant, nom_restaurant, nom, categorie, composition, prix, date,  image) values(?,?,?,?,?,?,?,?)',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $now, $image]);
      echo 'Votre plat a bien été enregistrée';
    } else {
      echo 'Vous n\'avez envoyé aucune image';
    }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $qr_code = DNS2D::getBarcodePNG($id, "QRCODE");
      return $qr_code;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
