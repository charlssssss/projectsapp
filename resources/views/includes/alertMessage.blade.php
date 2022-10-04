@if(session('msg'))
<div class="container w-auto position-fixed bottom-0 end-0 p-3 z-index-100">
    <div class="alert alert-dismissible alert-info">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p class="m-0 ps-1 pe-2"><i class="fa-regular fa-circle-check fs-9"></i> {{session('msg')}}</p>
    </div>
</div>
@endif