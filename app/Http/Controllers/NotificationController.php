<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $this->notificationService->markAsRead($notification);
        return redirect()->back()->with('success', 'Notificação marcada como lida.');
    }

    public function generate()
    {
        $this->notificationService->generateMaintenanceNotifications();
        return redirect()->back()->with('success', 'Notificações de manutenção geradas com sucesso.');
    }
}
