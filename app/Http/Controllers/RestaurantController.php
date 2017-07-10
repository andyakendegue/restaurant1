<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $restaurants = DB::select('select * from restaurant');
    return view('restaurant/viewRestaurant',['restaurants'=>$restaurants]);
  }

  public function all(){
    $restaurants = DB::select('select * from restaurant');
    $json_result = json_encode($restaurants);
    return $json_result;
  }

  public function create() {

    return view('restaurant/addRestaurant');

  }

  public function store(Request $request)
  {

    $nom = $request->input('nom');
    $categorie = $request->input('categorie');
    $phone = $request->input('phone');
    $email = $request->input('email');
    $site_web = $request->input('site_web');
    if ($request->hasFile('imgUpload')) {
      if ($request->file('imgUpload')->isValid()) {
        $image = $request->imgUpload->store('restaurantPics');
      }
    }
    $now = \Carbon\Carbon::now();
    if($request->hasFile('imgUpload')) {
    DB::insert('insert into restaurant (nom, categorie, phone, email, site_web, date, image) values(?,?,?,?,?,?,?)',[$nom, $categorie, $phone, $email, $site_web, $now, $image]);
    echo 'Votre question a bien été enregistrée';
  } else {
    echo 'Vous n\'avez envoyé aucune image';
  }

  }

   public function edit($id)
  {

      $restaurants = DB::select('select * from restaurant where id = ?',[$id]);

      return view('restaurant/editRestaurant',['restaurants'=>$restaurants]);

}
   public function delete($id)
{
$restaurant = DB::select('select * from restaurant where id = ?',[$id]);
foreach ($restaurant as $rest) {
  $image = $rest->image;
}
$delete_image = Storage::delete($image);
   $delete = DB::delete('delete from restaurant where id = ?',[$id]);
   $restaurants = DB::select('select * from restaurant');
   return view('restaurant/viewRestaurant',['restaurants'=>$restaurants]);

}
   public function update(Request $request)
  {
    $nom = $request->input('nom');
    $categorie = $request->input('categorie');
    $phone = $request->input('phone');
    $email = $request->input('email');
    $site_web = $request->input('site_web');
    $image_save = $request->input('imgUploadSave');
    if ($request->hasFile('imgUpload')) {
      if ($request->file('imgUpload')->isValid()) {
        $image = $request->imgUpload->store('restaurantPics');
      }
    }
    //$now = \Carbon\Carbon::now();
    $id = $request->input('id');

if($request->hasFile('imgUpload')){
    DB::update('update restaurant set nom = ?, categorie = ?, phone = ?, email = ?, site_web = ?, image = ? where id = ?',[$nom, $categorie, $phone, $email, $site_web, $image, $id]);
    echo "La question a bien été mise à jour.<br/>";
    //$faqs = DB::select('select * from faq where id = ?',[$id]);
    //return view('faq/editQuestion',['faqs'=>$faqs]);
  } else {

    DB::update('update restaurant set nom = ?, categorie = ?, phone = ?, email = ?, site_web = ?, image = ? where id = ?',[$nom, $categorie, $phone, $email, $site_web, $image_save, $id]);
    echo "La question a bien été mise à jour.<br/>";

  }


}
}
