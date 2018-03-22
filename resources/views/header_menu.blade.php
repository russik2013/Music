<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @foreach($types as $type)
                <li><a href="#">{{$type -> name}}</a></li>
            @endforeach
            <li><a href="{{url('contact')}}">CONTACT</a></li>
        </ul>
    </div>
</div>