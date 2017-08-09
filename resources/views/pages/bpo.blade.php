@extends('main')

@section('title','| BPO')

@section('content')
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>BSS &CEM PLATFORM OPERATION (BPO)</h2>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="feature">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">BPO</h1>
            <p class="wow fadeInDown" data-wow-delay=".5s">
                BSS & CEM Platform Operation atau yang biasa disingkat dengan BPO merupakan salah satu unit yang ada di DIT yang mengelola dan menangani aplikasi-aplikasi bisnis mulai dari customer, produk, dan service dari segi operasionalnya.<br> Didalam BPO sendiri terbagi atas 3 bagian yakni Customer, Billing, dan Payment. 
            </p>
        </div>

        <br><br>
        <div class="row">
            @foreach($data as $value)
            <div class="col-md-4 col-lg-4 col-xs-12">
                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="media-left">
                        <div class="icon">
                            <i class="ion-ios-lightbulb-outline"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $value->nama_sop }}</h4>
                        @if(!(empty($value->url_aplikasi)))
                            <p><a href="{{ $value->url_aplikasi }}">SOP URL</a></p>
                        @endif
                        <p><a href="{{ route('getEntry', $value->filename) }}">Download SOP</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection

