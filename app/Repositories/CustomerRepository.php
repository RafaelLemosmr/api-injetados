<?php

namespace App\Repositories;

use App\Exceptions\CustomerAlreadyExistsException;
use App\Models\Customer;
use App\Models\User;

class CustomerRepository
{

    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function getCustomerById($id)
    {
        return Customer::findOrFail($id);
    }

    public function createCustomer($params)
    {
        $customerExists = Customer::where('document', $params['document'])->count();
        if($customerExists > 0) {
            throw new CustomerAlreadyExistsException($params['document']);
        }

        return Customer::create([
            'name' => $params['name'],
            'fantasy_name' => $params['fantasy_name'],
            'document' => $params['document'],
            'type_document' => $params['document'],
            'status' => $params['status'],
            'code_erp' => $params['code_erp']
        ]);
    }

    public function updateCustomer($params, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->name = $params['name'];
        $customer->fantasy_name = $params['fantasy_name'];
        $customer->document = $params['document'];
        $customer->type_document = $params['type_document'];
        $customer->status = $params['status'];
        $customer->code_erp = $params['code_erp'];
        $customer->save();

        return $customer;
    }
}