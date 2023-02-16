<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\User;
use App\Models\Seller;
use App\Models\Vendor;
use App\Models\Favorite;
use App\Models\Backend\Cart;
use App\Models\Backend\Logo;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Event;
use App\Models\Backend\Image;
use App\Models\Backend\Namad;
use App\Models\Backend\Reply;
use App\Models\Backend\Slider;
use App\Models\Backend\Social;
use App\Models\Backend\Product;
use App\Models\Backend\Service;
use App\Models\Backend\Support;
use App\Models\Backend\Category;
use App\Models\Backend\FooterItem;
use App\Models\Backend\FooterText;
use App\Models\Backend\HeaderItem;
use App\Models\Backend\homeBanner;
use App\Models\Backend\mainBanner;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Application;
use App\Http\Controllers\Controller;
use App\Models\Backend\FooterColumn;
use App\Models\Backend\marketBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\ProductComment;
use App\Models\Backend\ProductQuestion;

class ClientController extends Controller
{
   public function index()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $brand = Brand::where('status', '1')->paginate(10);
      $homeBanner = homeBanner::where('status', '1')->get();
      $slider = Slider::query()->orderBy('id', 'DESC')->where('status', '1')->where('position', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->get();
      $children_your_visit = Category::where('status', '1')->where('child_id', '!=', '0')->paginate(4);
      $products_your_visit = Product::where('status', '1')->orderBy('id', 'DESC')->paginate(4);
      $best_selling = Product::query()->where('status', '1')->where('position', '3')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $events = Event::query()->where('status', '1')->get();
      $support = Support::query()->where('status', '1')->get();

      return view('pages.index', compact('categories', 'parents', 'children', 'logo', 'social', 'brand',
      'homeBanner', 'slider', 'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application',
      'service', 'products', 'children_your_visit', 'products_your_visit', 'best_selling', 'totalCart', 'events',
      'support'));
   }


   public function best_selling(Product $product, Request $request)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $support = Support::query()->where('status', '1')->get();
      $best_selling = Product::query()->where('status', '1')->where('position', '3')->get();
      $productComment = ProductComment::query()->where('status', '1')->where('product_id', 'LIKE', $product->id)
      ->orderBy('id', 'DESC')->get();

      if ($request->get('category_id')) {
         $filter = $request->get('category_id');

         $best_selling = Product::query()->where('status', '1')->where('position', '3')
         ->where('category_id', $filter)->get();
      } 
      elseif ($request->get('category_id') === "?") 
      {
         $best_selling = Product::query()->where('status', '1')->where('position', '3')->get();
      }


      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }

      return view('pages.best-selling', compact('categories', 'parents', 'children', 'logo', 'social', 'homeBanner',
      'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service', 'best_selling'
      , 'totalCart', 'support', 'productComment'));
   }


   // public function promotion_center()
   // {
   //    $categories = Category::where('status', '1')->where('parent_id', '0')->get();
   //    $parents = Category::where('status', '1')->where('child_id', '0')->get();
   //    $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
   //    $logo = Logo::where('status', '1')->get();
   //    $social = Social::where('status', '1')->get();
   //    $homeBanner = homeBanner::where('status', '1')->get();
   //    $headerItem = HeaderItem::query()->where('status', '1')->get();
   //    $footerColumn = FooterColumn::query()->where('status', '1')->get();
   //    $footerItem = FooterItem::query()->where('status', '1')->get();
   //    $footerText = FooterText::query()->where('status', '1')->get();
   //    $namad = Namad::query()->where('status', '1')->get();
   //    $application = Application::query()->where('status', '1')->get();
   //    $service = Service::query()->where('status', '1')->get();
   //    $incredible = Product::query()->where('status', '1')->where('position', '2')->
   //    orderBy('id', 'DESC')->paginate(15);
   //    $special = Product::query()->where('status', '1')->where('position', '1')->
   //    orderBy('id', 'DESC')->paginate(15);
   //    $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->paginate(10);
   //    if(Auth::user()) {
   //       $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
   //    } else {
   //       $totalCart = 0;
   //    }
   //    $support = Support::query()->where('status', '1')->get();

   //    return view('pages.promotion-center', compact('categories', 'parents', 'children', 'logo', 'social',
   //    'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
   //    'incredible', 'special', 'products', 'totalCart', 'support'));
   // }


   public function incredible_offers(Request $request)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $products = Product::query()->where('status', '1')->where('position', '2')->
      orderBy('id', 'DESC')->get();

      if ($request->get('category_id')) {
         $filter = $request->get('category_id');

         $products = Product::query()->where('status', '1')->where('position', '2')->
         orderBy('id', 'DESC')->where('category_id', $filter)->get();
      } 
      elseif ($request->get('category_id') === "?") 
      {
         $products = Product::query()->where('status', '1')->where('position', '2')->
         orderBy('id', 'DESC')->get();
      }

      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.incredible-offers', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'products', 'totalCart', 'support'));
   }


   public function category(Category $category, Request $request)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $brand = Brand::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();  
      $productComment = ProductComment::query()->where('status', '1')->orderBy('id', 'DESC')->get();

      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      if ($request->get('sort') === 'price_asc') {
         $products = Product::query()->where('status', '1')->orderBy('price', 'asc')->get();
      } 
      elseif ($request->get('sort') === 'price_desc') {
         $products = Product::query()->where('status', '1')->orderBy('price', 'desc')->get();
      }
      elseif ($request->get('sort') === 'newest') {
         $products = Product::query()->where('status', '1')->orderBy('created_at', 'desc')->get();
      } else {
         $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->get();
      }

      return view('pages.category', compact('category', 'categories', 'parents', 'children', 'logo', 'social', 'brand',
      'homeBanner', 'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application',
      'service', 'products', 'productComment', 'totalCart', 'support'));
   }


   public function main(Category $category)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $brand = Brand::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $mainBanner = mainBanner::where('status', '1')->get();
      $slider = Slider::query()->orderBy('id', 'DESC')->where('status', '1')->where('position', '3')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->get();
      $best_selling = Product::query()->where('status', '1')->where('position', '3')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.main', compact('category', 'categories', 'parents', 'children', 'logo', 'social', 'brand',
      'homeBanner', 'mainBanner', 'slider', 'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad',
      'application', 'service', 'products', 'best_selling', 'totalCart', 'support'));
   }


   public function product(Product $product, ProductQuestion $productQuestion)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $brand = Brand::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $images = Image::query()->where('product_id', '=', $product->id)->get();
      $products = Product::query()->where('category_id', 'LIKE', $product->category_id)
      ->where('status', '1')->orderBy('id', 'DESC')->paginate(10);
      $productComment = ProductComment::query()->where('status', '1')->where('product_id', 'LIKE', $product->id)
      ->orderBy('id', 'DESC')->get();
      $productQuestions = ProductQuestion::query()->where('status', '1')->where('product_id', 'LIKE', $product->id)
      ->orderBy('id', 'DESC')->get();
      $replies = Reply::query()->where('status', '1')->get();

      $totalView = ProductComment::query()->where('status', '1')->where('product_id', 'LIKE', $product->id)->count();
      $totalQuestion = ProductQuestion::query()->where('status', '1')->where('product_id', 'LIKE', $product->id)->count();

      $sellers = Seller::where('product_id', 'LIKE', $product->id)->where('status', '1')->get();

      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.product', compact('product', 'categories', 'parents', 'children', 'logo', 'social', 'brand',
      'homeBanner', 'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application',
      'service', 'images', 'products', 'productComment', 'productQuestions', 'replies', 'productQuestion',
      'totalView', 'totalQuestion', 'sellers', 'totalCart', 'support'));
   }


   public function search(Request $request)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $brand = Brand::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $productComment = ProductComment::query()->where('status', '1')->orderBy('id', 'DESC')->get();

      $products = Product::orderBy('id', 'DESC')->where('farsi_title', 'LIKE', '%' . $request->product .'%');
      $products = $products->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      if ($request->get('sort') === 'price_asc') {
         $products = Product::query()->where('status', '1')->orderBy('price', 'asc')->get();
      } 
      elseif ($request->get('sort') === 'price_desc') {
         $products = Product::query()->where('status', '1')->orderBy('price', 'desc')->get();
      }
      elseif ($request->get('sort') === 'newest') {
         $products = Product::query()->where('status', '1')->orderBy('created_at', 'desc')->get();
      } else {
         $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->get();
      }

      return view('pages.search', compact('categories', 'parents', 'children', 'logo', 'social', 'brand',
      'homeBanner', 'headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application',
      'service', 'products', 'productComment', 'totalCart', 'support'));
   }


   public function productComment(ProductComment $productComment, Product $product, User $user, Request $request)
   {
      $productComment = new ProductComment([
         'rate' => $request->get('rate'),
         'title' => $request->get('title'),
         'positive_point' => $request->get('positive_point'),
         'negative_point' => $request->get('negative_point'),
         'body' => $request->get('body'),
         'product_id' => $product->id,
         'user_id' => auth()->user()->id,
      ]);

      $productComment->save();
      return back();
   }


   public function productQuestion(ProductQuestion $productQuestion, Product $product, Request $request)
   {
      $productQuestion = new ProductQuestion([
         'question' => $request->get('question'),
         'product_id' => $product->id,
         'user_id' => auth()->user()->id,
      ]);

      $productQuestion->save();
      return back();
   }


   public function reply(ProductQuestion $productQuestion, Reply $reply, User $user, Request $request)
   {
      $reply = new Reply([
         'user_id' => auth()->user()->id,
         'question_id' => $productQuestion->id,
         'reply' => $request->get('reply'),
      ]);

      $reply->save();
      return back();
   }


   //! Profile
