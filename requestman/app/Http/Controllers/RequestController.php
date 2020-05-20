<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Client\RequestException;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://dev.itemapi.ak/api/students');
        $students = json_decode($response->getBody()->getContents());
                
        return view('index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate inputs
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'class' => 'required|numeric'
        ]);

        $client = new Client();
        
        try {
            $response = $client->post('http://dev.itemapi.ak/api/students', 
                array(
                    'form_params' => array(
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'class' => $request->input('class')
                    )
                )  
            );

            $checkError = json_decode($response->getBody()->getContents(), true);
            
            if(!empty($checkError['success'])) {
                return redirect()->to('/')->with('error', 'Student cannot be added - '.json_encode($checkError['response']));    
            }
            
        } catch(RequestException $e) {
            if ($e->hasResponse()) {
                $msg = $e->getResponse();
            } else {
                $msg = "The student could not be created.";
            }

            return redirect()->to('/')->with('error', $msg);
        }    

        return redirect()->to('/')->with('success', "Student added successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();

        //Get student data
        $response = $client->get('http://dev.itemapi.ak/api/students/'.$id);
        $student = json_decode($response->getBody()->getContents(), true);
        //dd($student);
        return view('edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
