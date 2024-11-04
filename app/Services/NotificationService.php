<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Usuario;
use App\Models\Manutencao;
use Carbon\Carbon;

class NotificationService
{
    public function createNotification(Usuario $user, string $type, string $message)
    {
        return Notification::create([
            'user_id' => $user->id,
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function getUnreadNotifications(Usuario $user)
    {
        return $user->notifications()->where('read', false)->get();
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['read' => true]);
    }

    public function generateMaintenanceNotifications()
    {
        $manutencoes = Manutencao::where('data_programada', '>=', Carbon::now())
            ->where('data_programada', '<=', Carbon::now()->addDays(7))
            ->whereNull('data_realizada')
            ->get();

        foreach ($manutencoes as $manutencao) {
            $diasRestantes = Carbon::now()->diffInDays($manutencao->data_programada, false);

            if ($diasRestantes <= 3 && $diasRestantes >= 0) {
                $this->createMaintenanceNotification($manutencao, 'próxima', $diasRestantes);
            } elseif ($diasRestantes < 0) {
                $this->createMaintenanceNotification($manutencao, 'atrasada', abs($diasRestantes));
            }
        }
    }

    private function createMaintenanceNotification(Manutencao $manutencao, string $tipo, int $dias)
    {
        $message = $tipo === 'próxima' 
            ? "Manutenção programada para daqui a {$dias} dias"
            : "Manutenção atrasada há {$dias} dias";

        $user = Usuario::find($manutencao->tecnico_id);

        if ($user) {
            $this->createNotification($user, 'manutencao_' . $tipo, $message);
        }
    }
}
