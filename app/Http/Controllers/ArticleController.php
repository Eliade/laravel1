<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

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

        $monArticle = new Article();
        $monArticle->setAttribute('nom',$nom);
        $monArticle->setAttribute('slug','');
        $monArticle->setAttribute('extrait',$extrait);
        $monArticle->setAttribute('contenu',$contenu);

        $monArticle->save();
        $articles = Article::all();

        return view('articles.index',['totos'=> $articles]);

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

        $article = Article::findOrFail($id);
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
    public function destroy($id)
    {
        //
    }
}
