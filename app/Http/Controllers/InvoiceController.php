<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class InvoiceController extends Controller
{
    public function printInvoice($id)
    {
        $invoice = Invoice::with(
            'client:id,name',
            'seller:id,name',
            'products',
            'coin:id,name,symbol',
            'invoiceType:id,name',
            'invoicePayments.paymentMethod:id,name',
            'tables:id,name'
        )->findOrFail($id);
        $date = Carbon::parse($invoice->created_at)->format('d-m-Y');
        $hour = Carbon::parse($invoice->created_at)->format('h:mm:ss');
        $tables = collect($invoice->tables)->implode(', ');
        $nombreImpresora = "POS-58";
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(2, 2);
        $impresora->text("EL RINCON DE SETIMA S.A.C\n");
        $impresora->text("Norky`s\n");
        $impresora->text("R.U.C 20513132248\n");
        $impresora->text("Jr Sebastian Barranca Nro.1555(2do y \n");
        $impresora->text("3er Piso.Alt Cdras.7 de Gamarra) -Lima \n");
        $impresora->text("La victoria \n");
        $impresora->text("Telefono: Central Delivery: 644-91000\n");
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("Pedido: {$invoice->id}\n");
        $impresora->text("Fecha: {$date} {$hour}\n");
        $impresora->text("Tipo: {$invoice->invoiceType->name}\n");
        $impresora->text("Mesero: {$invoice->seller->name}\n");
        $impresora->text("Cliente: {$invoice->client->name}\n");
        $impresora->text("T/Cambio: {$invoice->exchange_rate}\n\n\n");
        $impresora->text("Mesa: {$tables}\n");
        $impresora->feed(5);
        $impresora->close();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::filters($request->all())
            ->with(
                'client:id,name',
                'seller:id,name',
                'products',
                'coin:id,name,symbol',
                'invoiceType:id,name',
                'invoicePayments.paymentMethod:id,name',
                'tables:id,name'
            )
            ->search($request->all());
        return response()->json($invoices, 200);
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
        $invoice = new Invoice();
        $invoice->exchange_rate = $request->exchange_rate;
        $invoice->invoice_type_id = $request->invoice_type_id;
        $invoice->coin_id = $request->coin_id;
        $invoice->taxe = $request->taxe;
        $invoice->client_id = $request->client_id;
        $invoice->seller_id = $request->seller_id;
        $invoice->user_created_id = $request->user_created_id;
        $invoice->save();
        return response()->json($invoice, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return response()->json($invoice, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->exchange_rate = $request->exchange_rate;
        $invoice->invoice_type_id = $request->invoice_type_id;
        $invoice->coin_id = $request->coin_id;
        $invoice->taxe = $request->taxe;
        $invoice->client_id = $request->client_id;
        $invoice->seller_id = $request->seller_id;
        $invoice->user_created_id = $request->user_created_id;
        $invoice->update();
        return response()->json($invoice, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json($invoice, 200);
    }
}
