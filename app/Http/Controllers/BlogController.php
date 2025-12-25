<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use App\Services\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Handle newsletter subscription
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function subscribe(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first('email'),
            ], 422);
        }

        $email = $request->input('email');

        // Check if already subscribed
        $existing = NewsletterSubscription::where('email', $email)
            ->where('status', 'active')
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already subscribed to our newsletter.',
            ], 422);
        }

        // If previously unsubscribed, reactivate
        $unsubscribed = NewsletterSubscription::where('email', $email)
            ->where('status', 'unsubscribed')
            ->first();

        if ($unsubscribed) {
            $unsubscribed->update([
                'status' => 'active',
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Welcome back! You have been resubscribed to our newsletter.',
            ]);
        }

        // Create new subscription
        NewsletterSubscription::create([
            'email' => $email,
            'status' => 'active',
            'subscribed_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'source' => 'blog',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing! You will receive our latest updates.',
        ]);
    }
}


