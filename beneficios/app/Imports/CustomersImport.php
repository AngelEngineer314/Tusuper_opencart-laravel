<?php

namespace App\Imports;

use App\User;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        $card_number = $this->generateCode(16);
        $isCardNumber = $this->isCardNumber($card_number);
        $security_number = $this->generateCode(4);

        // while($isCardNumber == 1) {
            if ($isCardNumber == 1) {
                // $card_number = $this->generateCode(16);
            
                return new Customer([
                    'password'          => 'fbd8c45fc9fb9e1caaf301d7d2beea78f8ddea6c',
                    'salt'              => 'nSttZys4t',
                    'language_id'       => 1,
                    'firstname'         => $row['firstname'],
                    'lastname'          => $row['lastname'],
                    'email'             => $row['email'],
                    'card_number'       => $card_number,
                    'security_number'   => $security_number,
                    'amount'            => $row['amount'],
                    'isCard'            => 1,
                    'status'            => 1
                ]);
            }
        // }
    }

    function isCardNumber($card_number) {
        $isCardNumber = Customer::where('card_number', $card_number)->doesntExist();
        return $isCardNumber;
    }

    function generateCode($limit){
        $code = '';
        for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
        return $code;
    }
}
