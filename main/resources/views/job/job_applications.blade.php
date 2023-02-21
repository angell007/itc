@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Job Applications')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Job Applications')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($job_applications) && count($job_applications))
                        @foreach($job_applications as $job_application)
                        @php
                        $user = $job_application->getUser();
                        $job = $job_application->getJob();
                        $company = $job->getCompany();             
                        $profileCv = $job_application->getProfileCv();
                        @endphp
                        @if(null !== $job_application && null !== $user && null !== $job && null !== $company && null !== $profileCv)
                        <li>
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('applicant.profile', $job_application->id)}}">{{$user->getName()}}</a></h3>
                                        <div class="location"> {{$user->getLocation()}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!--<div class="minsalary">{{$job_application->expected_salary}} {{$job_application->salary_currency}} <span>/ {{$job->getSalaryPeriod('salary_period')}}</span></div>-->
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="listbtn"><a href="{{route('applicant.profile', $job_application->id)}}">{{__('View Profile')}}</a></div>
                                </div>



                                @if($job_application->status=="contratado")
                <div id=""><h3 style="color:blue;">Contratado</h3></div>
                @elseif($job_application->status=="rechazado")
                <div id=""><h3 style="color:red;">Rechazado</h3></div>
                @else
                <div class="con-f con-f-{{$job_application->id}}"><h3 style="color:blue;">Contratado</h3></div>

                <div class="re-f re-f-{{$job_application->id}}"><h3 style="color:red;">Rechazado</h3></div>
                
                <div ><a class=" contra btn mm-{{$job_application->id}} btn-success" data-id="{{$user->id}}" data-compa="{{$company->id}}" data-job="{{$job_application->id}}" id="" href="#">Contratar</a><a id="" class=" recha btn btn-danger mm-{{$job_application->id}}" data-job="{{$job_application->id}}" data-id="{{$user->id}}" href="#">Anular</a></div>
                @endif 


                            </div>
                            <p>{{\Illuminate\Support\Str::limit($user->getProfileSummary('summary'),150,'...')}}</p>
                        </li>
                        <!-- job end --> 
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection



@push('scripts') 
<script>
$('document').ready(function(){

$(".con-f").hide();
$(".re-f").hide();



$(".contra").click(function(){
  


  Swal.fire({
  title: '¿Esta seguro que quiere contratar a este candidato?',
  text: "Luego de contratar a este candidato sera irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'no',
  confirmButtonText: 'Si'
}).then((result) => {
  if (result.isConfirmed) {
   
   
   

            
           
               $.ajax({
                  url: "{{ url('/contratar_emp') }}",
                  method: 'post',
                  data: {
                      id_candidato: $(this).attr('data-id'),
                      id_empresa: $(this).attr('data-compa'),
                      id_job: $(this).attr('data-job'),
                     _token: '{{csrf_token()}}'
                  },
                  success: function(result){

                    $(".mm-"+result).hide();
                    $(".con-f-"+result).show();
                    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Contratado le enviaremos una notificacion al candidato ',
  showConfirmButton: false,
  timer: 2500
})



                  }});
            
         


   
   
  
  }
})
});



});
</script>





<script>
$('document').ready(function(){




$(".recha").click(function(){
  


  Swal.fire({
  title: '¿Esta seguro que quiere rechazar a este candidato?',
  text: "Luego de rechazar a este candidato sera irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'no',
  confirmButtonText: 'Si'
}).then((result) => {
  if (result.isConfirmed) {
   
   
   

            
           
               $.ajax({
                  url: "{{ url('/rechazar_emp') }}",
                  method: 'post',
                  data: {
                      id_job: $(this).attr('data-job'),
                     _token: '{{csrf_token()}}'
                  },
                  success: function(result){

                    $(".mm-"+result).hide();
                    $(".re-f-"+result).show();
                    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Contratado le enviaremos una notificacion al candidato ',
  showConfirmButton: false,
  timer: 2500
})



                  }});
            
         


   
   
  
  }
})
});



});
</script>



@endpush