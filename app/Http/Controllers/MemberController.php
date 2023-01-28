<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\Membership;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('index')->with('members', $members);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'membership_type' => 'required|string',
            'membership_expiration' => 'required|date',
            'trainer_id' => 'required|integer',

        ]);
        $member = new Member;
        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->membership_type = $validatedData['membership_type'];
        $member->membership_expiration = $validatedData['membership_expiration'];
        $member->trainer_id = $validatedData['trainer_id'];
        $member->save();
        return redirect()->route('index')->with('success', 'New member added!');
    }

    
    public function edit($id)
    {
        $member = Member::find($id);
        $trainers = Trainer::all();
        return view('members.edit', ['member' => $member, 'trainers' => $trainers]);  
    }

public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email,'.$request->id,
            'membership_type' => 'required|string',
            'membership_expiration' => 'required|date',
            'trainer_id' => 'required|exists:trainers,id'
        ]);

        $member = Member::find($request->id);
        $member->update($validatedData);
        $member->trainer_id = $request->trainer_id;
        $member->save();

        return redirect()->route('index')->with('success','Members Updated!'); 
    }
    public function destroy($member)
    {
        $member = Member::find($member);
        $member->delete();
        return redirect()->route('index');
    }

    public function trainer($id)
{
    $member = Member::find($id);
    $trainer = Trainer::all();
    $trainer = $member->trainer;

    return view('trainer')->with(['member' => $member, 'trainer' => $trainer]);
}
public function membership($id)
{
    $member = Member::find($id);
    $membership = Membership::all();
    $membership = $member->membership;
    return view('membership', ['member' => $member, 'membership' => $membership]);
}
}
