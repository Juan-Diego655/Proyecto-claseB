<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $productList = Product::limit(10)->orderBy('id', 'desc')->get();

        return view('product.index', [
            'misProductos' => $productList
        ]);
    }

    public function create()
    {
        $categoryList = Category::all();

        return view('product.create', [
            'categoryList' => $categoryList
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:250',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required|exists:categories,id'
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->get('nombre');
        $newProduct->description = $request->get('descripcion');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('categoria');
        $newProduct->id = $request->get('id_producto');

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images', 'public');
            $newProduct->image = $ruta;
        }

        $newProduct->save();

        return redirect()->route('product.index');
    }

    public function show(Product $producto)
    {
        return view('product.show', [
            'producto' => $producto
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function addToCart(Product $product)
{
    $userId = Auth::id();

    if (!$userId) {
        $firstUser = User::first();

        if (!$firstUser) {
            return redirect()->back()->with('error', 'No existe ningún usuario para asociar el carrito.');
        }

        $userId = $firstUser->id;
    }

    $existingItem = CartItem::where('user_id', $userId)
        ->where('product_id', $product->id)
        ->first();

    if ($existingItem) {
        $existingItem->quantity += 1;
        $existingItem->save();
    } else {
        CartItem::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'quantity' => 1
        ]);
    }

    return redirect()->back()->with('success', 'Producto agregado al carrito.');
}

    public function cart()
    {
        $userId = Auth::id();

        if (!$userId) {
            $firstUser = User::first();

            if (!$firstUser) {
                return view('cart.index', [
                    'cartItems' => collect(),
                    'total' => 0
                ]);
            }

            $userId = $firstUser->id;
        }

        $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->get();

        $total = 0;

        foreach ($cartItems as $item) {
            if ($item->product) {
                $total += $item->product->price * $item->quantity;
            }
        }

        return view('cart.index', [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }

    public function removeFromCart(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }
}