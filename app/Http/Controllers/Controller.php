<?php

namespace App\Http\Controllers;

use App\Actions\MailAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testMail()
    {
        $datas = array('name' => "Virat Gandhi", 'password' => "akanshawapassword", 'email' => "yakubuabioola2003@gmail.com");
        $data = [
            'subject' => 'Cashpally Order',
            'to_name' =>  'Yakubu Damilola',
            'to_email' => 'yakubuabiola2003@gmail.com',
            'to_bcc' => '',
            'to_cc' => '',
            'reply_to' => 'support@mockup.com.ng',
            'text' => 'email text is here without html',
            // 'html_message' => view('welcome_mail')->with(['name' => $data])->render(),
            'o_tag' => 'Important Notification',
            'attachment' => ''
        ];
        return (new MailAction())->fireMail($data);
    }
}
