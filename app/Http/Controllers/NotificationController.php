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
        EventLog::where('id', $id)
            ->where('notifiable_user_id', Auth::id())
            ->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    /** Mark all unread notifications for the current user as read */
    public function markAllRead()
    {
        EventLog::where('notifiable_user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
