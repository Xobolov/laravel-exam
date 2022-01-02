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

                        <div class="col-md-6 my-auto">
                            <h4 class="mb-2 mb-sm-0 pt-1">
                                <a href="#" >Home Page</a>
                                <span>/</span>
                                <span>Exam Booklets</span>
                            </h4>
                        </div>

                        <div class="col-md-4 my-auto">
                            <form class="d-flex justify-content-center">
                                <!-- Default input -->
                                <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="col-md-1 text-center pt-lg-0 pt-md-0 pt-sm-3">
                            <a href="{{route('pages.exam-booklet.create')}}"><button type="button" class="btn btn-success btn-md btn-rounded waves-effect">Insert</button></a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="table-responsive text-nowrap">

                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Exam</th>
                        <th scope="col">Test Booklet</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($exam_booklets as $exam_booklet)

                        <tr>
                            <th scope="row">{{ $exam_booklet->id }}</th>
                            <td>{{ $exam_booklet->exam->title }}</td>
                            <td>{{ $exam_booklet->test_booklet->title }}</td>
                            <td><a href="{{route('pages.exam-booklet.edit', $exam_booklet->id)}}"><button type="button" class="btn btn-outline-primary btn-rounded waves-effect">Update</button></a></td>
                            <td>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-rounded waves-effect">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>



        </div>
    </main>
    <!--Main layout-->

@endsection
