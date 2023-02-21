<!-- Modal -->
@if($showModal)
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content transparent">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="{{asset('/file/' . $banner)}}" class="card-img-top" alt="...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif

<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop">
            <h3>{{__('Featured')}} <span>{{__('Jobs')}}</span></h3>
        </div>
        <!-- title end --> 

        <!--Featured Job start-->
        <ul class="jobslist row">
            @if(isset($featuredJobs) && count($featuredJobs))
            @foreach($featuredJobs as $featuredJob)
            <?php $company = $featuredJob->getCompany(); ?>
            @if(null !== $company)
            <!--Job start-->
            <li class="col-md-6">
                <div class="jobint">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">
                                {{$company->printCompanyImage()}}
                            </a>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <h4><a href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">{{$featuredJob->title}}</a></h4>
                            <div class="company"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                            <div class="jobloc">
                                <label class="fulltime" title="{{$featuredJob->getJobType('job_type')}}">{{$featuredJob->getJobType('job_type')}}</label> - <span>{{$featuredJob->getCity('city')}}</span></div>
                        </div>
                        <div class="col-lg-3 col-md-3"><a href="{{route('job.detail', [$featuredJob->slug])}}" class="applybtn">{{__('View Detail')}}</a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
            @endif

        </ul>
        <!--Featured Job end--> 

        <!--button start-->
        <div class="viewallbtn"><a href="{{route('job.list', ['is_featured'=>1])}}">{{__('View All Featured Jobs')}}</a></div>
        <!--button end--> 
    </div>
</div>