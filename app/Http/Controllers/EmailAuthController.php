<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Predis\Command\Redis\SAVE;

class EmailAuthController extends Controller
{
    public function generateCode(Request $request)
    {        

        $userId = $request->user()->id;
        $code = random_int(111111, 999999);
        Redis::set("email_auth_code:". $userId, $code);
        Redis::expire("email_auth_code:". $userId, 300);
        
        Mail::to($request->user()->email)->send(new VerificationCodeMail($code)); 

        return response()->json(['message' => 'Código de autenticação gerado com sucesso']);
    }

    public function verifyCode(Request $request)
    {
        $user = $request->user();
        $inputCode = implode($request->input('code'));

        $storedCode = Redis::get("email_auth_code:$user->id");

        if ((int) $inputCode === (int) $storedCode) {
            // Se o código for válido, faça a autenticação do usuário
            $user->email_verified_at =  now();
            $user->save();
            
            Redis::del("email_auth_code:$user->id");

            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
