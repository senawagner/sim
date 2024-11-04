@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Suas Notificações</h2>
    @if($notifications->count() > 0)
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item {{ $notification->read ? 'bg-light' : '' }}">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $notification->type }}</strong>
                            <p>{{ $notification->message }}</p>
                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        @if(!$notification->read)
                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-primary">Marcar como lida</button>
                            </form>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Você não tem notificações.</p>
    @endif
</div>
@endsection
