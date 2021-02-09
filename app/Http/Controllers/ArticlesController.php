<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $tag = request('tag');

        if ($tag) {
            $articles = Tag::where('name', $tag)->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('articles.create', ['tags'=> Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function store(Request $request)
    {
        $this->validateArticles();
        $article = new Article($request->all(['title', 'body', 'excerpt']));

        $article->user_id = 1;
        $article->save();

        $article->tags()->attach($request->get('tags'));

        return redirect('/articles');
    }

    public function validateArticles(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags'=>'exists:tags,id'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View|Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View|Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return Application|Factory|View|Response
     */
    public function update(Request $request, Article $article)
    {
        Article::update($this->validateArticles());

        return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
