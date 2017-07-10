<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
  //
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $faqs = DB::select('select * from faq');
    return view('faq/viewFaq',['faqs'=>$faqs]);
  }
  public function all(){
    $faqs = DB::select('select * from faq');
    $json_result = json_encode($faqs);
    return $json_result;
  }

  public function create() {

    return view('faq/addQuestion');

  }

  public function store(Request $request)
  {

    $question = $request->input('question');
    $reponse = $request->input('reponse');
    $now = \Carbon\Carbon::now();
    DB::insert('insert into faq (question, reponse, date) values(?,?,?)',[$question, $reponse, $now]);
    echo 'Votre question a bien été enregistrée';

  }

   public function edit($id)
  {

      $faqs = DB::select('select * from faq where id = ?',[$id]);
      return view('faq/editQuestion',['faqs'=>$faqs]);

}
   public function delete($id)
{

   $delete = DB::delete('delete from faq where id = ?',[$id]);
   $faqs = DB::select('select * from faq');
   return view('faq/viewFaq',['faqs'=>$faqs]);

}
   public function update(Request $request)
  {

    $question = $request->input('question');
    $reponse = $request->input('reponse');
    $id = $request->input('id');

    DB::update('update faq set question = ?, reponse = ? where id = ?',[$question, $reponse, $id]);
    echo "La question a bien été mise à jour.<br/>";
    //$faqs = DB::select('select * from faq where id = ?',[$id]);
    //return view('faq/editQuestion',['faqs'=>$faqs]);


}

}
