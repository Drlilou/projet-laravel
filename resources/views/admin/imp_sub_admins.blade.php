
<section  style="border-style: ridge;padding: 37px;">
    <div class="container py-5">

        <div class="form"
             >


            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-12">
                <h1 class="page-header"

                >Profile</h1>
            </div>








        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">

                    </ol>
                </nav>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-9">
                                <span class="sign__text">Fname :  <a>{{ $p['fname'] }} </a></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">Lname:  <a>{{ $p['lname'] }}</a></span>

                            </div>
                        </div>

                        <hr>
                        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">username:  <a>{{ $p['username'] }}</a></span>

                            </div>
                        </div>
                        <hr>        <div class="row">

                            <div class="col-sm-9">

                                <span class="sign__text">Email:  <a>{{ $p['email'] }}</a></span>

                            </div>
                        </div>
                        <hr>   <div class="row">

                            <div class="col-sm-9">
                                <span class="sign__text">password: <a>{{ $p['password'] }}</a></span>
                            </div>
                        </div>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</section>
<button onclick="window.print()">Print this page</button>
