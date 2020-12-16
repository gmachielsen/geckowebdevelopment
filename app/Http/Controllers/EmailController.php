<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendPost;

class EmailController extends Controller
{
    public function sendPost(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                ]);

   
                $data = array(
                    'name'=> $request->get('name'),
                    'email'=> $request->get('email'),
                    'mailto'=> $request->get('mailto'),
                    'subject'=> $request->get('subject'),
                    'message' => $request->get('message')
                );
            $emailTo = $request->get('mailto');
            Mail::to($emailTo)->send(new SendPost($data));
            return redirect()->back()->with('message', 'Dit bericht is met succes verzonden');
    }
}
