<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Article;
use App\Models\Book;
use App\Models\Consultant;
use App\Models\Course;
use App\Models\News;
use App\Models\Quotation;
use App\Models\Sample;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Contact;
use App\Models\Joining;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    use MediaUploadingTrait;
    public function index(){
        $about_us = AboutUs::first();
        $articles = Article::where('active',1)->orderBy('created_at','desc')->simplePaginate(8);
        $books = Book::where('active',1)->orderBy('created_at','desc')->simplePaginate(8);
        $samples = Sample::where('active',1)->orderBy('created_at','desc')->simplePaginate(8); 
        $consultants = Consultant::orderBy('created_at','desc')->simplePaginate(4); 
        $courses = Course::orderBy('created_at','desc')->simplePaginate(3);
        $news = News::orderBy('created_at','desc')->simplePaginate(3);
        $services = Service::all();
        return view('frontend.home',compact('about_us',
                                            'articles',
                                            'books',
                                            'samples',
                                            'consultants',
                                            'courses',
                                            'news',
                                            'services'));
    }

    public function quotations(Request $request){ 
        $quotation = Quotation::create($request->all());
        alert('تم بنجاح','تم أرسال طلبك إلي الأدارة وسوف يتم أرسال أيميل إلي '. $request->email .' بالعرض قريبا','success')->autoClose(false);
        return redirect()->route('frontend.home');
    }

    public function joining(Request $request){

        $joining = Joining::create($request->all());

        if ($request->input('cv', false)) {
            $joining->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $joining->id]);
        }

        alert('تم بنجاح','تم أرسال طلبك إلي الأدارة وسوف يتم أرسال أيميل إلي '. $request->email .' بالرد قريبا','success')->autoClose(false);

        return redirect()->route('frontend.home');
    }
    
    public function contact_us(Request $request){
        Contact::create($request->all()); 

        alert('تم بنجاح','تم أرسال طلبك إلي الأدارة وسوف يتم أرسال أيميل إلي '. $request->email .' بالرد قريبا','success')->autoClose(false);

        return redirect()->route('frontend.home');
    
    }
    
    public function storeCKEditorImages(Request $request)
    { 

        $model         = new Joining();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
