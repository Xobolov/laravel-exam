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
                                <a href="#" >Home Page / Exams</a>
                                <span>/</span>
                                <span>Create</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('pages.exam.store') }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Question -->
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="exam_title">
                    <label for="form1">Title</label>
                </div>

                <div class="md-form">
                    <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker" name="date">
                    <label for="date-picker-example">Select Date...</label>
                </div>

                <button type="submit" class="btn btn-success">Create</button>

            </form>
            <!-- Form -->
        </div>
    </main>

@endsection

@section('script')
    <script>
        // Data Picker Initialization
        $('.datepicker').pickadate({format: 'yyyy-mm-dd'});
    </script>
@endsection
