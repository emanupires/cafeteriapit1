<div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0;">
    <h4 class="text-center mb-4">Cafeteria</h4>
    <ul class="nav flex-column">
        @foreach ($menuItems as $item)
            @if (!empty($item['children']))
                <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between collapsed" data-bs-toggle="collapse" href="#menu-{{ \Illuminate\Support\Str::slug($item['name']) }}" role="button" aria-expanded="true" aria-controls="menu-{{ \Illuminate\Support\Str::slug($item['name']) }}">
                        <span>{{ $item['name'] }}</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse show" id="menu-{{ \Illuminate\Support\Str::slug($item['id']) }}">
                        <ul class="nav flex-column ms-3">
                            @foreach ($item['children'] as $child)
                                <li>
                                    <a href="#" class="nav-link text-white active fw-bold">
                                        {{ $child['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @else
                <li>
                    <a href="#{{ $item['id'] }}" class="nav-link text-white active fw-bold">
                        <span>{{ $item['name'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>