<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherStudentController extends Controller
{
    //
    // Initialize demo data in session (students and assignments)
    protected function ensureDemoData()
    {
        if (!Session::has('students_demo')) {
            $students = [
                ['id' => 1, 'name' => 'أحمد محمد', 'email' => 'ahmed@example.com', 'grade' => 95],
                ['id' => 2, 'name' => 'سارة علي', 'email' => 'sara@example.com', 'grade' => 88],
                ['id' => 3, 'name' => 'محمد حسن', 'email' => 'mohamed@example.com', 'grade' => 92],
            ];
            Session::put('students_demo', $students);
        }

        if (!Session::has('assignments_demo')) {
            $assignments = [
                ['id' => 1, 'name' => 'Math Homework 1', 'description' => 'Algebra and equations', 'submissions' => [1,3]],
                ['id' => 2, 'name' => 'Science Project', 'description' => 'Volcano model', 'submissions' => [2]],
            ];
            Session::put('assignments_demo', $assignments);
        }
    }

    // Main students page with optional search
    public function index(Request $request)
    {
        $this->ensureDemoData();
        $students = collect(Session::get('students_demo'));

        $q = $request->get('q');
        if ($q) {
            $students = $students->filter(function ($s) use ($q) {
                return stripos($s['name'], $q) !== false || stripos($s['email'], $q) !== false;
            })->values();
        }

        // determine submission status (if student submitted any assignment)
        $assignments = collect(Session::get('assignments_demo'));
        $submittedIds = [];
        foreach ($assignments as $a) {
            foreach ($a['submissions'] as $sid) {
                $submittedIds[$sid] = true;
            }
        }

        return view('student', [
            'students' => $students,
            'submittedIds' => $submittedIds,
            'q' => $q,
        ]);
    }

    // Add student (simple demo, stores in session)
    public function store(Request $request)
    {
        $this->ensureDemoData();
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        $students = collect(Session::get('students_demo'));
        $next = $students->max('id') + 1;
        $students->push(['id' => $next, 'name' => $data['name'], 'email' => $data['email'], 'grade' => null]);
        Session::put('students_demo', $students->toArray());
        return redirect()->route('teacher.students');
    }

    // Remove student
    public function destroy($id)
    {
        $this->ensureDemoData();
        $students = collect(Session::get('students_demo'))->reject(function ($s) use ($id) {
            return $s['id'] == $id;
        })->values();
        Session::put('students_demo', $students->toArray());
        return redirect()->route('teacher.students');
    }

    // Show results form for a student (GET) and update grade (POST handled by updateResults)
    public function results($id)
    {
        $this->ensureDemoData();
        $students = collect(Session::get('students_demo'));
        $student = $students->firstWhere('id', (int)$id);
        if (!$student) {
            abort(404);
        }
        return view('student_results', ['student' => $student]);
    }

    public function updateResults(Request $request, $id)
    {
        $this->ensureDemoData();
        $data = $request->validate([
            'grade' => 'nullable|numeric|min:0|max:100',
        ]);
        $students = collect(Session::get('students_demo'));
        $students = $students->map(function ($s) use ($id, $data) {
            if ($s['id'] == $id) {
                $s['grade'] = $data['grade'];
            }
            return $s;
        })->values();
        Session::put('students_demo', $students->toArray());
        return redirect()->route('teacher.students.results', ['id' => $id])->with('status', 'Grade updated');
    }

    // List assignments overview
    public function assignments()
    {
        $this->ensureDemoData();
        $assignments = collect(Session::get('assignments_demo'));
        $students = collect(Session::get('students_demo'));
        return view('student_assignments', ['assignments' => $assignments, 'students' => $students]);
    }

    // Show a single assignment submissions (homeworks/{id})
    public function homeworks($id)
    {
        $this->ensureDemoData();
        $assignments = collect(Session::get('assignments_demo'));
        $assignment = $assignments->firstWhere('id', (int)$id);
        if (!$assignment) {
            abort(404);
        }
        $students = collect(Session::get('students_demo'));
        return view('student_assignments', ['assignments' => collect([$assignment]), 'students' => $students]);
    }

    // Toggle submission for a student on an assignment (POST)
    public function toggleSubmission(Request $request)
    {
        $this->ensureDemoData();
        $data = $request->validate([
            'assignment_id' => 'required|integer',
            'student_id' => 'required|integer',
        ]);
        $assignments = collect(Session::get('assignments_demo'));
        $assignments = $assignments->map(function ($a) use ($data) {
            if ($a['id'] == $data['assignment_id']) {
                $subs = collect($a['submissions']);
                if ($subs->contains($data['student_id'])) {
                    $subs = $subs->reject(fn($s) => $s == $data['student_id'])->values();
                } else {
                    $subs->push($data['student_id']);
                }
                $a['submissions'] = $subs->toArray();
            }
            return $a;
        })->values();
        Session::put('assignments_demo', $assignments->toArray());
        return back();
    }

}
