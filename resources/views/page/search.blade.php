@extends('master')

@section('content')
<div class="container">
    <h2>Kết quả tìm kiếm</h2>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-3">
            <div class="single-item shadow-sm border rounded-3 p-2 h-100 hover-effect">
                <div class="single-item-header text-center">
                    <a href="{{ route('detail', ['id' => $product->id]) }}">
                        <img width="250" height="250" src="/source/image/product/{{ $product->image }}" alt="{{ $product->name }}" class="rounded img-fluid">
                    </a>
                </div>
                <div class="single-item-body text-center">
                    <p class="single-item-title">
                        <a href="{{ route('detail', ['id' => $product->id]) }}" class="fw-bold text-dark">{{ $product->name }}</a>
                    </p>
                    <p class="single-item-price" style="text-align:center; font-size: 15px;">
                        @if($product->promotion_price == 0)
                            <span class="flash-sale fw-bold text-danger">{{ number_format($product->unit_price, 0, ',', '.') }} VND</span>
                        @else
                            <span class="flash-del text-muted text-decoration-line-through">{{ number_format($product->unit_price, 0, ',', '.') }} VND</span>
                            <span class="flash-sale fw-bold text-danger">{{ number_format($product->promotion_price, 0, ',', '.') }} VND</span>
                        @endif
                    </p>
                </div>
                <div class="single-item-caption text-center">
                    <a class="add-to-wishlist me-2 text-danger" href="wishlist/add/{{ $product->id }}">
                        <i class="fa fa-heart"></i>
                    </a>
                    <a class="add-to-cart me-2 text-success">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <a class="beta-btn primary" href="detail/{{$product->id}}">Details <i	
					class="fa fa-chevron-right"></i></a>	
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection
