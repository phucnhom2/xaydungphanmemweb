<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;


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
    public function getCheckout()
    {

        return view('page.checkout');
    }
    public function postCheckout(Request $req)
    {
        $cart=Session::get('cart');
         $cus =new Customer;
         $cus ->name = $req->name;
         $cus->gender =$req->gender;
         $cus->email =$req->email;
         $cus->address =$req->address;
         $cus->phone_number =$req->phone_number;
         $cus->note =$req->note;
         $cus->save();

         $bill= new Bill;
         $bill->id_customer=$cus->id;
         $bill->date_order=date('Y-m-d');
         $bill->total=$cart->totalPrice;
         $bill->payment=$req->payment;
         $bill->note =$req->note;
         $bill->save();



         foreach ($cart->items as $key => $value) {
             $bill_detail= new BillDetail;

            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=($value['price']/$value['qty']);
            $bill_detail->save();

         }

         Session::forget('cart');
         return redirect()->route('trang-chu')->with('thong bao','dat hang thanh cong');
    }
    public function getLogin()
    {
        return view('page.login');
    }
    public function getSignin()
    {
        return view('page.dangky');
    }
    public function postSignin(Request $req)
    {
        $this -> validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                'repassword'=>'required|same:password'

            ],
            [
                'email.require'=>'vui long nhap email nha may',
                'email.email'=>'khong phai dinh dang mail nha',
                'email.unique'=>'email da ton tai',
                'password'=>'vui long nhap mat khau',
                'repassword.same'=>'mat khau khong giong nhau'

            ]
        );
        $user = new User();
        $user->full_name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanh cong','tao tai khoan thành công');
    }

    public function postLogin(Request $req)
    {
        // dd($req->all());
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'vui long nhaapj email',
                'email.email'=>'day ko phai email',
                'password.requied'=>'vui long nhap passwword',
                'password.min'=>'mat khau it naht 6 ki tu',
                'passwor.max'=>'mat khau toi da 20 ki tu'
            ]

        );
        $credentials=array( 'email'=>$req->email,
                            'password'=>$req->password);
        if(Auth::attempt($credentials)){
            //return redirect()->route('trang-chu');
            return redirect()->back()->with([  'flag'=>'success',
                                               'message'=>'dang nhap thanh '
                                             ]);
        }
        else
        {
            return redirect()->back()->with([   'flag'=>'danger',
                                                'message'=>'dang nhap that bai'
                                            ]);
        }
    }
    public function getDanhsach()
    {   $cake=Product::all();
        return view('admin.cake.danhsach',
            compact('cake'));
    }

    public function getThem()//view
    {
        $cake_type=ProductType::all();
        $cake=Product::all();
        return view('admin/cake/them',
            compact('cake'),compact('cake_type'));
    }
    public function postThem(Request $req)//DB
    {
        $this->validate($req,
            [
                'name'=>'required|min:3|unique:products,name',
                'description'=>'required',
                'unit_price'=>'required',
                'unit'=>'required|min:3',

            ],
            [
                'name.required'=>'sao không nhập tên z móa ????',
                'name.min'=>'có tên nào ngắn z ko ... pls làm ăn có tâm chúc đi !!!',
                'name.unique'=>'tên không dc trùng móa ơi... không lẽ có 2 cái bánh tên giống nhau ...',
                'description.required'=>'phải có noi dung nha nha'
            ]
        );
        $cake =new Product;
        $cake->name=$req->name;
        $cake->id_type=$req->cake_type;
        $cake->description=$req->description;
        $cake->unit_price=$req->unit_price;
        $cake->promotion_price=$req->promotion_price;

        $cake->unit=$req->unit;
        if($req ->hasFile('image'))// có tồn tại nha
        {
            $file =$req->file('image');//lầy file hình đó ra gán vào biến file
            //kiểm tra tền hình tồn tại chưa
            //lấy tên hình ra trước.
            $name=$file->getClientOriginalName();
            // đặt tên ko trùng
            $image=str_random(4)."_".$name;
            // lưu cái hình vào thư mực
            $file->move('source/image/product',$image);
            $cake->image=$image;
        }else{
            $cake->image="";
        }
        $cake->save();
        return redirect('admin/cake/them')->with('thongbao','them thanh công');
    }

     public function getSua($id)
    {
        $cake_type=ProductType::all();
        $cake=Product::find($id);
       return view('admin/cake/sua',
        compact('cake','cake_type'));

    }
    public function postSua(Request $req,$id)
    {
        // dd($req->all())
        $this->validate($req,
            [
                'name'=>'required|min:3|unique:products,name,'.$id,
                'description'=>'required',
                //'Unit_price'=>'required',
                'unit'=>'required|min:3',

            ],
            [
                'name.required'=>'sao không nhập tên z móa ????',
                'name.min'=>'có tên nào ngắn z ko ... pls làm ăn có tâm chúc đi !!!',
                'name.unique'=>'tên không dc trùng móa ơi... không lẽ có 2 cái bánh tên giống nhau ...',
                'description.required'=>'phải có noi dung nha nha'
            ]
        );
        $cake=Product::find($id);
        $cake->name=$req->name;
        $cake->id_type=$req->cake_type;
        $cake->description=$req->description;
        $cake->unit_price=$req->unit_price;
        $cake->promotion_price=$req->promotion_price;
        $cake->unit=$req->unit;
        if($req ->hasFile('image'))// có tồn tại nha
        {
            $file =$req->file('image');//lầy file hình đó ra gán vào biến file
            //kiểm tra tền hình tồn tại chưa
            //lấy tên hình ra trước.
            $name=$file->getClientOriginalName();
            // đặt tên ko trùng
            $image=str_random(4)."_".$name;
            // lưu cái hình vào thư mực

            if($req ->hasFile('image'))// có tồn tại nha
            {
                 $file->move('source/image/product',$image);
            }
            else{
                unlink('source/image/product/'.$cake->image);
            }
            $cake->image=$image;
        }
        $cake->save();
        return redirect()->back()
        ->with('thongbao','sua thanh công');
    }

    public function getXoa($id)
    {
        $cake=Product::find($id);
        $cake->delete();
        return redirect()->back()
        ->with('thongbao','xoa thanh công');
    }

    public function getDanhsachtype()
    {
        $cakeType=ProductType::all();
        return view('admin/cake_type/danhsach',
            compact('cakeType'));
    }
    public function getThemloai()
    {
        $cakeType=ProductType::all();
        return view('admin/cake_type/them',compact('cakeType'));
    }
    public function postThemloai(Request $req)
    {
        $this->validate($req,
            [
                'name'=>'required|min:3|unique:type_products,name',
                'description'=>'required',
            ],
            [
                'name.required'=>'sao không nhập tên z móa ????',
                'name.min'=>'có tên nào ngắn z ko ... pls làm ăn có tâm chúc đi !!!',
                'name.unique'=>'tên không dc trùng móa ơi... không lẽ có 2 cái bánh tên giống nhau ...',
                'description.required'=>'phải có noi dung nha nha'
            ]
        );
        $cake_type =new ProductType;
        $cake_type->name=$req->name;
        $cake_type->description=$req->description;

        if($req ->hasFile('image'))// có tồn tại nha
        {
            $file =$req->file('image');//lầy file hình đó ra gán vào biến file
            //kiểm tra tền hình tồn tại chưa
            //lấy tên hình ra trước.
            $name=$file->getClientOriginalName();
            // đặt tên ko trùng
            $image=str_random(4)."_".$name;
            // lưu cái hình vào thư mực
            $file->move('source/image/product',$image);
            $cake_type->image=$image;
        }else{
            $cake_type->image="";
        }
        $cake_type->save();
        return redirect('admin/cake_type/them')->with('thongbao','them thanh công');

    }
    public function getSualoai($id)
    {
        $caketype=ProductType::find($id);
        return view('admin/cake_type/sua',
        compact('caketype'));
    }
    public function postSualoai(Request $req,$id)
    {
        // dd($req->all())
        $this->validate($req,
            [
                'name'=>'required|min:3|unique:products,name,'.$id,
                'description'=>'required'
            ],
            [
                'name.required'=>'sao không nhập tên z móa ????',
                'name.min'=>'có tên nào ngắn z ko ... pls làm ăn có tâm chúc đi !!!',
                'name.unique'=>'tên không dc trùng móa ơi... không lẽ có 2 cái bánh tên giống nhau ...',
                'description.required'=>'phải có noi dung nha nha'

            ]
        );
        $cake_type=ProductType::find($id);
        $cake_type->name=$req->name;
        $cake_type->description=$req->description;

        if($req ->hasFile('image'))// có tồn tại nha
        {
            $file =$req->file('image');//lầy file hình đó ra gán vào biến file
            //kiểm tra tền hình tồn tại chưa
            //lấy tên hình ra trước.
            $name=$file->getClientOriginalName();
            // đặt tên ko trùng
            $image=str_random(4)."_".$name;
            // lưu cái hình vào thư mực
            $file->move('source/image/product',$image);
            if($req ->hasFile('image'))// có tồn tại nha
            {
                unlink('source/image/product/'.$cake_type->image);
            }
            $cake_type->image=$image;
        }
        $cake_type->save();
        return redirect()->back()
        ->with('thongbao','sua thanh công');
    }

    public function getXoaloai($id)
    {

            $caketype = ProductType::find($id);
            $caketype->delete();
            return redirect('admin/cake_type/danhsach')->with('thongbao','Xóa thành công.');
    }



}
