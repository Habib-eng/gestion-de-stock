<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ligne_Commande;
use App\Models\LigneCommande;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ligne_commandes['lignes_commandes'] = LigneCommande::orderBy('id','desc')->paginate(4);
   
        return view('Ligne Commande/LigneCommande',$ligne_commandes); 
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $produit  =new LigneCommande();
        $produit->produit=$request->produit;
        $produit->pu=$request->pu;
        $produit->qte=$request->qte;
        $produit->mont_Ht=$request->mont_Ht;
        $produit->save();

    
        return response()->json(['success' => $produit]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $ligne_commandes  = LigneCommande::where($where)->first();
 
        return response()->json($ligne_commandes );
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $produit = LigneCommande::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}