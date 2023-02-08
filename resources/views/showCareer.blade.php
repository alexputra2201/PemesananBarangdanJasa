@extends('layouts.mainCareer')


@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <a href="/career" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    careers</a>
                <a href="/career/create" class="btn btn-primary">Apply career</a>

                <article class="my-3 fs-6">
                    {!! $career->description_career !!}
                </article>

            </article>

        </div>
    </div>
</div>

@endsection