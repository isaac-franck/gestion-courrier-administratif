<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = $user->notifications();

        if ($request->filled('date')) {
            $query->whereDate(
                'created_at',
                $request->input('date')
            );
        }

        $notifications = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
     * Nombre de notifications non lues
     */
    $nombreNonLues = $user
        ->unreadNotifications()
        ->count();


         /*
     * Notifications récentes :
     * ici, nous considérons comme récente une notification
     * reçue au cours des dernières 24 heures.
     */
    $nombreRecentes = $user
        ->notifications()
        ->where('created_at', '>=', now()->subDay())
        ->count();

        return view('notifications.index', [
            'notifications' => $notifications,
            'date' => $request->input('date'),
            'nombreNonLues' => $nombreNonLues,
        'nombreRecentes' => $nombreRecentes,
        ]);
    }

    /**
     * Consulter une notification.
     */
    public function show(string $notification)
    {
        $user = Auth::user();

        /*
         * IMPORTANT :
         * On recherche la notification uniquement
         * parmi celles appartenant à l'utilisateur connecté.
         */
        $notification = $user->notifications()
            ->where('id', $notification)
            ->firstOrFail();

        /*
         * Une notification consultée devient automatiquement lue.
         */
        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('notifications.show', [
            'notification' => $notification,
        ]);
    }
}