<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Yajra\DataTables\Html\Builder;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query(); // Use query builder for potential filtering or sorting
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return view('components.action-buttons', [
                        'model' => $user,
                        'form_url' => route('users.destroy', $user->id),
                        'edit_url' => route('users.edit', $user->id),
                        'confirm_message' => 'Anda Yakin Ingin Menghapus?',
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        $users = User::all(); // Fetch all users for initial view rendering
    
        return view('modules.user.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        // Store flash message in session
        $message = 'Data Pengguna Berhasil Ditambahkan';
        $alertType = 'success';
        Session::flash('flash_message', compact('message', 'alertType'));
    
        return redirect()->route('users.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validate data (if applicable)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        // Add additional validation rules based on your requirements
    ]);

    // 2. Find the user to update
    $user = User::findOrFail($id);

    // 3. Update user data
    $user->update($validatedData); // Adjust `$validatedData` based on your validation setup

    // 4. Perform additional actions (optional)
    if ($request->has('send_notification')) {
        // Send notification logic here
    }

    // 5. Return success response
    return response()->json([
        'message' => 'User updated successfully!',
        // Optionally include updated user data or other relevant information
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user to delete
    $user = User::findOrFail($id);

    // Check if user can be deleted based on your logic (optional)
    if (!$user->canBeDeleted()) {
        return response()->json(['error' => 'User cannot be deleted.'], 403);
    }

    // Delete the user
    $user->delete();

    // Return success response
    return response()->json(['message' => 'User deleted successfully!']);
    }
}
