<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('index')->with('members', $members);
    }

    public function create(Request $request){
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membershipType;
        $member->membership_expiration_date=$request->membershipExpirationDate;
        $member->save();
        return redirect()->route('create')->with('success', 'New member added!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'membership_type' => 'required|string',
            'membership_expiration' => 'required|date',
        ]);

        Member::create($validatedData);

        return redirect()->route('index');
    }

    public function edit(Member $member)
    {
        return view('edit', compact('member'));
    }

    public function update(Request $request, $member)
    {
        $member = Member::find($request->id);
        $member->name = $request->name; 
        $member->email = $request->email; 
        $member->membership_type = $request->membershipType;
        $member->membership_expiration_date=$request->membershipExpirationDate;
        $member->save();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email,'.$member->id,
            'membership_type' => 'required|string',
            'membership_expiration' => 'required|date',
        ]);

        $member->update($validatedData);

       return redirect()->route('index')->with('success','Members Updated!'); 
        
    }

    public function destroy($member)
    {
        $member = Member::find($member);
        $member->delete();
        return redirect()->route('index');
    }
}
