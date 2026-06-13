<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        // 1. Static Routes
        $routes = [
            ['url' => route('home'), 'lastmod' => now()],
        ];

        
        $static_pages = ['profil-perusahaan', 'kontak', 'produk', 'portofolio'];
        foreach ($static_pages as $page) {
            $routes[] = ['url' => url('/' . $page), 'lastmod' => now()]; 
        }

        // 2. Dynamic Products
        $products = Product::latest()->get();
        foreach ($products as $product) {
            $routes[] = [
                'url' => route('product.detail', $product->slug),
                'lastmod' => $product->updated_at
            ];
        }

        // 3. Dynamic Portfolios (Only Publish)
        $portfolios = Portfolio::where('status', 'Publish')->latest()->get();
        foreach ($portfolios as $portfolio) {
            $routes[] = [
                'url' => route('portfolio.detail', $portfolio->id),
                'lastmod' => $portfolio->updated_at
            ];
        }

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($routes as $route) {
            $xml .= '<url>';
            $xml .= '<loc>' . $route['url'] . '</loc>';
            $xml .= '<lastmod>' . $route['lastmod']->tz('UTC')->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow:\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml');

        return response($content, 200, [
            'Content-Type' => 'text/plain'
        ]);
    }
}
