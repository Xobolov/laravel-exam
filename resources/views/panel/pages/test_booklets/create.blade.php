@extends('panel.layout.app')

@section('content')

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12 my-auto">
                            <h4 class="mb-2 mb-sm-0 pt-1">
                                <a href="#" >Home Page / Test Booklets</a>
                                <span>/</span>
                                <span>Create</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('pages.test-booklet.store') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Question -->
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="test_booklet">
                    <label for="form1">Title</label>
                </div>

                <select class="mdb-select md-form" name="subject">

                    <option disabled selected value="0">Choose TestBooklet</option>

                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->title}}</option>

                    @endforeach

                </select>

                <button type="submit" class="btn btn-success">Create</button>

            </form>
            <!-- Form -->
        </div>
    </main>

@endsection

@section('script')
    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
@endsection
