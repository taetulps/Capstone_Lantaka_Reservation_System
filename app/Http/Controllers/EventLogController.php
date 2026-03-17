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
     * @param  int|null    $actorId           User who performed the action (defaults to Auth::id())
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
        if (! Schema::hasTable('event_logs')) {
            return; // Table not yet created — skip silently
        }

        EventLog::create([
            'user_id'            => $actorId ?? Auth::id(),
            'notifiable_user_id' => $notifiableUserId,
            'action'             => strtolower($action),
            'title'              => $extra['title'] ?? null,
            'message'            => $message,
            'type'               => $extra['type']  ?? null,
            'link'               => $extra['link']  ?? null,
            'is_read'            => false,
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
                $q->where('action',   'ILIKE', "%{$search}%")
                  ->orWhere('message', 'ILIKE', "%{$search}%")
                  ->orWhere('title',   'ILIKE', "%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'ILIKE', "%{$search}%"));
            });
        }

        if ($request->filled('action')) {
            $query->where('action', strtolower($request->action));
        }

        // Default: audit rows only (notifiable_user_id IS NULL)
        // Pass ?show_notifications=1 to include client notification rows too
        if ($request->show_notifications !== '1') {
            $query->whereNull('notifiable_user_id');
        }

        $logs = $query->paginate(25)->withQueryString();

        // Build dynamic action list for the filter dropdown
        $actions = EventLog::whereNull('notifiable_user_id')
            ->select('action')
            ->distinct()
            ->orderBy('action')
            ->pluck('action');

        return view('employee.eventlogs', compact('logs', 'actions'));
    }
}