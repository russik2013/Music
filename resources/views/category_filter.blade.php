<ul>
    @foreach($categories as $category)

        @if($category->child->count() > 0)
            <li><a href=category.html>{{ $category->name }}<span class="has_submenu"></span></a>
                @include('categoryThree', ['categories' => $category->child])
            </li>
        @else
            <li><a href=category.html>{{ $category->name }}</a></li>

        @endif
    @endforeach
</ul>