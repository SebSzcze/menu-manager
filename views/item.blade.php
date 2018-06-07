<li>
    <a href="{{ $item->url }}" {!! $item->isBlank() ? 'target="_blank" ': '' !!}{!! $item->class ? sprintf('class="%s"', $item->class): '' !!}>
        {{ $item->anchor }}
    </a>
    @if($children = $item->items)
        <ul>
            @foreach($children as $child)
                @include('menumanager::item', ['item' => $child->render() ])
            @endforeach
        </ul>
    @endif
</li>