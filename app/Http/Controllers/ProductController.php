<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\Http\Requests\CreateProductRequest;
//use Request;


class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
        public function getIndex(){
            $products = Product::all();
            //dd($cds);
            return view('products.index')->with('products',$products);
        }
        
        public function getFullname(){
            return "Irina Lecoche";
        }
        
	public function index()
	{
            $products = Product::all();
            //dd($cds);
            return view('products.index')->with('products',$products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return view('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        
        public function store(CreateProductRequest $request)
	{
            //return "validate";
            Product::create($request->all());
            return redirect('products');

	}
        
	public function store2(Request $request)
	{
            $this->validate($request,
                [
                    'dish' => 'required|min:5',
                    'sku' => 'required',
                    'menu_category_id' => 'required|Integer',
                    'price' => 'required'
                ]
                );
            $input = $request->all();
            Product::create($input);
//            $product = new Product;
//            
//            $product->title = $input['title'];
//            $product->description = $input['description'];
//            $product->author = $input['author'];
//            $product->price = $input['price'];
//            
//            $product->save();
            return redirect('products');
	}
        
        /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            Product::destroy($id);
            return redirect('products');
	}
        

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $product = Product::findOrFail($id);
            //return $product;
           return view('products.show')->with('product',$product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $product = Product::findOrFail($id);

            return view('products.edit', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
            $product = Product::findOrFail($id);
            $this->validate($request,
                [
                    'dish' => 'required|min:5',
                    'sku' => 'required',
                    'menu_category_id' => 'required|Integer',
                    'price' => 'required'
                ]
                );
            
            $product->update($request->all());
            
            return redirect('products');
        }

	
        public function send(){
            $product = Product::find(3);
            $viewvalues = ['product' => $product];
            $dataheaders = ['to' => "ilecoche@gmail.com", 'subject' => 'Welcome'];
            Mail::send('emails.welcome',
                    $viewvalues,
                    function($message) use ($dataheaders){
                        $message->to($dataheaders['to'])
                                ->subject($dataheaders['subject']);
                    });
        }

        
}
