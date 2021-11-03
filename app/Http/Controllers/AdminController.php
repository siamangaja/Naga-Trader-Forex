<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use Auth;
use Hash;
use Route;
use App\Models\Admin;
use App\Models\User;
use App\Models\News;
use App\Models\Features;
use App\Models\Testimonials;
use App\Models\Prices;
use App\Models\Pages;
use App\Models\Partners;
use App\Models\Options;

class AdminController extends Controller
{

    public function dashboard () {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function profile () {
        $d = Admin::where('id', auth()->id())->first();
        $title = 'My Profile';
        return view('admin.profile', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function changePassword () {
        $id = auth()->id();
        $d = User::where('id', auth()->id())->first();
        $title = ' Change Password';
        return view('admin.change-password', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function savePassword (Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with("error","Your current password that you entered does not match...");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        return redirect()->back()->with("error","New password must not be the same as the current one....");
        }
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
            return redirect()->back()->with("error","Your new password that you entered does not match...");
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Your password has been changed successfully...");
    }

    public function userIndex () {
        $title = 'User Manager';
        $data = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function userEdit ($id)
    {
        $User = User::find($id);
        return response()->json([
          'data' => $User
        ]);
    }

    public function userUpdate (Request $request)
    {
        $update = User::where('id',$request->id)
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'status'    => $request->status,
            ]);
        return redirect ('admin/users')->with("success","Data updated successfully...");
    }

    public function userDelete (Request $request) {
        $Users = User::where('id', $request->id)->get();
        if (!$Users) {
            return redirect ('admin/users')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = User::where('id', $request->id)->delete();
            return redirect ('admin/users')->with("success","Data deleted successfully...");
        }
    }

    public function newsIndex () {
        $title = 'News';
        $data = News::orderBy('id', 'desc')->paginate(20);
        return view('admin.news-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function newsAdd () {
        $title = 'Add News';
        return view('admin.news-add', [
            'title' => $title,
        ]);
    }

    public function newsStore (Request $request) {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $file = $request->file('thumbnail');
        $imageName1 = time().'-'.$file->getClientOriginalName();
        $imageName2 = Str::lower($imageName1);
        $imageName3 = preg_replace('/\s+/', '', $imageName2);
        $img = $request->thumbnail->move(public_path('storage/images'), $imageName3);
        $slug = Str::lower($string = str_replace(' ', '-', $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

        $News = new News;
        $News->title        = $request->title;
        $News->slug         = $slug;
        $News->thumbnail    = $imageName3;
        $News->content      = $request->content;
        $News->status       = $request->status;
        $News->save();
        return redirect ('admin/news')->with("success","Data created successfully...");
    }


    public function newsEdit ($id) {
        $data = News::where('id',$id)->first();
        return view('admin.news-edit', [
            'data' => $data,
            'title' => 'Edit News',
        ]);
    }

    public function newsUpdate (Request $request)
    {
        $update = News::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'content'   => $request->content,
                //'thumbnail' => $request->thumbnail,
                'status'    => $request->status,
            ]);
        return redirect ('admin/news')->with("success","Data updated successfully...");
    }

    public function newsDelete (Request $request) {
        $News = News::where('id', $request->id)->get();
        if (!$News) {
            return redirect ('admin/news')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = News::where('id', $request->id)->delete();
            return redirect ('admin/news')->with("success","Data deleted successfully...");
        }
    }

    public function featuresIndex () {
        $title = 'Features';
        $data = Features::orderBy('id', 'desc')->paginate(20);
        return view('admin.features-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function featuresAdd () {
        $title = 'Add Features';
        return view('admin.features-add', [
            'title' => $title,
        ]);
    }

    public function featuresStore (Request $request) {
        $Features = new Features;
        $Features->icon     = $request->icon;
        $Features->title    = $request->title;
        $Features->content  = $request->content;
        $Features->save();
        return redirect ('admin/features')->with("success","Data created successfully...");
    }

    public function featuresEdit ($id) {
        $data = Features::where('id',$id)->first();
        return view('admin.features-edit', [
            'data' => $data,
            'title' => 'Edit Features',
        ]);
    }

    public function featuresUpdate (Request $request)
    {
        $update = Features::where('id',$request->id)
            ->update([
                'icon'      => $request->icon,
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        return redirect ('admin/features')->with("success","Data updated successfully...");
    }

    public function featuresDelete (Request $request) {
        $Features = Features::where('id', $request->id)->get();
        if (!$Features) {
            return redirect ('admin/features')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Features::where('id', $request->id)->delete();
            return redirect ('admin/features')->with("success","Data deleted successfully...");
        }
    }

    public function faqIndex () {
        $title = 'FAQ';
        $data = Faqs::orderBy('id', 'desc')->paginate(20);
        return view('admin.faq-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function faqAdd () {
        $title = 'Add FAQ';
        return view('admin.faq-add', [
            'title' => $title,
        ]);
    }

    public function faqStore (Request $request) {
        $Faqs = new Faqs;
        $Faqs->title    = $request->title;
        $Faqs->content  = $request->content;
        $Faqs->save();
        return redirect ('admin/faqs')->with("success","Data created successfully...");
    }

    public function faqEdit ($id) {
        $data = Faqs::where('id',$id)->first();
        return view('admin.faq-edit', [
            'data' => $data,
            'title' => 'Edit FAQ',
        ]);
    }

    public function faqUpdate (Request $request)
    {
        $update = Faqs::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        return redirect ('admin/faqs')->with("success","Data updated successfully...");
    }

    public function faqDelete (Request $request) {
        $Faqs = Faqs::where('id', $request->id)->get();
        if (!$Faqs) {
            return redirect ('admin/faqs')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Faqs::where('id', $request->id)->delete();
            return redirect ('admin/faqs')->with("success","Data deleted successfully...");
        }
    }

    public function testimonialsIndex () {
        $title = 'Testimonials';
        $data = Testimonials::orderBy('id', 'desc')->paginate(20);
        return view('admin.testimonial-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function testimonialsAdd () {
        $title = 'Add Testimonial';
        return view('admin.testimonial-add', [
            'title' => $title,
        ]);
    }

    public function testimonialsStore (Request $request) {
        $Testimonials = new Testimonials;
        $Testimonials->name     = $request->name;
        $Testimonials->company  = $request->company;
        $Testimonials->content  = $request->content;
        $Testimonials->save();
        return redirect ('admin/testimonials')->with("success","Data created successfully...");
    }

    public function testimonialsEdit ($id) {
        $data = Testimonials::where('id',$id)->first();
        return view('admin.testimonial-edit', [
            'data' => $data,
            'title' => 'Edit Testimonial',
        ]);
    }

    public function testimonialsUpdate (Request $request)
    {
        $update = Testimonials::where('id',$request->id)
            ->update([
                'name'      => $request->name,
                'company'   => $request->company,
                'content'   => $request->content,
            ]);
        return redirect ('admin/testimonials')->with("success","Data updated successfully...");
    }

    public function testimonialsDelete (Request $request) {
        $Testimonials = Testimonials::where('id', $request->id)->get();
        if (!$Testimonials) {
            return redirect ('admin/testimonials')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Testimonials::where('id', $request->id)->delete();
            return redirect ('admin/testimonials')->with("success","Data deleted successfully...");
        }
    }

    // public function teamIndex () {
    //     $title = 'Team';
    //     $data = Team::orderBy('id', 'desc')->paginate(20);
    //     return view('admin.team-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function teamAdd () {
    //     $title = 'Add Team';
    //     return view('admin.team-add', [
    //         'title' => $title,
    //     ]);
    // }

    // public function teamStore (Request $request) {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
    //     ]);
    //     $file = $request->file('image');
    //     $imageName1 = time().'-'.$file->getClientOriginalName();
    //     $imageName2 = Str::lower($imageName1);
    //     $imageName3 = preg_replace('/\s+/', '', $imageName2);
    //     $img = $request->image->move(public_path('storage/images'), $imageName3);

    //     $Team = new Team;
    //     $Team->name     = $request->name;
    //     $Team->position = $request->position;
    //     $Team->image    = $imageName3;
    //     $Team->save();
    //     return redirect ('admin/team')->with("success","Data created successfully...");
    // }

    // public function teamEdit ($id) {
    //     $data = Team::where('id',$id)->first();
    //     return view('admin.team-edit', [
    //         'data' => $data,
    //         'title' => 'Edit Team',
    //     ]);
    // }

    // public function teamUpdate (Request $request)
    // {
    //     $update = Team::where('id',$request->id)
    //         ->update([
    //             'name'      => $request->name,
    //             'position'  => $request->position,
    //             //'image'     => $request->image,
    //         ]);
    //     return redirect ('admin/team')->with("success","Data updated successfully...");
    // }

    // public function teamDelete (Request $request) {
    //     $Team = Team::where('id', $request->id)->get();
    //     if (!$Team) {
    //         return redirect ('admin/team')->with("error","Ups! Something wrong...");
    //     }
    //     else{
    //         $Delete = Team::where('id', $request->id)->delete();
    //         return redirect ('admin/team')->with("success","Data deleted successfully...");
    //     }
    // }

    public function priceIndex () {
        $title = 'Price';
        $data = Prices::orderBy('id', 'desc')->paginate(20);
        return view('admin.price-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function priceAdd () {
        $title = 'Add Price';
        return view('admin.price-add', [
            'title' => $title,
        ]);
    }

    public function priceStore (Request $request) {
        $Prices = new Prices;
        $Prices->title      = $request->title;
        $Prices->content    = $request->content;
        $Prices->price      = $request->price;
        $Prices->notes      = $request->notes;
        $Prices->button     = $request->button;
        $Prices->save();
        return redirect ('admin/price')->with("success","Data created successfully...");
    }

    public function priceEdit ($id) {
        $data = Prices::where('id',$id)->first();
        return view('admin.price-edit', [
            'data' => $data,
            'title' => 'Edit Price',
        ]);
    }

    public function priceUpdate (Request $request)
    {
        $update = Prices::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'price'     => $request->price,
                'notes'     => $request->notes,
                'button'    => $request->button,
            ]);
        return redirect ('admin/price')->with("success","Data updated successfully...");
    }

    public function priceDelete (Request $request) {
        $Prices = Prices::where('id', $request->id)->get();
        if (!$Prices) {
            return redirect ('admin/price')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Prices::where('id', $request->id)->delete();
            return redirect ('admin/price')->with("success","Data deleted successfully...");
        }
    }

    public function pagesIndex () {
        $title = 'Pages';
        $data = Pages::orderBy('id', 'desc')->paginate(20);
        return view('admin.page-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function pagesAdd () {
        $title = 'Add Page';
        return view('admin.page-add', [
            'title' => $title,
        ]);
    }

    public function pagesStore (Request $request) {
        $slug = Str::lower($string = str_replace(' ', '-', $request->title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $Pages = new Pages;
        $Pages->title       = $request->title;
        $Pages->slug        = $slug;
        $Pages->content     = $request->content;
        $Pages->save();
        return redirect ('admin/pages')->with("success","Data created successfully...");
    }

    public function pagesEdit ($id) {
        $data = Pages::where('id',$id)->first();
        return view('admin.page-edit', [
            'data' => $data,
            'title' => 'Edit Page',
        ]);
    }

    public function pagesUpdate (Request $request)
    {
        $update = Pages::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'content'   => $request->content,
            ]);
        return redirect ('admin/pages')->with("success","Data updated successfully...");
    }

    public function pagesDelete (Request $request) {
        $Pages = Pages::where('id', $request->id)->get();
        if (!$Pages) {
            return redirect ('admin/pages')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Pages::where('id', $request->id)->delete();
            return redirect ('admin/pages')->with("success","Data deleted successfully...");
        }
    }

    public function partnersIndex () {
        $title = 'Partners';
        $data = Partners::orderBy('id', 'desc')->paginate(20);
        return view('admin.partner-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function partnersAdd () {
        $title = 'Add Partner';
        return view('admin.partner-add', [
            'title' => $title,
        ]);
    }

    public function partnersStore (Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $file = $request->file('image');
        $imageName1 = time().'-'.$file->getClientOriginalName();
        $imageName2 = Str::lower($imageName1);
        $imageName3 = preg_replace('/\s+/', '', $imageName2);
        $img = $request->image->move(public_path('storage/images'), $imageName3);

        $Partners = new Partners;
        $Partners->title    = $request->title;
        $Partners->image    = $imageName3;
        $Partners->link     = $request->link;   
        $Partners->save();
        return redirect ('admin/partners')->with("success","Data created successfully...");
    }

    public function partnersEdit ($id) {
        $data = Partners::where('id',$id)->first();
        return view('admin.partner-edit', [
            'data' => $data,
            'title' => 'Edit Partner',
        ]);
    }

    public function partnersUpdate (Request $request)
    {
        $update = Partners::where('id',$request->id)
            ->update([
                'title'     => $request->title,
                //'image'   => $request->image,
                'link'      => $request->link,
            ]);
        return redirect ('admin/partners')->with("success","Data updated successfully...");
    }

    public function partnersDelete (Request $request) {
        $Partners = Partners::where('id', $request->id)->get();
        if (!$Partners) {
            return redirect ('admin/partners')->with("error","Ups! Something wrong...");
        }
        else{
            $Delete = Partners::where('id', $request->id)->delete();
            return redirect ('admin/partners')->with("success","Data deleted successfully...");
        }
    }

    public function optionsIndex () {
        $title = 'Options';
        $data = Options::orderBy('id', 'asc')->paginate(20);
        return view('admin.options-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function optionsEdit ($id) {
        $data = Options::where('id',$id)->first();
        return view('admin.options-edit', [
            'data' => $data,
            'title' => 'Edit Options',
        ]);
    }

    public function optionsUpdate (Request $request)
    {
        $update = Options::where('id',$request->id)
            ->update([
                'value' => $request->value,
            ]);
        return redirect ('admin/options')->with("success","Web Options updated successfully...");
    }

}