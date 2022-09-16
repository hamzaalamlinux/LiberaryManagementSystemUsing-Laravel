<div id="second">
    <div class="myform form ">
        <div class="logo mb-3">
            <div class="col-md-12 text-center">
                <h1 >Signup</h1>
            </div>
        </div>
        <form action="{{route('register')}}" method="post" name="registration">
            {{ csrf_field() }}
            @include('layouts.pages.Errors.ValidationError')
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text"  name="name" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
            </div>
            <div class="col-md-12 text-center mb-3">
                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Get Started</button>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                    <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
