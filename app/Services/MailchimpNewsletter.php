<?php

declare(strict_types=1);

namespace App\Services ;

use MailchimpMarketing\ApiClient ;


class MailchimpNewsletter implements Newsletter {

    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe($email,?string $list=null){

        $list??=config('services.mailchimp.list.laracasts');

        request()->validate([
                'email'=>'email'
            ]);

        return $this->client->lists->addListMember($list,[
            'email_address'=>$email,
            'status'=>'subscribed'
        ]);

    }

}
