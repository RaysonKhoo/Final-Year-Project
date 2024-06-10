<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    function Feedbackform()
    {
        $user = Auth::user();
        $info['user']=$user;
        return view('dashboard_page.user.feedbackform',$info);
    }
    function Feedbackstore(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^[0-9]{10,}$/', // Assumes a 10-digit phone number
            'subject' => 'required|in:General Inquiry,Feedback',
            'content' => 'required|string|min:5',
        ], [
            'name.required' => 'Name cannot empty',
            'name.min' => 'Name Must Be at Least 5 Characters',
            'email.required' => 'email cannot empty',
            'subject.required' => 'subject must be selected',
            'subject.in' => 'invalid subject selection',
            'phone_number.required' => 'Phone Number Must Be Filled In',
            'phone_number.regex' => 'Invalid Phone Number Format (e.g., 1234567890)',
            'content.required' => 'Content cannot be empty',
            'content' => 'content should be more than 5 words.'
        ]);
        $user_id = auth()->id(); // Get the authenticated user's ID
        $Feedback = new Feedback();
        $Feedback->name = $request->input('name');
        $Feedback->email = $request->input('email');
        $Feedback->phone_number = $request->input('phone_number');
        $Feedback->content = $request->input('content');
        $Feedback->subject = $request->input('subject');
        $Feedback->user_id = $user_id;

        $Feedback->save();
        return redirect()->route('Feedbackform')->with('success', 'your Feedback has been received by us. we will reply you as soon as possible');
    }
    function Feedbacklist()
    {
        $user = Auth::user();
        $Feedback = Feedback::where('User_id', $user->id)->get();
        return view('dashboard_page.user.feedbacklist', ['Feedback' => $Feedback]);
    }
    function edit($id)
    {
        $Feedback = Feedback::find($id);
        return view('dashboard_page.user.feedbackedit', compact('Feedback'));
    }
   function update(Request $request, $id)
{
    // Validate the input data
    $request->validate([
        'name' => 'required|min:5',
        'email' => 'required|email',
        'phone_number' => 'required|regex:/^[0-9]{10,}$/', // Assumes a 10-digit phone number
        'subject' => 'required|in:General Inquiry,Feedback',
        'content' => 'required|min:5',
    ], [
        'name.required' => 'Name cannot be empty',
        'name.min' => 'Name must be at least 5 characters',
        'email.required' => 'Email cannot be empty',
        'subject.required' => 'Subject must be selected',
        'subject.in' => 'Invalid subject selection',
        'phone_number.required' => 'Phone Number must be filled in',
        'phone_number.regex' => 'Invalid Phone Number Format (e.g., 01234567890)',
        'content.required' => 'Content cannot be empty',
        'content.min' => 'Content should be at least 5 characters.',
    ]);

    // Find the feedback record by ID
    $Feedback = Feedback::find($id);

    if (!$Feedback) {
        return redirect()->route('Feedback.list')->with('error', 'Feedback not found');
    }
    $Feedback->name = $request->input('name');
    $Feedback->email = $request->input('email');
    $Feedback->phone_number = $request->input('phone_number');
    $Feedback->content = $request->input('content');
    $Feedback->subject = $request->input('subject');
    // Update the feedback record with the edited data
    $Feedback->save();

    // Redirect back to the feedback list or show page
    return redirect()->route('Feedback.list')->with('success', 'Feedback updated successfully');
}
    function deleted(Request $request, $id)
    {
        Feedback::where('id',$request->id)->delete();
        return redirect()->route('Feedback.list')->with('success', 'Feedback has been deleted');
    }
    function Feedbackliststaff()
    {
        $Feedback = Feedback::All();
        return view('dashboard_page.staff.feedbacklist', compact('Feedback'));
    }
    function Feedbackreply(Request $request,$id)
    {
        $request->validate([
            'reply' => 'required|string|max:255',
        ],[
            'reply.required' => 'The reply message is required.',
            'reply.max' => 'The reply message must not exceed 255 characters.',
        ]);

        $Feedback = Feedback::find($id);
        if (!$Feedback) {
            return back()->with('error', 'Feedback not found with ID ' . $id);
        }
        $staff_id = auth()->id(); // Get the authenticated staff's ID
        $Feedback->reply =$request->input('reply');
        $Feedback->staff_id = $staff_id;
        $Feedback->save();

        return redirect()->route('Feedbackstaff.list')->with('success', 'Feedback reply submitted successfully');

    }
}
