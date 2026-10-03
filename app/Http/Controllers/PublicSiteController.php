<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Director;
use App\Models\Product;

class PublicSiteController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'products' => Product::where('is_published', true)->latest()->take(2)->get(),
            'articles' => Article::where('is_published', true)->latest('published_at')->take(3)->get(),
            'directors' => Director::orderBy('sort_order')->orderBy('name')->take(4)->get(),
        ]);
    }

    public function about()
    {
        return view('public.about');
    }

    public function visionMission()
    {
        return view('public.vision-mission');
    }

    public function products()
    {
        return view('public.products.index', [
            'products' => Product::where('is_published', true)->latest()->paginate(9),
        ]);
    }

    public function directors()
    {
        return view('public.directors.index', [
            'directors' => Director::orderBy('sort_order')->orderBy('name')->paginate(12),
        ]);
    }

    public function articles()
    {
        return view('public.articles.index', [
            'articles' => Article::where('is_published', true)->latest('published_at')->paginate(9),
        ]);
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function product(Product $product)
    {
        abort_unless($product->is_published, 404);

        return view('public.products.show', [
            'product' => $product,
            'relatedProducts' => Product::where('is_published', true)
                ->whereKeyNot($product->id)->latest()->take(2)->get(),
        ]);
    }

    public function article(Article $article)
    {
        abort_unless($article->is_published, 404);

        return view('public.articles.show', [
            'article' => $article,
            'relatedArticles' => Article::where('is_published', true)
                ->whereKeyNot($article->id)->latest('published_at')->take(3)->get(),
        ]);
    }
}
