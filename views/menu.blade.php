@if($header = $menu->getHeader())
    <h3>{{ $header }}</h3>
@endif

<ul>
    @foreach($menu->getItems() as $item)
        @include('menumanager::'.$item->view, ['item' => $item->render() ])
    @endforeach 
</ul>