
<!-- Add message sent notification -->
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif 