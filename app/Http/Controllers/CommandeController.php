<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $commandes = DB::select('select * from commandes ');
      $restaurants = DB::select('select * from restaurant ');
      $utilisateurs = DB::select('select * from utilisateurs ');
      return view('commandes/viewCommandes',['commandes'=>$commandes, 'restaurants'=>$restaurants, 'utilisateurs'=>$utilisateurs ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $delete = DB::delete('delete from commandes where id = ?',[$id]);
      $commandes = DB::select('select * from commandes ');
      $restaurants = DB::select('select * from restaurant ');
      $utilisateurs = DB::select('select * from utilisateurs ');
      return view('commandes/viewCommandes',['commandes'=>$commandes, 'restaurants'=>$restaurants, 'utilisateurs'=>$utilisateurs ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

      $statut = $request->input('statut');
      $delai = $request->input('delai');



      $update = DB::update('update commandes set statut = ?, livraison = ? where id = ?',[$statut, $delai, $id]);
      $commandes = DB::select('select * from commandes ');
      $restaurants = DB::select('select * from restaurant ');
      $utilisateurs = DB::select('select * from utilisateurs ');
      return view('commandes/viewCommandes',['commandes'=>$commandes, 'restaurants'=>$restaurants, 'utilisateurs'=>$utilisateurs ]);

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


         $delete = DB::delete('delete from commandes where id = ?',[$id]);
         $commandes = DB::select('select * from commandes');
         return view('commandes/viewCommandes',['commandes'=>$commandes]);
    }
}
