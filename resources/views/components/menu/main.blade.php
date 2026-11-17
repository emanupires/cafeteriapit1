@foreach ($menuItems as $item)
    @if (isset($item['id']))
        @include('components.menu.card', ['idCard' => $item['id']])
    @endif
@endforeach