<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.service');
    }

    public function singleServices()
    {
        return view('frontend.pages.single-services');
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function showContact()
    {
        return view('frontend.pages.contact');
    }

    public function singleBlog()
    {
        return view('frontend.pages.single-post');
    }

    public function caseStudies()
    {
        return view('frontend.pages.case-studies');
    }

    public function team()
    {
        return view('frontend.pages.team');
    }

    public function partnership()
    {
        return view('frontend.pages.partnership');
    }

    public function testimonials()
    {
        return view('frontend.pages.testimonial');
    }
}
