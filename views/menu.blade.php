@if($header = $menu->getHeader())
    <h3>{{ $header }}</h3>
@endif

<ul>
    @foreach($menu->getItems() as $item)
        @include('menumanager::item', ['item' => $item->render() ])
    @endforeach 
</ul>