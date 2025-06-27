<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\EmailWithAttachment;
use App\Mail\SendEmail;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Career;
use App\Models\CareerFile;
use App\Models\CareerRegistration;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\OptionPage;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mf2;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $articles = Article::ByActive()->orderBy('created_at', 'DESC')->take(3)->get();
        $contents  = OptionPage::ByActive()->ByPage('home')->get();
        $bannerTop = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'home')->where('position', 'top')->get();
        $bannerBottom = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'home')->where('position', 'bottom')->get();

        return view('pages.public.home')->with(
            [
                'contents' => $contents,
                'articles' => $articles,
                'bannerTop'  => $bannerTop,
                'bannerBottom' => $bannerBottom
            ]
        );
    }

    public function pageCompany(Request $request)
    {
        $contents  = OptionPage::ByActive()->ByPage('company')->get()->toArray();
        $contents = array_column($contents, null, 'key');
        $bannerTop  = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'company')->where('position', 'top')->get();
        $bannerBottom  = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'company')->where('position', 'bottom')->get();
        return view('pages.public.company', compact('bannerTop', 'bannerBottom', 'contents'));
    }

    public function pageProduct(Request $request)
    {
        return view('pages.public.product');
    }

    public function pageProductCategory(Request $request, $slug)
    {
        $productCategory = ProductCategory::with('product')->where('slug', $slug)->first();
        return view('pages.public.product-category', compact('productCategory'));
    }

    public function pagePartnership(Request $request)
    {
        $contents  = OptionPage::ByActive()->ByPage('partnership')->get()->toArray();
        $contents = array_column($contents, null, 'key');
        $bannerTop  = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'partnership')->where('position', 'top')->get();
        $bannerBottom  = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'partnership')->where('position', 'bottom')->get();
        return view('pages.public.partnership', compact('bannerTop', 'bannerBottom', 'contents'));
    }

    public function pageCareer(Request $request)
    {
        $contents  = OptionPage::ByActive()->ByPage('career')->get()->toArray();
        $contents = array_column($contents, null, 'key');
        $bannerTop  = Banner::ByActive()->orderBy('created_at', 'DESC')->where('page', 'career')->where('position', 'top')->get();
        $careers = Career::byActive()->orderBy('created_at', 'DESC')->get();
        return view('pages.public.career', compact('careers', 'bannerTop', 'contents'));
    }

    public function pageCareerDetail(Request $request, $slug)
    {
        $contents  = OptionPage::ByActive()->ByPage('career')->get()->toArray();
        $contents = array_column($contents, null, 'key');
        $career = Career::with('category')->where('slug', $slug)->first();
        return view('pages.public.career-detail', compact('career', 'contents'));
    }

    public function pageArticle(Request $request)
    {
        $article = Article::ByActive();
        if ($request->ajax()) {

            if ($request->search) {
                $article = $article->where('title', 'like', '%' . $request->search . '%');
            }

            $articles = $article->paginate(3);
            return view('pages.public.includes.article-list', compact('articles'));
        }

        $articlePopuler = $article->limit(5)->get();
        return view('pages.public.article', compact('articlePopuler'));
    }

    public function pageArticleDetail(Request $request, $slug)
    {
        $article = article::with(['category', 'tag'])->where('slug', $slug)->first();
        return view('pages.public.article-detail', compact('article'));
    }

    public function postContactUs(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            // 'name'      => ['required', 'string', 'min:3'],
            // 'email'     => ['required', 'email'],
            'phone'     => ['required'],
            'message'   => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'data'      => $validator->errors()
            ]);
        }

        $contactUs = ContactUs::create($data);
        $contact   = Contact::where('status', 1)->whereNull('type')->first();

        $data = [
            'name'          => null,
            'email'         => null,
            'phone'         => $contactUs->phone,
            'address'       => null,
            'message'       => $contactUs->message,
            'subject'       => 'FAQ' . '_' . $contactUs->name . '_' . $contactUs->phone
        ];

        Mail::to($contact->email)->send(new SendEmail($data));

        return response()->json([
            'status'    => true,
            'message'   => 'Success',
            'data'      => $contactUs,
        ]);
    }

    public function postCareer(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'phone'     => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'name'      => 'required',
            'file'      => 'required|array',
            'file.*'    => 'required|max:2048',
            'file.foto' => 'required|mimes:jpeg,png,jpg',
            'file.resume'  => 'required|mimes:pdf',
        ], [
            'phone.required'        => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.phone')]),
            'email.required'        => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.email')]),
            'address.required'      => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.address')]),
            'name.required'         => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.name')]),
            'file.foto.required'    => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.foto')]),
            'file.resume.required'  => Lang::get('validation.required', ['attribute' => Lang::get('validation.attributes.resume')]),
            'file.foto.mimes'    => Lang::get('validation.mimes', ['attribute' => Lang::get('validation.attributes.foto'), 'values' => 'jpeg,png,jpg!']),
            'file.resume.mimes'  => Lang::get('validation.mimes', ['attribute' => Lang::get('validation.attributes.resume'), 'values' => 'pdf']),
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }

        $dataRegist = [
            'career_id' => $data['career_id'],
            'phone'     => $data['phone'],
            'email'     => $data['email'],
            'name'      => $data['name'],
            'address'   => $data['address'],
        ];
        $regist = CareerRegistration::create($dataRegist);

        if (!file_exists(public_path('/files'))) {
            mkdir(public_path('/files'), 0755, true);
        }

        $insertFile = [];
        foreach ($data['file'] as $type => $file) {
            $file = $request->file('file.' . $type);
            $ext = $file->getClientOriginalExtension();
            $type = trim($type, "'");

            $newName = date('Y-m-d-His-') . $type . "-by-" . strtolower(str_replace(" ", "-", $data['name'])) . "-phone-" . $data['phone'] . "." . $ext;
            $file->move('files', $newName);

            $insertFile[] = [
                'career_id'                 => $data['career_id'],
                'career_registration_id'    => $regist->id,
                'file'                      => 'files/' . $newName,
                'type'                      => $type
            ];
        }

        $careerFile = CareerFile::insert($insertFile);

        // Send email
        $careerRegist = CareerRegistration::with(['files', 'career'])->find($regist->id);
        $files = CareerFile::where('career_registration_id', $regist->id)->pluck('file');
        $data = [
            'name'          => $careerRegist->name,
            'email'         => $careerRegist->email,
            'phone'         => $careerRegist->phone,
            'address'       => $careerRegist->address,
            'attachments'   => $files,
            'message'       => null,
            'subject'       => $careerRegist->career->title . '_' . $careerRegist->name
        ];

        $contact   = Contact::where('status', 1)->where('type', 'career')->first() ?? Contact::where('status', 1)->first();

        // Send mail
        Mail::to($contact->email)->send(new EmailWithAttachment($data));

        return response()->json([
            'status'    => true,
            'message'   => 'Success',
            'data'      => $regist,
        ]);
    }

    public function pagePagesCustome($slug)
    {
        $page = Page::BySlug($slug)->with(['section.column'])->first();
        return view('pages.public.page', compact('page'));
    }
}
