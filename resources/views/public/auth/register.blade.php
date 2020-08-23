@section('title','Register')

@include('public.includes_public.header')


<div class="breadcumb_area bg-img" style="background-image: url({{ asset('essence/img/bg-img/breadcumb.jpg')}})">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Sign-up</h2>

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

            <div class="col-12 col-md-12">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading mb-30">
                        <h5>Sign-Up</h5>
                    </div>
                    @include('public.includes_public.alerts.messages')
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Username <span>*</span></label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name='name'>
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Password"> Password <span>*</span></label>
                                <input type="password" class="form-control" name='password'>
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" value="{{ old('email') }}" id="Email"
                                    name="email">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="text" class="form-control" value="{{ old('mobile_no') }}" name='mobile_no'
                                    min="0">
                                @error('mobile_no')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Address <span>*</span></label>
                                <input type="text" value="{{ old('address') }}" class="form-control mb-3"
                                    name='address'>
                                @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <div class="col-12 mb-4">

                                <input type="submit" class="btn essence-btn" name="submit-Up" id="btnSubmit"
                                    value="Sign-Up">

                                <a class="pull-right" href="{{ route('get_login')}}">Already have account?</a>
                            </div>


                        </div>
                        @include('public.includes_public.alerts.messages')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('public.includes_public.footer')
