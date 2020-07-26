@if (Session::has('success'))
<div class="alert alert-success text-center" role="alert">

    {{Session::get('success')}}
</div>
@endif



<script>
    setTimeout(function() {
$('.alert').fadeOut('slow');
}, 3000);
</script>