//   public function profile()
//   {
//      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
//      $parents = Category::where('status', '1')->where('child_id', '0')->get();
//      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
//      $logo = Logo::where('status', '1')->get();
//      $social = Social::where('status', '1')->get();
//      $homeBanner = homeBanner::where('status', '1')->get();
//      $headerItem = HeaderItem::query()->where('status', '1')->get();
//      $footerColumn = FooterColumn::query()->where('status', '1')->get();
//      $footerItem = FooterItem::query()->where('status', '1')->get();
//      $footerText = FooterText::query()->where('status', '1')->get();
//      $namad = Namad::query()->where('status', '1')->get();
//      $application = Application::query()->where('status', '1')->get();
//      $service = Service::query()->where('status', '1')->get();
//      if(Auth::user()) {
//         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
//      } else {
//         $totalCart = 0;
//      }
//      $support = Support::query()->where('status', '1')->get();
//
//      return view('pages.profile', compact('categories', 'parents', 'children', 'logo', 'social',
//      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service', 'totalCart', 'support'));
//   }


   public function addresses()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.addresses', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service', 'totalCart', 'support'));
   }


   public function lists()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $favorite = Favorite::query()->orderBy('id', 'DESC')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.lists', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'favorite', 'totalCart', 'support'));
   }


   public function orders()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.orders', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service', 'totalCart', 'support'));
   }


   public function personal_info()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.personal-info', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service', 'totalCart', 'support'));
   }


   public function edit_product()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();

      $vendor = Vendor::query()->get();

      $products = Product::query()->orderBy('id', 'DESC')->where('status', '1')->paginate(5);
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.edit-product', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'products', 'vendor', 'totalCart', 'support'));
   }


   public function my_product(Seller $seller)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();

      $products = Product::query()->orderBy('id', 'DESC')->where('status', '1')->paginate(5);
      $sellers = Seller::query()->orderBy('id', 'DESC')->paginate(5);
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      return view('pages.my-product', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'products', 'seller', 'sellers', 'totalCart', 'support'));
   }


   public function vendor(Vendor $vendor)
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();
      if(Auth::user()) {
         $vendor = Vendor::query()->where('user_id', 'LIKE', auth()->user()->id)->get();
      }
      return view('pages.vendor', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'totalCart', 'support', 'vendor'));
   }


   public function detail(Request $request, Vendor $vendor)
   {
      if($item = Vendor::where('user_id', auth()->user()->id)->first()) {
         $item->update($request->all());
      } else {
         auth()->user()->vendor()->create([
            'category_id' => $request->get('category_id'),
            'city' => $request->get('city'),
            'bank' => $request->get('bank'),
            'shop' => $request->get('shop'),
            'record' => $request->get('record'),
            'user_id' => auth()->user()->id,
         ]);
      }

      return back();
   }


   public function new(Request $request, Product $product, Seller $seller)
   {
      $seller = new Seller([
         'price' => $request->get('price'),
         'sale' => $request->get('sale'),
         'storage' => $request->get('storage'),
         'product_id' => $product->id,
         'vendor_id' => auth()->user()->id,
      ]);

      $seller->save();
      return back();
   }


   public function change(Request $request, Seller $seller)
   {
      $seller->update($request->all());
      return back();
   }


   public function delete(Seller $seller)
   {
      $seller->delete();
      return back();
   }


   public function job(Request $request, User $user)
   {
      $user->job = $request->job;

      $user->update();
      return back();
   }

   public function birthday(Request $request, User $user)
   {
      $user->birthday = $request->birthday;

      $user->update();
      return back();
   }


   public function info(Request $request, User $user)
   {
      $user->name = $request->name;
      $user->national_code = $request->national_code;

      $user->update();
      return back();
   }


   public function phone(Request $request, User $user)
   {
      $user->phone = $request->phone;

      $user->update();
      return back();
   }


   public function email(Request $request, User $user)
   {
      $user->email = $request->email;

      $user->update();
      return back();
   }


   public function shaba(Request $request, User $user)
   {
      $user->shaba = $request->shaba;

      $user->update();
      return back();
   }


   public function address(Request $request, User $user)
   {
      $user->address = $request->address;
      $user->code_post = $request->code_post;

      $user->update();
      return back();
   }


   public function change_password(Request $request, User $user)
   {

      $current_user = auth()->user();

      if (Hash::check($request->current_password, $current_user->password)) {
         $user->password = Hash::make($request->password);
      }

      $user->update();
      return back();
   }


   //! Cart
   public function cart()
   {
      $categories = Category::where('status', '1')->where('parent_id', '0')->get();
      $parents = Category::where('status', '1')->where('child_id', '0')->get();
      $children = Category::where('status', '1')->where('child_id', '!=', '0')->get();
      $logo = Logo::where('status', '1')->get();
      $social = Social::where('status', '1')->get();
      $homeBanner = homeBanner::where('status', '1')->get();
      $headerItem = HeaderItem::query()->where('status', '1')->get();
      $footerColumn = FooterColumn::query()->where('status', '1')->get();
      $footerItem = FooterItem::query()->where('status', '1')->get();
      $footerText = FooterText::query()->where('status', '1')->get();
      $namad = Namad::query()->where('status', '1')->get();
      $application = Application::query()->where('status', '1')->get();
      $service = Service::query()->where('status', '1')->get();
      $products = Product::query()->where('status', '1')->orderBy('id', 'DESC')->paginate(10);

      if(Auth::user()) {
         $totalCart = Cart::query()->where('user_id', 'LIKE', auth()->user()->id)->count();
      } else {
         $totalCart = 0;
      }
      $support = Support::query()->where('status', '1')->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         $totalSaleSeller = 0;
         $totalSaleMain = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
            if ($totalSaleMain) {
               $totalSaleMain += ($item->product->price * $item->product->sale / 100) * $item->count;
            } elseif ($totalSaleSeller) {
               $totalSaleSeller += ($item->seller->price * $item->seller->sale / 100) * $item->count;
            }
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         $totalSaleSeller = 0;
         $totalSaleMain = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
            if ($totalSaleMain) {
               $totalSaleMain += ($item->product->price * $item->product->sale / 100) * $item->count;
            } elseif ($totalSaleSeller) {
               $totalSaleSeller += ($item->seller->price * $item->seller->sale / 100) * $item->count;
            }
         }
      }

      return view('pages.cart', compact('categories', 'parents', 'children', 'logo', 'social',
      'homeBanner','headerItem', 'footerColumn', 'footerItem', 'footerText', 'namad', 'application', 'service',
      'totalCart', 'cart', 'totalPrice', 'products', 'totalSaleSeller', 'totalSaleMain', 'support'));
   }


   public function add_to_cart(Product $product)
   {
      if ($item = auth()->user()->cart->where('product_id', $product->id)->first()) {
         $item->increment('count');
      } else {
         auth()->user()->cart()->create([
            'product_id' => $product->id,
            'price' => ($product->price - ($product->price * $product->sale / 100)),
         ]);
      }

      return redirect()->back();
   }


   public function add_to_cart_2(Seller $seller)
   {
      if ($item = auth()->user()->cart->where('product_id', $seller->product_id)->first()) {
         $item->increment('count');
      } else {
         auth()->user()->cart()->create([
            'product_id' => $seller->product_id,
            'price' => ($seller->price - ($seller->price * $seller->sale / 100)),
         ]);
      }

      return redirect()->back();
   }


   public function cart_plus(Cart $cart)
   {
      $cart->increment('count');
      return back();
   }


   public function cart_minus(Cart $cart)
   {
      if ($cart->count < 2) {
         $cart->delete();
      } else {
         $cart->decrement('count');
      }
      return back();
   }


   public function cart_remove(Cart $cart)
   {
      $cart->delete();
      return back();
   }


   public function add_to_favorite(Product $product)
   {
      auth()->user()->favorite()->create([
         'product_id' => $product->id,
         'user_id' => auth()->user()->id,
      ]);

      return redirect()->back();
   }

   public function remove_favorite(Favorite $favorite)
   {
      $favorite->delete();
      return back();
   }

   public function news_request(Request $request, News $news)
   {
      $news = new News([
         'email' => $request->get('email'),
      ]);

      $news->save();
      return back();
   }
}
