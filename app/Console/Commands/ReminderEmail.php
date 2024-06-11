<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Illuminate\Console\Command;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class ReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Yearly Reminder Email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mj = Mailjet::getClient();

        $subject = "Web sitesindeki fiyatları değiştirin";
        $textPart = "Merhaba marka legal ekibi. Bu, web sitesindeki fiyatları değiştirmek için bir hatırlatma e-postasıdır.";
        // Mail content
        $body = [
            'FromEmail' => "info@marka.legal",
            'FromName' => "Marka Legal",
            'Subject' => $subject,
            'Text-part' => $textPart,
            'Recipients' => [
                [
                    'Email' => "info@proustpatent.com"
                ],
            ]
        ];
        $response =  $mj->post(Resources::$Email, ['body' => $body]);
        $response["status"] = "success";
        return response()->json($response,200);

    }
}
