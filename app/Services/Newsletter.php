<?php

declare(strict_types=1);

namespace App\Services ;

use MailchimpMarketing\ApiClient ;


interface Newsletter {

    public function subscribe($email,?string $list=null);

}
