<?php

namespace App\Http\Controllers;

use App\Models\EventLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /** Mark a single notification (event log entry) as read */
    public function markRead(Request $request, $id)
    {
<<<<<<< HEAD
        EventLog::where('id', $id)
            ->where('notifiable_user_id', Auth::id())
            ->update(['is_read' => true]);
=======
        EventLog::where('Event_Logs_ID', $id)
            ->where('Event_Logs_Notifiable_User_ID', Auth::id())
            ->update(['Event_Logs_isRead' => true]);
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))

        return response()->json(['success' => true]);
    }

    /** Mark all unread notifications for the current user as read */
    public function markAllRead()
    {
<<<<<<< HEAD
        EventLog::where('notifiable_user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);
=======
        EventLog::where('Event_Logs_Notifiable_User_ID', Auth::id())
            ->where('Event_Logs_isRead', false)
            ->update(['Event_Logs_isRead' => true]);
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
