<?php
namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    function index(){
      
        return view('dashboard.client.index');
    
      }
          function project(){
              
            return view('dashboard.client.project');
        
          }
        
          function invoice(){
              
            return view('dashboard.client.invoice');
        
          }
          function profile(){
              
            return view('dashboard.client.invoice');
        
          }
}
