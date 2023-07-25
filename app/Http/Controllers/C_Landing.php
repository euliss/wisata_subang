<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;
use App\Models\M_News;
use DB;
use App;

class C_Landing extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
        $this->M_News = new M_News();
    }

    public function index()
    {
        $destination_filter = DB::table('destinations')
            ->select('destinations.*')
            ->selectRaw("sum(reports.count) as count")
            ->leftJoin('reports', "reports.id_destination", "=", "destinations.id")
            ->where('status', 1)
            ->groupBy('count')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->get();

        $data = [
            'heroTitle'     => 'Home',
            'destinations'   => $destination_filter,
            'categories'   => DB::table('categories')->where('status', 'Aktif')->limit(5)->get(),
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
            'articles'       => DB::table('articles')->limit(3)->get(),
        ];

        return view('landing/v_landing', $data);
    }

    public function about()
    {
        $data = [
            'heroTitle'     => 'Home',
            'destinations'   => DB::table('destinations')->where('status', 1)->get(),
            'categories'   => DB::table('categories')->where('status', 'Aktif')->get(),
            'articles'       => DB::table('articles')->get(),
        ];

        return view('landing/v_about', $data);
    }

    public function detail_about($id)
    {
        $data = [
            'heroTitle'     => 'Home',
            'destinations'   => DB::table('destinations')->where('status', 1)->get(),
            'categories'   => DB::table('categories')->where('status', 'Aktif')->get(),
            'articles'       => DB::table('articles')->where('id', $id)->first(),
        ];

        return view('landing/v_detail_about', $data);
    }

    public function category($id)
    {
        $destination_category = DB::table('destinations')
            ->where('status', 1)
            ->where('id_category', $id)
            ->get();

        $data = [
            'heroTitle'     => 'Kategori',
            'categories'   => DB::table('categories')->where('status', 'Aktif')->get(),
            'category'   => DB::table('categories')->where('id_categories', $id)->where('status', 'Aktif')->first(),
            'destinations'   => DB::table('destinations')->where('status', 1)->get(),
            'destination_category'   => $destination_category,
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_category', $data);
    }

    public function destination_search(Request $request)
    {
        $data = [
            'heroTitle'     => 'Landing Page',
            'categories'   => DB::table('categories')->where('status', 'Aktif')->get(),
            'destination'   => DB::table('destinations')->where('status', 1)->where('name', 'like', '%' . $request->name . '%')->get(),
            'destinations'   => DB::table('destinations')->where('status', 1)->get(),
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_destination_search', $data);
    }

    public function destination($id)
    {
        $data = [
            'heroTitle'     => 'Landing Page',
            'categories'   => DB::table('categories')->where('status', 'Aktif')->get(),
            'destinations'   => DB::table('destinations')->where('status', 1)->get(),
            'destination'   => DB::table('destinations')->where('status', 1)->where('id', $id)->first(),
            'recomend'   => DB::table('destinations')
                ->select('destinations.*')
                ->selectRaw("sum(reports.count) as count")
                ->leftJoin('reports', "reports.id_destination", "=", "destinations.id")
                ->where('status', 1)
                ->groupBy('count')
                ->orderBy('count', 'desc')
                ->limit(3)
                ->get(),
            'comments' => DB::table('comments')->where('id_destination', $id)->orderByDesc('id')->get(),
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_destination', $data);
    }

    public function productByCategories($id_categories)
    {
        $data = [
            'heroTitle'     => 'Product',
            'categories'    => $this->M_Categories->detail($id_categories),
        ];

        return view('landing/v_product', $data);
    }

    public function productDetail($id_product)
    {
        $data = [
            'heroTitle'     => 'Product',
        ];

        return view('landing/v_productDetail', $data);
    }

    public function news()
    {
        $data = [
            'heroTitle'     => 'News',
            'news' => $this->M_News->allDataAktif('Aktif')
        ];
        return view('landing/v_news', $data);
    }

    public function newsDetail($id_news)
    {
        if (!$this->M_News->detail($id_news)) {
            abort(404);
        }

        $data = [
            'heroTitle'     => 'News',
            'news' => $this->M_News->detail($id_news)
        ];

        return view('landing/v_newsDetail', $data);
    }

    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
}
