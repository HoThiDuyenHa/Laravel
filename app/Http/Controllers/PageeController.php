<?php

namespace App\Http\Controllers;

// use App\Models\News;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Comment;
use App\Models\BillDetail;
// use App\Models\News;
class PageeController extends Controller
{
    public function getIndex() {
        // Cách 11
        // $slide = Slide::all();
        // $products = Product::where('id_type', 6)->limit(4)->get();
        // $product2 = Product::where('id_type', 5)->limit(4)->get();
        // $product3 = Product::where('id_type', 4)->limit(4)->get(); 

        // return view('page.trangchu', compact('slide', 'products', 'product2', 'product3'));

            $slide = Slide::all();
            $new_product=Product::where('new',1)->paginate(4);
            $promotion_product=Product::where('promotion_price','<>',0)->paginate(8);
            return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));

    }
    public function getLoaiSp($type)
	{
	$sp_theoloai = Product::where('id_type', $type)->get();
	$type_product =TypeProduct::all();
	$sp_khac = Product::where('id_type', '<>', $type)->paginate(4);
	
	return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
	}

    public function getDetail(Request $request){
        $sanpham=Product::where('id',$request->id)->first();
         // Lấy sản phẩm liên quan cùng id_type (trừ sản phẩm hiện tại)
    $splienquan = Product::where('id_type', $sanpham->id_type)
                            ->where('id', '!=', $sanpham->id)
                            ->paginate(3);
        $count_same_type = Product::where('id_type', $sanpham->id_type)->count();
        $comments=Comment::where('id_product',$request->id)->get();
        $bestseller = Product::where('best_seller', 1)->take(4)->get();
        $new = Product::where('new', 0)->take(4)->get();
        return view('page.chitiet_sanpham',compact('sanpham','splienquan','comments','bestseller','new','count_same_type'));
    }

    public function getIndexAdmin(){
        $products=Product::all();
        return view('pageadmin.admin')->with([
            'products' => $products,
            'sumSold' => BillDetail::count()
        ]);
            }

        public function getAdminAdd(){							
            return view('pageadmin.formAdd');
								

}
public function postAdmin(Request $request) {
     $product = new Product();

    // Xử lý ảnh nếu có
    if ($request->hasFile('inputImage')) {
        $file = $request->file('inputImage'); // Lấy đúng input file
        $fileName = time() . '_' . $file->getClientOriginalName(); // Đặt tên file duy nhất
        $request->file('inputImage')->move(public_path('source/image/product/'), $fileName); // Lưu ảnh vào thư mục public
        $product->image =$fileName; // Lưu đường dẫn vào database
    } 

    // Gán dữ liệu từ request vào sản phẩm
    $product->name = $request->input('inputName');
    $product->description = $request->input('inputDescription');
    $product->unit_price = $request->input('inputPrice');
    $product->promotion_price = $request->input('inputPromotionPrice', 0);
    $product->unit = $request->input('inputUnit');
    $product->new = $request->input('inputNew', 0);
    $product->best_seller = $request->input('bestSeller', 0);
    $product->id_type = $request->input('inputType');

    // Lưu vào database
    $product->save();

    // Quay về trang danh sách sản phẩm với thông báo thành công
    return $this->getIndexAdmin();
}

public function getAdminEdit($id)  {			
    $product = Product::find($id);
    return view('pageadmin.formEdit')->with('product', $product);
}


        public function postAdminEdit(Request $request) {
            $id=  $request->editId;
            $product = Product::find($id);
            // Xử lý ảnh nếu có
            if ($request->hasFile('editImage')) { 
                $file = $request->file('editImage');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Đặt tên duy nhất
                $file->move(public_path('source/image/product/'), $fileName);
                $product->image =$fileName; 
            }
            
        
            // Gán dữ liệu từ request vào sản phẩm
            $product->name = $request->input('editName');
            $product->description = $request->input('editDescription');
            $product->unit_price = $request->input('editPrice');
            $product->promotion_price = $request->input('editPromotionPrice', 0);
            $product->unit = $request->input('editUnit');
            $product->new = $request->input('editNew', 0);
            $product->best_seller = $request->input('bestSeller', 0);
            $product->id_type = $request->input('editType');
        
            // Lưu vào database
            $product->save();
        
            // Quay về trang danh sách sản phẩm với thông báo thành công
            return $this->getIndexAdmin();
        }
        
        public function postAdminDelete($id){
            $product=Product::find($id);
            $product->delete();
            return $this->getIndexAdmin();
        } 
        public function postSearch(Request $request) {
            $keyword = $request->input('query'); // Lấy giá trị input từ request
        
            $products = Product::where('name', 'LIKE', "%$keyword%")->paginate(3);
        
            return view('page.search', compact('products'));
        }
        
    }        