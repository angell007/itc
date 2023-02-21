<!--Footer-->
<div class="largebanner shadow3">
    <div class="adin">

        <div class="row">
            <div class="col-4 ">
                <img style="height: 50px;" src="https://www.mintrabajo.gov.co/documents/20147/193631/logo-buscador%5B1%5D.png/6445203c-8738-0cb3-b2ee-4b6db7be3a43?t=1500597188583" alt="">
            </div>
            <div class="col-4 ">
                <img style="height: 50px;" src="https://upload.wikimedia.org/wikipedia/commons/6/6a/MinTrabajo_%28Colombia%29_logo.png" alt="">
            </div>
            <div class="col-4 ">
                <img style="height: 50px;" src="{{asset('images/logo.jpg')}}" alt="">
            </div>
        </div>

        <!-- {!! $siteSetting->above_footer_ad !!} -->

    </div>
    <div class="clearfix"></div>
</div>


<div class="footerWrap">
    <div class="container">
        <div class="row">

            <!--Quick Links-->
            <div class="col-md-4 col-sm-12">
                <!--  <h5>{{__('Quick Links')}}</h5>
                <!--Quick Links menu Start-->
                <!--  <ul class="quicklinks">
                    <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                    <li><a href="{{ route('contact.us') }}">{{__('Contact Us')}}</a></li>
                    <li class="postad"><a href="{{ route('post.job') }}">{{__('Post a Job')}}</a></li>
                  

                </ul>-->
                <div style="color: #ccc;text-align: justify;padding: 0.5px;line-height: 1.5;">
                   <a style="color:#fff" href="{{asset('documents/RES 0205 AUTORIZACIÓN ETITC.pdf')}}" target="_blank"
                   >  {{__('Linked to the network of providers of the Public Employment Service. Authorized by the Special Administrative Unit of the Public Employment Service according to Resolution No. [xxxx] of [day] of [month] 2021. Terms and conditions')}} </a>
                </div>
                
                 
                 
            </div>
            <!--Quick Links menu end-->




            <!--About Us-->
            <div class="col-md-4 col-sm-12">
                <h5>{{__('Contact Us')}}</h5>
                <div class="address">{{ $siteSetting->site_street_address }}</div>
                <div class="email"> <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a> </div>
                <div class="phone"> <a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></div>
               
                <!-- Social Icons end -->

            </div>
            <!--About us End-->
            
            
            <!--About Us-->
            <div class="col-md-4 col-sm-12">
                <h5>Redes Sociales</h5>
                <!-- Social Icons -->
                <div class="social">@include('includes.footer_social')</div>
                <!-- Social Icons end -->
            <div class="my-3">
                    <a style="color:#fff; text-decoration: underline white; cursor:pointer " href="{{asset('documents/MVO.pdf')}}" target="_blank"> Nuestra Misión y Visión</a>
                 
                  
                 
                 </div>
            <div class="my-3">

                    <a class="my-2" style="color:#fff" href="{{asset('documents/Resolución Rectoría 183 junio 09 de 2021 Bolsa Empleo.pdf')}}" target="_blank"
                   >Reglamento Bolsa de Empleo</a>
                
                 
                 </div>
            </div>
            <!--About us End-->


        </div>
    </div>
</div>
<!--Footer end-->
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bttxt">{{__('Copyright')}} &copy; {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}. </div>
            </div>

        </div>

    </div>
</div>