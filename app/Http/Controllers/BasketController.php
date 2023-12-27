<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Basket;

class BasketController extends Controller
{
    public $basket;
   
    public function add(Request $request)
    {   // $request->session()->flush();
        $request->session()->push('basket', 
        $request->id);
        //$all = $request->session()->all();
        //print_r($request->session()->get('basket'));
        $count = count($request->session()->get('basket'));
        return response()
            ->json(['count'=>$count]);
           
       // $request->session()
      //  ->push('basket', 'ina');
     //dd($request->session()->all());
    // return response()
      //   ->json($request->session()->get('basket'));
    }

    public function order(Request $request)
    {
        //$request->session()->flush();
        $order = $request->session()->get('basket');
        //dd($order);
        return view('order', [
            'order' => Book::find($order, 
                ['id', 'picture']) 
        ]);   
    }

    public function delete(Request $request, $id)
    {
        //$request->session()->flush();
        
        //$order = $request->session()->all();
       $orderr = $request->session()->get('basket');
        /* foreach ($order as $bookId) {
            print_r($bookId . '= ');
            if ($bookId == $id) {
               unset($order[$bookId]);
            }
        } */
        $request->session()->forget('basket');
        //dd($orderr);
        $countOrder = count($orderr);
        for ($i = 0; $i < $countOrder; $i++) {
           // print_r($order[$i] . ' \n');
            if ($orderr[$i] != $id) {
                //unset($order[$i]);
                //$request->session()->forget('basket', $order[$i]);
                $request->session()->push('basket', 
                $orderr[$i]);
            }
        }
        //dd($order);
       //dd($request->session()->get('basket'));
       //$request->session()->forget('basket');
        //dd($order);
        //$request->session()->push('basket', $orderr);
       // dd($request->session()->get('basket'));
        return redirect()
            ->action([BasketController::class, 'order']);
 
    }

   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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


    public function ajaxRequestPost(Request $request)
    
    {
//dd($request->id);
       // return response()
       //     ->json(['success'=>$request->id]);
        //return "hello client";
        //$basket = array();
        //array_push($basket, $request->id);
        //dd($basket);
       // $request->session()
        //    ->put('basket', ['a']);
        //$request->session()->push('basket', 'b');
        //$request->session()->put('basket', []);
       // $request->session()
        //    ->put('basket', [] );
           $request->session()
           ->push('basket', $request->id);
          // $request->session()
         //  ->push('basket', 'ina');
        //dd($request->session()->all());
        return response()
            ->json($request->session()->get('basket'));
    }
}
