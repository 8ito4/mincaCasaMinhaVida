<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthdayWishes; // Importe a classe de email BirthdayWishes
use App\Models\User;

class SendBirthdayWishes extends Command
{
    protected $signature = 'send:birthday-wishes';
    protected $description = 'Enviar desejos de aniversário aos usuários no dia do aniversário às 6h da manhã.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Verifique se é o dia do aniversário e a hora é 6:00 da manhã
            // if ($user->birthdate == now()->format('Y-m-d') && now()->format('H') == '20:25') {
                Mail::to($user->email)->send(new BirthdayWishes($user));
            // }
        }

        $this->info('Desejos de aniversário enviados com sucesso.');
    }
}
