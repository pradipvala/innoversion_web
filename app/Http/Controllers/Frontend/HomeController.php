<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Services_1;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $services = Services_1::where('status', '1')->get();

        return view('frontend.pages.service', compact('services'));
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
        $countryCodes = Country::pluck('country_name', 'phonecode')->toArray();

        return view('frontend.pages.contact', compact('countryCodes'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            // Store contact
            $contact = new Contact;
            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->contact_email = $request->email;
            $contact->phone_number = $request->phone;
            $contact->company_name = $request->company_name ?? '';
            $contact->message = $request->message ?? '';
            $contact->country_code = $request->country_code;
            $contact->save();

            // Return JSON response for AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent successfully!',
                ], 200);
            }

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred. Please try again.',
                ], 500);
            }

            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
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
