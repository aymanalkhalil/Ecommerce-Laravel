@if (Session::has('error'))
<div class="alert alert-danger text-center " role="alert">

    {{Session::get('error')}}
</div>
@endif


<script>
    setTimeout(function() {
$('.alert').fadeOut('slow');
}, 3000);
</script>
