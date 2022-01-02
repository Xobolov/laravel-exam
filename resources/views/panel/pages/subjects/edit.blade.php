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
                                <a href="#" >Home Page / Choice</a>
                                <span>/</span>
                                <span>Edit</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('pages.subject.update', $subjects->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Question -->
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="subject_title" value="{{$subjects->title}}">
                    <label for="form1">Title</label>
                </div>

                <button type="submit" class="btn btn-success">Edit</button>

            </form>
            <!-- Form -->
        </div>
    </main>

@endsection

@section('script')

@endsection



