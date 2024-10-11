<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\General;
use App\Models\User\Jenissaldo;
use App\Models\User\Isisaldo;
use Illuminate\Support\Str;
// use crocodicstudio\dokularavel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
// use DOKU;
use Xendit\Xendit;

class SaldoController extends Controller
{

    public function __construct()
    {
        Xendit::setApiKey("xnd_development_V6Z2wbBWf7g4av92RAIF6jz1M4ZhbQD34SZ8O8aMGnVaUN4pVW5HUJB2mNUm8g");
        // Xendit::setApiKey(config('xnd_development_V6Z2wbBWf7g4av92RAIF6jz1M4ZhbQD34SZ8O8aMGnVaUN4pVW5HUJB2mNUm8g'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saldo()
    {
        $title = "Isi Saldo";
        $jenissaldo = Jenissaldo::all();
        $generals = General::find(1);

        return view('front.account.saldo', compact('title', 'generals', 'jenissaldo'));
    }

    public function vcc()
    {
        $title = "Virtual Credit Card";
        $generals = General::find(1);

        return view('front.account.vcc', compact('title', 'generals'));
    }

    public function riwayat()
    {
        $title = "Riwayat Transaksi";
        $generals = General::find(1);

        return view('front.account.riwayat', compact('title', 'generals'));
    }

    public function checkout(Request $request)
    {

        $params = [
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->customer_email,
            // 'usd ' => $request->usd,
            // 'idr' => $request->idr,
            'amount' => $request->idr,
            'redirect_url' => 'localhost::8000'
        ];
        // dd($params);

        $createInvoice = \Xendit\Invoice::create($params);
        // dd($createInvoice);
        //Simpan ke database
        $Isisalddos = new Isisaldo;
        $Isisalddos->external_id = $params['external_id'];
        $Isisalddos->no_invoice = (string) Str::uuid();
        $Isisalddos->status = 'Pending';
        $Isisalddos->checkout_link = $createInvoice['invoice_url'];
        $Isisalddos->usd = $request['usd'];
        $Isisalddos->jumlah = $request['jumlah'];
        $Isisalddos->customer_email = $request['customer_email'];
        $Isisalddos->jenissaldo_id = $request['jenissaldo_id'];
        $Isisalddos->user_id = $request['user_id'];
        $Isisalddos->idr = $params['amount'];
        $Isisalddos->save();

        // dd($Isisalddos);
        return redirect()->to($createInvoice['invoice_url']);
    }

    public function webhook(Request $request)
    {
        $getInvoice = \Xendit\Invoice::retrieve($request->id);
        $payments = Isisaldo::where('external_id', $request->external_id)->firstorfail();

        if ($payments->status == 'settled') {
            return response()->json(['data' => 'Payment already Processed']);
        }

        $payments->status =  strtolower($getInvoice['status']);
        $payments->save();
    }
}
