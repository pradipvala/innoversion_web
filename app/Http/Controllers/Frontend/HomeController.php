<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\TechnologyHelper;
use App\Helpers\ServiceHelper;
use App\Helpers\IndustryHelper;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\Contact1;
use App\Models\Country;
use App\Models\Partner;
use App\Models\Services_1;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Projects;
use App\Models\Recruitment;
use App\Models\Recruitu;
use App\Models\Sletter;
use App\Models\TeamMember;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $services = Services_1::where('status', '1')->get();
        $clients = Client::where('status', '1')->get();
        $testimonials = Testimonial::where('status', '1')->get();
        return view('frontend.index', compact('services', 'clients', 'testimonials'));
    }

    public function about()
    {
        $abouts = AboutUs::where('status', '1')->get();

        return view('frontend.pages.about', compact('abouts'));
    }

    public function companyOverview()
    {
        return view('frontend.pages.company-overview');
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
        $blogs = Blogs::where('status', '1')->get();
        return view('frontend.pages.blog', compact('blogs'));
    }

    public function showContact()
    {
        return view('frontend.pages.contact');
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

            // Mail::to($request->email)->send(new ContactFormMail());

            // Return JSON response for AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent successfully!',
                ], 200);
            }

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred. Please try again.',
                ], 500);
            }

            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function submitNewsletter(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|max:255|unique:sletters,email',
            ]);

            $sletter = new Sletter();
            $sletter->email = $validated['email'];
            $sletter->status = '1';
            $sletter->save();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thanks for subscribing!'
                ], 200);
            }

            return redirect()->back()->with('newsletter_success', 'Thanks for subscribing!');
        } catch (ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first('email') ?: 'Please enter a valid email address.'
                ], 422);
            }

            return redirect()->back()->with('newsletter_error', $e->validator->errors()->first('email') ?: 'Please enter a valid email address.')->withInput();
        } catch (Exception $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong. Please try again.'
                ], 500);
            }

            return redirect()->back()->with('newsletter_error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function submitCompanyProfileDownload(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'countryCode' => 'required|string|max:10',
            'phone_number' => 'required|string|max:20',
        ]);

        try {
            (new Contact1())->saveContact($request);

            $details = [
                'name' => $request->first_name,
                'email' => $request->contact_email,
                'phone_number' => $request->phone_number,
                'contact_email' => $request->contact_email,
            ];

            // Mail::to($request->contact_email)->send(new ContactFormMail($details));

            return response()->json([
                'success' => true,
                'message' => 'Form submitted successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again.',
            ], 500);
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
        $teamMembers = TeamMember::where('status', '1')->get();
        return view('frontend.pages.team', compact('teamMembers'));
    }

    public function partnership()
    {
        $partners = Partner::where('status', '1')->get();

        return view('frontend.pages.partnership', compact('partners'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('status', '1')->get();

        return view('frontend.pages.testimonial', compact('testimonials'));
    }

    public function handle404()
    {
        return response()->view('frontend.pages.404', [], 404);
    }

    public function openPositions()
    {
        $openPositions = Recruitment::where('status', '1')->get();
        $countryCodes = Country::pluck('country_name', 'phonecode')->toArray();
        return view('frontend.pages.open-positions', compact('openPositions', 'countryCodes'));
    }

    public function submitRecruitmentApplication(Request $request)
    {
        $request->validate([
            'position_id' => 'required|exists:recruitments,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        try {
            $cvPath = null;
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('recruitments', 'public');
            }

            $application = new Recruitu();
            $application->recruitment_id = $request->position_id;
            $application->first_name = $request->first_name;
            $application->last_name = $request->last_name;
            $application->email = $request->email;
            $application->country_code = $request->country_code;
            $application->phone = $request->phone;
            $application->cv = $cvPath;
            $application->save();

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully!',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again.',
            ], 500);
        }
    }

    public function projects()
    {
        $projects = Projects::where('status', '1')->get();
        return view('frontend.pages.projects', compact('projects'));
    }

    public function termsAndConditions()
    {
        return view('frontend.pages.terms-and-conditions');
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function technologyDetails($slug)
    {
        $technologies = TechnologyHelper::all();

        if (!array_key_exists($slug, $technologies)) {
            abort(404);
        }

        $technology = $technologies[$slug];

        return view('frontend.pages.technology-details', compact('technology'));
    }

    public function serviceDetails($slug)
    {
        $services = ServiceHelper::all();

        if (!array_key_exists($slug, $services)) {
            abort(404);
        }

        $service = $services[$slug];

        return view('frontend.pages.service-details', compact('service'));
    }

    public function industryDetails($slug)
    {
        $industries = IndustryHelper::all();

        if (!array_key_exists($slug, $industries)) {
            abort(404);
        }

        $industry = $industries[$slug];

        return view('frontend.pages.industry-details', compact('industry'));
    }

    public function autoPulse()
    {
        return view('frontend.pages.auto-pulse');
    }
}
