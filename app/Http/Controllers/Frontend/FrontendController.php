<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


    public function aboutIndex()
    {
        return view('frontend/about');
    }

    // show All data in home page
    public function index()
    {
        $all_category = Category::where('status', '0')->get();
        $latest_posts = Post::where('status', '0')->orderBy('created_at', 'DESC')->get()->take('15');
        return view('frontend/index', compact('all_category', 'latest_posts'));
    }


    public function viewcategory(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend/post/index', compact('post', 'category'));
        } else {
            redirect('/');
        }
    }

    public function viewpost(string $category_slug, string $post_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            $latest_post = Post::where('category_id', $category->id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);
            return view('frontend/post/view', compact('post', 'latest_post'));
        } else {
            redirect('/')->with('message', 'Could not find this post');
        }
    }
}
