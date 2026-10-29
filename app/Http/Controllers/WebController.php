<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class WebController extends Controller
{
    public function index(Request $request) {
    $search = $request->input('search');

    $tasks = Task::when($search, function ($query, $search) {
        return $query->where('nama_tugas', 'like', "%{$search}%");
    })->paginate(5); 

    return view('home', compact('tasks'));
    }
    public function simpan(Request $request){
        $request->validate([
            'tugas' => 'required|min:3'
        ]);
        Task::create([
            'nama_tugas' => $request->input('tugas')
        ]);
        return redirect('/')->with('success', 'Tugas berhasil ditambahkan');
    }
   public function hapus($id){
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect('/')->with('success', 'Tugas berhasil ditambahkan');
    }
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'tugas' => 'required|min:3'
        ]);
        $task = Task::findOrFail($id);
        $task->update([
            'nama_tugas' => $request->input('tugas')
        ]);

        return redirect('/')->with('success', 'Tugas berhasil ditambahkan');
    }
}
