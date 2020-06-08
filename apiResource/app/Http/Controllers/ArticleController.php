<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get the articles
        $articles = Article::paginate(15);
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new articcle
        $article = new Article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->save();

        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //Get one article
            $article = Article::findOrFail($id);
        } catch(Exception $e) {
            return response()->json($e->getMessage());
        }
        return new ArticleResource($article);
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
        //Update the data
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body  = $request->input('body');
        $article->save();

        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the article
        $article = Article::find($id);
        $article->delete();

        return response()->json('Deleted the article..');
    }
}
