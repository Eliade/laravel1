<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index',['totos' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nom = $request->get('nom');
        $slug = $request->get('slug');
        $extrait = $request->get('extrait');
        $contenu = $request->get('contenu');


        $monArticle = Article::create(['nom' => $nom,'slug'=>null,'extrait'=>$extrait,'contenu'=>$contenu]);

        return redirect()->action(
            'ArticleController@index'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',['article'=>$article]);
    }

    public function showBySlug($slug)
    {
        $article = Article::where('slug',$slug)->first();
        if(isset($article->id)){
            return view('articles.show',['article' => $article]);
        }

        else{
            return redirect()->action(
                'ArticleController@index'
            );
        }

        return view ('articles.show',['article'=>$article]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Article::findOrFail($id);
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Votre message a été édité!');
        return view('articles.edit',['article' => $article]);

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
        $nom = $request->get('nom');
        $slug = $request->get('slug');
        $extrait = $request->get('extrait');
        $contenu = $request->get('contenu');

        $article = Article::find($id);

        $article->setAttribute('nom',$nom);
        $article->setAttribute('slug',$slug);
        $article->setAttribute('extrait',$extrait);
        $article->setAttribute('contenu',$contenu);
        $article->save();

        $articles = Article::all();
        return view('articles.index',['totos'=>$articles]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$request)
    {
        if($request->ajax()){

            dd('ajax');

        }
        else{
            $article = Article::find($id);
            $article->delete();
            Session::flash('alert-class', 'alert-danger');
            Session::flash('message', 'Votre article a été supprimé!');
            return redirect()->action(
                'ArticleController@index'
         );
        }
    }
}
