<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $menus = DB::select('select * from menu');
    return view('menu/viewMenu',['menus'=>$menus]);
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
    if ($request->hasFile('imgUpload1')) {
      if ($request->file('imgUpload1')->isValid()) {
        $image1 = $request->imgUpload1->store('menuPics');
      }
    }
    if ($request->hasFile('imgUpload2')) {
      if ($request->file('imgUpload2')->isValid()) {
        $image2 = $request->imgUpload2->store('menuPics');
      }
    }
    if ($request->hasFile('imgUpload3')) {
      if ($request->file('imgUpload3')->isValid()) {
        $image3 = $request->imgUpload3->store('menuPics');
      }
    }
    $now = \Carbon\Carbon::now();
    if($request->hasFile('imgUpload')) {
    DB::insert('insert into menu (id_restaurant, nom_restaurant, nom, categorie, composition, prix, date,  image1,image2, image3) values(?,?,?,?,?,?,?,?)',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $now, $image1, $image2, $image3]);
    echo 'Votre plat a bien été enregistrée';
  } else {
    echo 'Vous n\'avez envoyé aucune image';
  }

  }

   public function edit($id)
  {

      $menus = DB::select('select * from menu where id = ?',[$id]);
      $restaurants = DB::select('select * from restaurant');
      $categories = DB::select('select * from categorie_menu');

      return view('menu/editmenu',['menus'=>$menus,'restaurants'=>$restaurants,'categories'=>$categories]);

}
   public function delete($id)
{
$menu = DB::select('select * from menu where id = ?',[$id]);
foreach ($menu as $men) {
  $image1 = $men->image1;
  $image2 = $men->image2;
  $image3 = $men->image3;
}
$delete_image1 = Storage::delete($image1);
$delete_image1 = Storage::delete($image1);
$delete_image1 = Storage::delete($image1);
   $delete = DB::delete('delete from menu where id = ?',[$id]);
   $restaurants = DB::select('select * from menu');
   return view('menu/viewMenu',['menus'=>$menus]);

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
    $image_save1 = $request->input('imgUploadSave1');
    if ($request->hasFile('imgUpload1')) {
      if ($request->file('imgUpload1')->isValid()) {
        $image1 = $request->imgUpload1->store('restaurantPics');
      }
    }
    $image_save2 = $request->input('imgUploadSave2');
    if ($request->hasFile('imgUpload2')) {
      if ($request->file('imgUpload2')->isValid()) {
        $image2 = $request->imgUpload2->store('restaurantPics');
      }
    }
    $image_save3 = $request->input('imgUploadSave3');
    if ($request->hasFile('imgUpload3')) {
      if ($request->file('imgUpload3')->isValid()) {
        $image3 = $request->imgUpload3->store('restaurantPics');
      }
    }
    //$now = \Carbon\Carbon::now();
    $id = $request->input('id');

if($request->hasFile('imgUpload')){
    DB::update('update menu set id_restaurant = ?, nom_restaurant = ?, nom = ?, categorie = ?, composition = ?, prix = ?,  image1 = ?,  image2 = ?,  image3 = ? where id = ?',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $image1,$image2,$image3, $id]);
    echo "Le plat a bien été mise à jour.";
    //$faqs = DB::select('select * from faq where id = ?',[$id]);
    //return view('faq/editQuestion',['faqs'=>$faqs]);
  } else {

    DB::update('update menu set id_restaurant = ?, nom_restaurant = ?, nom = ?, categorie = ?, composition = ?, prix = ?,  image1 = ?,  image2 = ?,  image3 = ? where id = ?',[$id_restaurant, $nom_restaurant, $nom, $categorie, $composition, $prix, $image_save1,$image_save2,$image_save3, $id]);
    echo "Le plat a bien été mise à jour.";

  }


}
}
