<?php
/**
 * Created by PhpStorm.
 * User: richardmszrs
 * Date: 30/07/2017
 * Time: 14:08
 */

namespace App\Http\Requests\Invoices;

use App\Http\Requests\Request;

class InvoiceUpdate extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clients_id' => 'required',
            'name' => 'required',
            'amount' => 'required',
        ];
    }
}