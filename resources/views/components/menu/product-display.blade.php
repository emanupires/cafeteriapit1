@if (isset($product))
    <div class="product-display-area">
        <div class="product-display-header">
            {{ $product->name }}
        </div>
        <div class="product-display-body">
            <div class="product-display-img">
                <img src="/imgs/{{ $product->image }}.jpg">
            </div>

            <div class="product-display-description">
                <p>{{ $product->description }}</p>

                <p>R$ {{ $product->price }}</p>
            </div>
        </div>
    </div>
@endif