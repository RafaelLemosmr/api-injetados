<?php

namespace App\Services;

use App\Exceptions\CustomerAlreadyExistsException;
use App\Repositories\CustomerRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerService
{

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers()
    {
        try{
            return $this->customerRepository->getAllCustomers();
        }catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
        
    }

    public function getCustomerById($id)
    {
        try{
            return $this->customerRepository->getCustomerById($id);
        }catch(ModelNotFoundException $modelException){
            return response()->json([
                'status' => 'erro',
                'message' => $modelException->getMessage(),
                'code' => '404'
            ], 404);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }

    public function createCustomer($params)
    {
        try{
            return $this->customerRepository->createCustomer($params);
        }catch(CustomerAlreadyExistsException $customerException){
            return response()->json([
                'status' => 'erro',
                'message' => $customerException->getMessage(),
                'code' => '403'
            ], 403);
        }catch(Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }

    public function updateCustomer($params, $id) 
    {
        try{
            return $this->customerRepository->updateCustomer($params, $id);
        }catch(ModelNotFoundException $modelException){
            return response()->json([
                'status' => 'erro',
                'message' => $modelException->getMessage(),
                'code' => '404'
            ], 404);
        }catch(Exception $e){
            return response()->json([
                'status' => 'erro',
                'message' => $e->getMessage(),
                'code' => '500'
            ], 500);
        }
    }
}