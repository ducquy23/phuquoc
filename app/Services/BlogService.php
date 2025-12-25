<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogService
{
    /**
     * Get published posts with optional category filter and search
     *
     * @param string|null $category
     * @param string|null $search
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPublishedPosts(?string $category = null, ?string $search = null, int $perPage = 9): LengthAwarePaginator
    {
        $query = Post::query()
            ->where('is_published', true)
            ->with('author')
            ->orderBy('published_at', 'desc');

        // Filter by category if provided
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        // Search functionality
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        return $query->paginate($perPage);
    }

    /**
     * Get featured post
     *
     * @return Post|null
     */
    public function getFeaturedPost(): ?Post
    {
        return Post::where('is_published', true)
            ->where('is_featured', true)
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->first();
    }

    /**
     * Get posts excluding featured post
     *
     * @param string|null $category
     * @param Post|null $featuredPost
     * @param string|null $search
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPostsExcludingFeatured(?string $category = null, ?Post $featuredPost = null, ?string $search = null, int $perPage = 9): LengthAwarePaginator
    {
        $query = Post::query()
            ->where('is_published', true)
            ->with('author')
            ->orderBy('published_at', 'desc');

        // Filter by category if provided
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        // Search functionality
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        // Exclude featured post if exists
        if ($featuredPost) {
            $query->where('id', '!=', $featuredPost->id);
        }

        return $query->paginate($perPage);
    }

    /**
     * Get post by slug
     *
     * @param string $slug
     * @return Post
     * @throws ModelNotFoundException
     */
    public function getPostBySlug(string $slug): Post
    {
        return Post::where('slug', $slug)
            ->where('is_published', true)
            ->with('author')
            ->firstOrFail();
    }

    /**
     * Increment post views
     *
     * @param Post $post
     * @return void
     */
    public function incrementViews(Post $post): void
    {
        $post->increment('views');
    }

    /**
     * Get related posts by category
     *
     * @param Post $post
     * @param int $limit
     * @return Collection
     */
    public function getRelatedPosts(Post $post, int $limit = 3): Collection
    {
        return Post::where('is_published', true)
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get blog index data
     *
     * @param string|null $category
     * @param string|null $search
     * @return array
     */
    public function getBlogIndexData(?string $category = null, ?string $search = null): array
    {
        $featuredPost = $this->getFeaturedPost();
        $posts = $this->getPostsExcludingFeatured($category, $featuredPost, $search);

        return [
            'featuredPost' => $featuredPost,
            'posts' => $posts,
            'currentCategory' => $category ?? 'all',
            'searchQuery' => $search,
        ];
    }

    /**
     * Get blog show data
     *
     * @param string $slug
     * @return array
     */
    public function getBlogShowData(string $slug): array
    {
        $post = $this->getPostBySlug($slug);
        $this->incrementViews($post);
        $relatedPosts = $this->getRelatedPosts($post);

        return [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ];
    }
}
