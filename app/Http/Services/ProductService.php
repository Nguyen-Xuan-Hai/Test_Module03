<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
   protected $productRepo;
   public function __construct(ProductRepository $productRepo)
   {
       $this->productRepo = $productRepo;
   }

   public function getAll(){
       return $this->productRepo->getAll();
   }

   public function findById($id){
       return $this->productRepo->getById($id);
   }

    public function store($request){
        $product= new Product();
        $product->fill($request->all());
        $path = $this->updateFile($request,'img','product');
        $product->img = $path;
        //  $user->group_id = $request->group_id;
//        $categories = $request->category_id;
        $this->productRepo->store($product);
    }

    function delete($product){
        return $this->productRepo->delete($product);
    }

    function update($id,$request){

        $product = $this->productRepo->findById($id);
        $product->fill($request->all());
        if ($request->hasFile('img')){
            Storage::disk('public')->delete($product->img);
            $path = $this->updateFile($request,'img','product');
            $product->img = $path;
        }
//        $path = $this->updateFile($request,'img','product');
//        $product->img = $path;


        $this->productRepo->store($product);
    }
}
