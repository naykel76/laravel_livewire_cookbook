<nav>
    <ul class="grid cols-2">
        @foreach ($menuItems as $item)
            <li class="bx">
                <div class="bx-title">{{ $item->name }}</div>
                <p>{{ $item->description }}</p>
                <a href="{{ url($item->url) }}" class="btn primary">View Example</a>
            </li>
        @endforeach
    </ul>
</nav>
