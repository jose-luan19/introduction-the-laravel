<?php

namespace App\Http\Controllers;

use App\Payment\PagSeguro\CreditCard;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        // session()->forget('pagseguro_session_code');

        if(!auth()->check()){
            return redirect()->route('login');
        }
        if (!session()->has('cart')) {
            return redirect()->route('home');
        }
        $this->makePagSeguroSession();
        // var_dump(session()->get('pagseguro_session_code'));
        $cartItems = array_map(function($line){
            return $line['amount'] * $line['price'];
        },session()->get('cart'));

        $cartItems = array_sum($cartItems);

        return view('checkout',compact('cartItems'));
    }

    public function proccess(Request $request){
        try {
            $dataPost = $request->all();
            $cartItems = session()->get('cart');
            $user = auth()->user();
            $reference = 'XPTO';

            $creditCardPayment = new CreditCard($cartItems, $user,$dataPost, $reference);
            $result = $creditCardPayment->doPayment();
            // var_dump($result);
            $userOrder = [
                'reference' => $reference,
                'pagseguro_code' => $result->getCode(),
                'pagseguro_status' => $result->getStatus(),
                'items' => serialize($cartItems),
                'store_id' => 45
            ];
            $user->orders()->create($userOrder);

            //limpando session
            session()->forget('cart');
            session()->forget('pagseguro_session_code');

            return response()->json([
                'data' =>[
                    'status' => true,
                    'message' => 'Pedido criado com sucesso!!!',
                    'order' => $reference
                ]
            ]);
        } catch (\Exception $e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar pedido!!!';
            return response()->json([
                'data' =>[
                    'status' => false,
                    'message' => $message
                ]
            ],401);
        }
    }

    public function thanks(){

        return view('thanks');
    }

    //Resgatando a session da api e criando nossa proria, para que não mude a cada requisição
    private function makePagSeguroSession(){
        if(!session()->has('pagseguro_session_code')){
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
            session()->put('pagseguro_session_code', $sessionCode->getResult());
        }
    }
}
