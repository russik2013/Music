<ul>
    @foreach($categories as $category)

        @if($category->child->count() > 0)
            <li><a href="{{url('category/'.$category-> id)}}"  class="has_submenu">{{ $category->name }}<span></span></a>
                @include('categoryThree', ['categories' => $category->child])
            </li>
        @else
            <li><a href="{{url('category/'.$category-> id)}}">{{ $category->name }}</a></li>

        @endif
    @endforeach
</ul>