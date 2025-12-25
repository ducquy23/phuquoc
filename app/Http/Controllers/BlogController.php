<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request): Factory|View
    {
        $category = $request->get('category', 'all');
        $search = $request->get('search');
        $data = $this->blogService->getBlogIndexData($category, $search);

        return view('blog.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = $request->get('category', 'all');
        $search = $request->get('search');
        $data = $this->blogService->getBlogIndexData($category, $search);

        // Return JSON response with HTML content
        return response()->json([
            'featuredPostHtml' => $data['featuredPost'] ? view('blog.partials.featured-post', ['post' => $data['featuredPost']])->render() : '',
            'postsHtml' => view('blog.partials.posts-grid', ['posts' => $data['posts']])->render(),
            'paginationHtml' => $data['posts']->hasPages() ? view('blog.partials.pagination', ['posts' => $data['posts']])->render() : '',
            'currentCategory' => $data['currentCategory'],
            'searchQuery' => $data['searchQuery'],
        ]);
    }

    /**
     * @param string $slug
     * @return Factory|View
     */
    public function show(string $slug): Factory|View
    {
        $data = $this->blogService->getBlogShowData($slug);

        return view('blog.show', $data);
    }
}


