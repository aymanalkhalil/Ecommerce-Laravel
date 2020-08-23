@section('title','Login')

@include('public.includes_public.header')


<div class="breadcumb_area bg-img" style="background-image: url({{ asset('essence/img/bg-img/breadcumb.jpg')}})">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Sign-in</h2>

                </div>
                <?php
                // if (!isset($_SESSION['User_id'])) {
                //     echo "<div style='text-align:center' class='btn-danger'> Sorry ! You have to Register/Login </div>";
                // } else {
                //     echo "<div style='text-align:center' class='btn-primary'> You already Logged in </div>";
                // }
                ?>
            </div>

        </div>

    </div>

</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 ">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading mb-30">
                        <h5>Login</h5>

                    </div>
                    @include('public.includes_public.alerts.messages')
                    <form action="login" method="post">
                        @csrf



                        <div class="col-md-12 mb-3 ">
                            <label for="first_name">Email <span>*</span></label>
                            <input type="text" value="{{ old('email') }}" class="form-control" name='email'>
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="Password"> Password <span>*</span></label>
                            <input type="password" value="{{ old('password') }}" class="form-control" name='password'>
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn essence-btn" name="submit-in" value="Sign-in">
                            <a class="pull-right" href="{{ route('register')}}">Register Now </a>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
@include('public.includes_public.footer')
