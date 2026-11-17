@auth
    @php
        $productTypes = Http::get(url('/product-types'))->json();
        $imgs = Http::get(url('/avaiable-images'))->json();
    @endphp

    @if (isset($product))
        <form class="product-edit" action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <h3>ATUALIZAR PRODUTO</h3>

            <div class="form-group">
                <label>Nome: </label>
                <input type="text" name="name" placeholder="Nome do produto" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label>Preço: </label>
                <input type="number" name="price" placeholder="1.00" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label>Imagem: </label>
                <div class="imgs-grid">
                    @foreach ($imgs as $img)
                        <label class="img-option">
                            <input type="radio" name="image" value="{{ $img }}" {{ $product->image == $img ? 'selected' : '' }} required>
                            <img width='100px' height='auto' src="{{ asset('imgs/' . $img . '.jpg') }}" alt="{{ $img }}">
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label>Descrição: </label>
                <input type="textarea" name="description" placeholder="Esse produto é..." value="{{ $product->description }}" required>
            </div>

            <div class="form-group">
                <label>Tipo: </label>
                <select name="product_type">
                    @foreach ($productTypes as $type)
                        <option value="{{ $type["id"] }}" {{ $product->product_type == $type["id"] ? 'selected' : '' }}>
                            {{ $type["description"] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Inserir produto</button>
        </form>
    @else
        <form class="product-edit" action="{{ route('product.store') }}" method="POST">
            @csrf

            <h3>INSERIR PRODUTO</h3>

            <div class="form-group">
                <label>Nome: </label>
                <input type="text" name="name" placeholder="Nome do produto" required>
            </div>

            <div class="form-group">
                <label>Preço: </label>
                <input type="number" name="price" placeholder="1.00" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Imagem: </label>
                <div class="imgs-grid">
                    @foreach ($imgs as $img)
                        <label class="img-option">
                            <input type="radio" name="image" value="{{ $img }}" required>
                            <img width='100px' height='auto' src="{{ asset('imgs/' . $img . '.jpg') }}" alt="{{ $img }}">
                            <span class="img-id">{{ $img }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label>Descrição: </label>
                <input type="textarea" name="description" placeholder="Esse produto é..." required>
            </div>

            <div class="form-group">
                <label>Tipo: </label>
                <select name="product_type">
                    @foreach ($productTypes as $type)
                        <option value="{{ $type["id"] }}">
                            {{ $type["description"] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Inserir produto</button>
        </form>
    @endif
@endauth