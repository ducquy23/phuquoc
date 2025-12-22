@extends('layouts.app')

@section('title', $page->meta_title ?: $page->title)

@section('metaDescription', $page->meta_description)

@section('content')
    @if($page->hero_image_url)
        <section class="relative min-h-[380px] w-full flex items-center justify-center bg-cover bg-center bg-no-repeat"
                 style="background-image: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.55)), url('{{ $page->hero_image_url }}');">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
                <h1 class="text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.02em]">
                    {{ $page->title }}
                </h1>
                @if($page->meta_description)
                    <p class="text-white/85 text-lg md:text-xl mt-4 max-w-2xl mx-auto">
                        {{ $page->meta_description }}
                    </p>
                @endif
            </div>
        </section>
    @else
        <section class="pt-28 pb-12 bg-background-light dark:bg-background-dark">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">
                    {{ $page->title }}
                </h1>
                @if($page->meta_description)
                    <p class="text-gray-500 dark:text-gray-300 mt-3">
                        {{ $page->meta_description }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    <section class="pb-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <article class="prose prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-200">
                {!! $page->body !!}
            </article>
        </div>
    </section>
@endsection


