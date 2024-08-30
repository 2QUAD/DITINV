<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Quotation;
use Illuminate\Support\Carbon; // Importar Carbon diretamente
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        if (!$userId) {
            // Caso o usuário não esteja autenticado, redirecione ou trate o erro
            return redirect()->route('login'); // Ou outra ação apropriada
        }

        $today = Carbon::today(); // Utilizando Carbon diretamente

        $orders = Order::where('user_id', $userId)->count();
        $products = Product::where('user_id', $userId)->count();
        $purchases = Purchase::where('user_id', $userId)->count();
        $todayPurchases = Purchase::whereDate('date', $today)->count();
        $todayProducts = Product::whereDate('created_at', $today)->count();
        $todayQuotations = Quotation::whereDate('created_at', $today)->count();
        $todayOrders = Order::whereDate('created_at', $today)->count();
        $categories = Category::where('user_id', $userId)->count();
        $quotations = Quotation::where('user_id', $userId)->count();

        return view('dashboard', [
            'products' => $products,
            'orders' => $orders,
            'purchases' => $purchases,
            'todayPurchases' => $todayPurchases,
            'todayProducts' => $todayProducts,
            'todayQuotations' => $todayQuotations,
            'todayOrders' => $todayOrders,
            'categories' => $categories,
            'quotations' => $quotations
        ]);
    }
}
