<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $new_product=Product::where('new',1)->get();
        return view('page.trangchu',compact('new_product'));
    }

    public function getLoaisp($type)
    {
        $sp_theoloai=Product::where('id_type',$type)->get();
        $loai=ProductType::all();
        $loai_sp=ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','loai','loai_sp'));

    }


    public function getChitiet(Request $req)
    {
        $sanpham=Product::where('id',$req->id)->first();
        $similar=Product::where('id_type',$sanpham->id_type)->paginate(4);
        return view('page.chitiet_sanpham',compact('sanpham','similar'));
    }
    public function getAddtoCart(Request $req, $id)
    {
        $product=Product::find($id);// kiem tra tim  co id nay hay ko.
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->route('cart');

    }

    public function getCart(){
        return view('cart');
    }
    public function getDelCart($id)
    {
      $oldCart=Session::has('cart')?Session::get('cart'):null;
      $cart=new cart($oldCart);
      $cart->removeItem($id);
      Session::put('cart',$cart);
      return redirect()->back();
    }
}
