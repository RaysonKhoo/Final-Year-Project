<?php

namespace App\Http\Controllers;
use App\Models\Announcement; // Make sure to import the Announcement model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    function AddAnnouncement()
    {
        $announcements = Announcement::all(); // Assuming you have an Announcement model
        return view('dashboard_page.staff.announcement', compact('announcements'));
    }
    function storeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);
        $staff_id = auth()->id(); // Get the authenticated user's ID
        $announcements = new Announcement();
        $announcements->title = $request->input('title');
        $announcements->content = $request->input('content');
        $announcements->published_at = $request->input('published_at');
        $announcements->staff_id = $staff_id;
        $announcements->save();
        return redirect()->route('Annoucenment')->with('success', 'Announcement has created.');
    }
    function AnnouncementList()
    {
        $announcements = Announcement::all();
        return view('dashboard_page.staff.annoucementlist', compact('announcements'));
    }
    function edit($id)
    {
        $announcements = Announcement::find($id);
        return view('dashboard_page.staff.edit_announcement', compact('announcements'));

    }
    function update(Request $request, $id)
    {
        $announcements = Announcement::find($id);
        $announcements->title = $request->input('title');
        $announcements->content = $request->input('content');
        $announcements->published_at = $request->input('published_at');
        $announcements->update();
        return redirect()->route('announcement.post')->with('success', 'Announcement updated successfully');
    }
    function deleted(Request $request)
    {
        Announcement::where('id',$request->id)->delete();
        return redirect()->route('announcement.post')->with('success', 'Parcel has been Remove');
    }
}
