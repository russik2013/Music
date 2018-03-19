@extends('main')
@section('contact')
<div class="content body-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title">
                    <h2 class="con-start">Contact us <span class="dot">.</span></h2>
                </div>
                <div class="error">
                    <p class="message"></p>
                </div>
                <form id="getForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="usr" placeholder="Your name*" name="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pwd" placeholder="Your phone*" name="Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="em" placeholder="Your e-mail" name="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="msg" placeholder="Message" name="Message">
                    </div>
                    <input type="submit" class="btn btn-info" value="send">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
