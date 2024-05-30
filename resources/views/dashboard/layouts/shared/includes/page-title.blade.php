<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0" id="sidebar-span">{{__($pagetitle)}}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($link))
                    <li class="breadcrumb-item"><a href="{{$link}}">{{__($pagetitle)}}</a></li>
                    @else
                    <li class="breadcrumb-item"><a>{{__($pagetitle)}}</a></li>
                    @endif
                    <li class="breadcrumb-item active">{{__($title)}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->