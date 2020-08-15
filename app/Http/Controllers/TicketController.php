<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * lista de tickets por id de agente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request){
        if ($request->ajax()){
            try {
                $tickets = Ticket::where('agent_id', '=', Auth::user()->id)->get();
                return response()->json($tickets, 200);
            }catch (\Exception $e){
                return response()->json($e->getMessage(), 500);
            }
        }
    }



    /**
     * Guarda un ticket nuevo
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        if ($request->json()){
            try {
                Ticket::create([
                    'subject'       => $request->asunto,
                    'description'   => $request->detalle,
                    'state'         => '1',
                    'user_id'       => $request->id_user,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ]);

                return response()->json('ticket creado con exito', 200);
            }catch (\Exception $e){
                return response()->json($e->getMessage(), 200);
            }
        }
    }


    /**
     * Devuelve el ticket y sus comentarios.
     *
     * @param Ticket $id
     * @return JsonResponse
     */
    public function show(Ticket $id){
        try {
            $ticket = Ticket::find($id);

            $details = $ticket->details()->get();

            return response()->json(['ticket' => $ticket, 'details' => $details], 200);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), 200);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }


}
