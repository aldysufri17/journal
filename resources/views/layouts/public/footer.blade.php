@php
    $contact = \App\Models\Contact::ByActive()->first();
    $socialMedia = \App\Models\SocialMedia::get();
    $productCategory = \App\Models\ProductCategory::ByActive()->limit(5)->get();
@endphp
<footer id="footer" class="footer">
    <div class="container">
        <div class="row col-12">
            <div class="col-8 col-lg-5">
                <img class="logo-icon" src="{{asset('html/assets/LOGO UTAMA PT PANDAFOOD 2.svg')}}" />
                <h5>PT. Pandafood Kreasi Indonesia</h5>
                <h6>{{$contact->address ?? ''}}</h6>
            </div>
            <div class="col-4 col-lg-3 footer-menu-container">
                <a class="footer-menu" href="/company">@lang('navbar.company')</a>
                <a class="footer-menu" href="/product">@lang('navbar.products')</a>
                <ul>
                    @foreach ($productCategory as $category)
                    <li><a class="footer-menu" href="{{url('/product-category/'. $category->slug)}}">{{setProperty($category, 'name')}}</a></li>
                    @endforeach
                </ul>
                <a class="footer-menu" href="/partnership">@lang('navbar.partnership')</a>
                <a class="footer-menu" href="/career">@lang('navbar.career')</a>
            </div>
            <div class="col-12 col-lg-4 footer-qr-container">
                @lang('footer.follow') :
                <div class="container-qr">
                    @foreach ($socialMedia as $media)
                    <a href="{{$media->url}}" target="_blank"><img class="qr-ig" src="{{asset($media->icon)}}" /></a>
                    @endforeach
                </div>
                <div class="container-contact">
                    <span> <img class="icon_email" src="{{asset('html/assets/icon_email.svg')}}" />
                        {{$contact->email ?? ''}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">Copyright © {{date('Y')}}, PT Pandafood Kreasi Indonesia. All rights Reserved</div>
</footer>