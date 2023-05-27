<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Categories;
use App\Models\M_Partner;
use App\Models\M_News;
use DB; 

class C_Landing extends Controller
{
    public function __construct()
    {
        $this->M_Categories = new M_Categories();
        $this->M_Partner = new M_Partner();
        $this->M_News = new M_News();
    }

    public function index()
    {
        $data = [
            'heroTitle'     => 'Home',
            'partner'       => $this->M_Partner->allData(),
            'destinations'   => DB::table('destinations')->where('status',1)->get() ,
            'categories'   => DB::table('categories')->get() ,
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_landing', $data);
    }

    public function about()
    {
        $data = [
            'heroTitle'     => 'Home',
            'partner'       => $this->M_Partner->allData(),
            'destinations'   => DB::table('destinations')->where('status',1)->get() ,
            'categories'   => DB::table('categories')->get() ,
            'articles'       => DB::table('articles')->get(),
        ];

        return view('landing/v_about', $data);
    }

    public function category($id)
    {
        $data = [
            'heroTitle'     => 'Kategori',
            'categories'   => DB::table('categories')->get() ,
            'category'   => DB::table('categories')->where('id_categories', $id)->first() ,
            'partner'       => $this->M_Partner->allData(),
            'destinations'   => DB::table('destinations')->where('status',1)->get() ,
            'destination_category'   => DB::table('destinations')->where('status',1)->where('id_category', $id)->get() ,
            'news'       => $this->M_News->getLimit(3, 'Aktif'),
        ];

        return view('landing/v_category', $data);
    }

    public function destination($id)
    {
        $data = [
            'heroTitle'     => 'Landing Page',
            'categories'   => DB::table('categories')->get() ,
            'partner'       => $this->M_Partner->allData(),
            'destinations'   => DB::table('destinations')->where('status',1)->get() ,
            'destination'   => DB::table('destinations')->where('status',1)->where('id',$id)->first() ,
            'comments'        => DB::table('comments')->where('id_destination',$id)->get() ,
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
}
