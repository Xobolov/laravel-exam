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
                                <span>Edit</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('pages.exam-booklet.store', $exam_booklets->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Exams -->
            <select class="mdb-select md-form" name="exam">

                <option disabled selected value="0">{{$exam_booklets->exam->title}}</option>

                @foreach ($exams as $exam)

                    <option value="{{$exam->id}}">{{$exam->title}}</option>

                @endforeach

            </select>

            <!-- Test Booklets -->
            <select class="mdb-select md-form" name="test_booklet">

                <option disabled selected value="0">{{$exam_booklets->test_booklet->title}}</option>

                @foreach ($test_booklets as $test_booklet)

                    <option value="{{$test_booklet->id}}">{{$test_booklet->title}}</option>

                @endforeach

            </select>

                <button type="submit" class="btn btn-success">Edit</button>

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



