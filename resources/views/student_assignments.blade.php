@extends('frotend.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">الواجبات</h2>

    @foreach($assignments as $a)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $a['name'] }}</h5>
            <p class="text-muted">{{ $a['description'] }}</p>
            <h6>حالة التسليم</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالب</th>
                        <th>البريد</th>
                        <th>تم التسليم</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                    <tr>
                        <td>{{ $s['id'] }}</td>
                        <td>{{ $s['name'] }}</td>
                        <td>{{ $s['email'] }}</td>
                        <td>
                            @if(in_array($s['id'], $a['submissions']))
                                <span class="text-success">نعم</span>
                            @else
                                <span class="text-danger">لا</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('teacher.students.toggleSubmission') }}">
                                @csrf
                                <input type="hidden" name="assignment_id" value="{{ $a['id'] }}">
                                <input type="hidden" name="student_id" value="{{ $s['id'] }}">
                                <button class="btn btn-sm btn-outline-primary">تبديل</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>
@endsection
