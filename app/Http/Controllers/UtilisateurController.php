<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DNS2D;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class UtilisateurController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){
    $utilisateurs = DB::select('select * from utilisateurs ');
    return view('utilisateurs/viewUtilisateur',['utilisateurs'=>$utilisateurs ]);
  }

  public function all(){
    $restaurants = DB::select('select * from restaurant');
    $json_result = json_encode($restaurants);
    return $json_result;
  }

  public function create() {
    $restaurants = DB::select('select * from restaurant');
    $categories = DB::select('select * from categorie_menu');
    return view('menu/addmenu',['restaurants'=>$restaurants,'categories'=>$categories]);

  }

  public function store(Request $request)
  {

    $restaurant = DB::select('select * from restaurant where id = ?',[$request->input('restaurant')]);
    foreach ($restaurant as $rest) {
      $nom_restaurant = $rest->nom;
    }
    $id_restaurant = $request->input('restaurant');
    $nom = $request->input('nom');
    $categorie = $request->input('categorie');
    $composition = $request->input('composition');
    $prix = $request->input('prix');
    
    if ($request->hasFile('imgUpload')) {
      if ($request->file('imgUpload')->isValid()) {
        $image = $request->imgUpload->store('menuPics');
      }
    }
    $now = \Carbon\Carbon::now();
    if($request->hasFile('imgUpload')) {
    DB::insert('insert into menu (id_restaurant, nom_restaurant, nom, categorie, composition, prix, date,  image) values(?,?,?,?,?,?,?,?)',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $now, $image]);
    echo 'Votre plat a bien été enregistrée';
  } else {
    echo 'Vous n\'avez envoyé aucune image';
  }

  }

   public function edit($id)
  {

      $utilisateur = DB::select('select * from utilisateurs where id = ?',[$id]);
      //$restaurants = DB::select('select * from restaurant');
      //$categories = DB::select('select * from categorie_menu');

      //return view('menu/editmenu',['menus'=>$menus,'restaurants'=>$restaurants,'categories'=>$categories]);
      return view('utilisateurs/editUtilisateur',['utilisateur'=>$utilisateur]);

}
   public function delete($id)
{
$utilisateur = DB::select('select * from utilisateurs where id = ?',[$id]);
foreach ($utilisateur as $util) {
  $image = $util->avatar;
}
if($image!=null || $image !="") {
  $delete_image = Storage::delete($image);
}

   $delete = DB::delete('delete from utilisateurs where id = ?',[$id]);
   $utilisateurs = DB::select('select * from utilisateurs');
   return view('utilisateurs/viewUtilisateur',['utilisateurs'=>$utilisateurs]);

}
   public function update(Request $request)
  {
    $restaurant = DB::select('select * from restaurant where id = ?',[$request->input('restaurant')]);
    foreach ($restaurant as $rest) {
      $nom_restaurant = $rest->nom;
    }
    $id_restaurant = $request->input('restaurant');
    $nom = $request->input('nom');
    $categorie = $request->input('categorie');
    $composition = $request->input('composition');
    $prix = $request->input('prix');
    $image_save = $request->input('imgUploadSave');
    if ($request->hasFile('imgUpload')) {
      if ($request->file('imgUpload')->isValid()) {
        $image = $request->imgUpload->store('restaurantPics');
      }
    }
    //$now = \Carbon\Carbon::now();
    $id = $request->input('id');

if($request->hasFile('imgUpload')){
    DB::update('update menu set id_restaurant = ?, nom_restaurant = ?, nom = ?, categorie = ?, composition = ?, prix = ?,  image = ? where id = ?',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $image, $id]);
    echo "Le plat a bien été mise à jour.";
    //$faqs = DB::select('select * from faq where id = ?',[$id]);
    //return view('faq/editQuestion',['faqs'=>$faqs]);
  } else {

    DB::update('update menu set id_restaurant = ?, nom_restaurant = ?, nom = ?, categorie = ?, composition = ?, prix = ?,  image = ? where id = ?',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $image_save, $id]);
    echo "Le plat a bien été mise à jour.";

  }


}
}
