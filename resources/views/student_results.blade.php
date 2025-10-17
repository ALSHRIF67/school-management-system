@extends('frotend.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">نتائج الطالب: {{ $student['name'] }}</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('teacher.students.results.update', ['id' => $student['id']]) }}">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">الدرجة</label>
                    <div class="col-sm-4">
                        <input type="number" name="grade" value="{{ $student['grade'] }}" min="0" max="100" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary">حفظ</button>
                <a href="{{ route('teacher.students') }}" class="btn btn-secondary">عودة</a>
            </form>
        </div>
    </div>
</div>
@endsection
