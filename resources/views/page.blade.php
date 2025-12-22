@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title)

@section('metaDescription', $page->meta_description)

@section('content')
    <section class="pt-28 pb-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">
                {{ $page->title }}
            </h1>

            <article class="prose prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-200">
                {!! $page->body !!}
            </article>
        </div>
    </section>
@endsection


