<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmployerDetail;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDataTable\EmployerListingDataTable;
use App\DataTables\AdminDataTable\CandidateListingDataTable;

class AdminController extends Controller
{
    public function showDetails(EmployerListingDataTable $datatable)
    {
        return $datatable->render('Admin.employerlist');
    }

    public function adminProfile($id)
    {
        $admin = User::where('id', $id)->first();
        return view('admin.profile-update', compact('admin'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8',
        'confirm_password' => 'required|string|same:password',
    ]);

    $user = User::find($id);
    
    if (!$user) {

        return redirect()->route('home')->with('error', 'User not found');
    }

    $user->first_name = $request->input('first_name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->save();

    return redirect()->route('home')->with('success', 'Profile updated successfully');
}

    public function showCandidateList(CandidateListingDataTable $datatable)
    {
        return $datatable->render('Admin.candidatelist');
    }

    public function updateStatus(Request $request, $id)
    {
        $employer = EmployerDetail::find($id);
        if ($employer) {
            $newStatus = $request->input('status');
            $employer->update(['status' => $newStatus]);

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Employer not found']);
        }
    }

}
