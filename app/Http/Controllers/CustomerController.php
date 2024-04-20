<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateCustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getAllCustomers(Request $request)
    {
        return $this->customerService->getAllCustomers();
    }

    public function getCustomerById(Request $request, $id)
    {
        return $this->customerService->getCustomerById($id);
    }

    public function createCustomer(CreateOrUpdateCustomerRequest $request)
    {
        $params = $request->validated();
        return $this->customerService->createCustomer($params);
    }

    public function updateCustomer(CreateOrUpdateCustomerRequest $request, $id) 
    {
        $params = $request->validated();
        return $this->customerService->updateCustomer($params, $id);
    }
}
