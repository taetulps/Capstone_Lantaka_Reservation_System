<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class EventLogController extends Controller
{
    /**
     * Record a system action in the event log.
     *
     * @param  string      $action            Slug-style action key (e.g. 'account_approved')
     * @param  string      $message           Human-readable description
<<<<<<< HEAD
     * @param  int|null    $actorId           User who performed the action (defaults to Auth::id())
=======
     * @param  int|null    $actorId           Account who performed the action (defaults to Auth::id())
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
     * @param  int|null    $notifiableUserId  Client to notify via the bell (null = audit-only)
     * @param  array       $extra             Optional: ['title', 'type', 'link']
     */
    public static function log(
        string $action,
        string $message,
        ?int   $actorId          = null,
        ?int   $notifiableUserId = null,
        array  $extra            = []
    ): void {
<<<<<<< HEAD
        if (! Schema::hasTable('event_logs')) {
=======
        if (! Schema::hasTable('Event_Logs')) {
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
            return; // Table not yet created — skip silently
        }

        EventLog::create([
<<<<<<< HEAD
            'user_id'            => $actorId ?? Auth::id(),
            'notifiable_user_id' => $notifiableUserId,
            'action'             => strtolower($action),
            'title'              => $extra['title'] ?? null,
            'message'            => $message,
            'type'               => $extra['type']  ?? null,
            'link'               => $extra['link']  ?? null,
            'is_read'            => false,
=======
            'user_id'                        => $actorId ?? Auth::id(),
            'Event_Logs_Notifiable_User_ID'  => $notifiableUserId,
            'Event_Logs_Action'              => strtolower($action),
            'Event_Logs_Title'               => $extra['title'] ?? null,
            'Event_Logs_Message'             => $message,
            'Event_Logs_Type'                => $extra['type']  ?? null,
            'Event_Logs_Link'                => $extra['link']  ?? null,
            'Event_Logs_isRead'              => false,
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
        ]);
    }

    /**
     * Display the event log audit trail (admin / staff view).
     */
    public function index(Request $request)
    {
        $query = EventLog::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
<<<<<<< HEAD
                $q->where('action',   'ILIKE', "%{$search}%")
                  ->orWhere('message', 'ILIKE', "%{$search}%")
                  ->orWhere('title',   'ILIKE', "%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'ILIKE', "%{$search}%"));
=======
                $q->where('Event_Logs_Action',   'ILIKE', "%{$search}%")
                  ->orWhere('Event_Logs_Message', 'ILIKE', "%{$search}%")
                  ->orWhere('Event_Logs_Title',   'ILIKE', "%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('Account_Name', 'ILIKE', "%{$search}%"));
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
            });
        }

        if ($request->filled('action')) {
            $query->where('Event_Logs_Action', strtolower($request->action));
            $query->where('Event_Logs_Action', strtolower($request->action));
        }

<<<<<<< HEAD
        // Default: audit rows only (notifiable_user_id IS NULL)
        // Pass ?show_notifications=1 to include client notification rows too
        if ($request->show_notifications !== '1') {
            $query->whereNull('notifiable_user_id');
=======
        // Default: audit rows only (Event_Logs_Notifiable_User_ID IS NULL)
        // Pass ?show_notifications=1 to include client notification rows too
        if ($request->show_notifications !== '1') {
            $query->whereNull('Event_Logs_Notifiable_User_ID');
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
        }

        $logs = $query->paginate(25)->withQueryString();

        // Build dynamic action list for the filter dropdown
<<<<<<< HEAD
        $actions = EventLog::whereNull('notifiable_user_id')
            ->select('action')
            ->distinct()
            ->orderBy('Event_Logs_Action')
            ->pluck('Event_Logs_Action');

        return view('employee.eventlogs', compact('logs', 'actions'));
    }
}
=======
        $actions = EventLog::whereNull('Event_Logs_Notifiable_User_ID')
            ->select('Event_Logs_Action')
            ->distinct()
            ->orderBy('Event_Logs_Action')
            ->pluck('Event_Logs_Action');

        return view('employee.eventlogs', compact('logs', 'actions'));
    }
}
>>>>>>> 0ea1a0d (SEMI CHANGES (PLS CHECK CODE AND STUDY))
