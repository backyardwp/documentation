@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">Backyard for WordPress</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">A modern way of building WordPress plugins.</h2>

            <p class="text-lg">Backyard is a modern framework designed to be a solid foundation <br class="hidden sm:block">for your WordPress plugins.</p>

            <div class="flex my-10">
				<a href="/docs/introduction" title="{{ $page->siteName }} getting started" class="bg-red-600 hover:bg-red-700 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>
				<a href="https://github.com/backyardwp" title="Github repository" class="bg-red-200 hover:bg-red-400 text-bg-red-700 font-normal hover:text-white rounded py-2 px-6">View on Github</a>
            </div>
        </div>

        <img src="/assets/img/logo.svg" style="width:30%" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 lg:mr-0">
    </div>

</section>
@endsection
