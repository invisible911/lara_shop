<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Cache;


class OrderTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    protected  $payment_details ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( array $payment_details)
    {
        $this->payment_details = $payment_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $payment_details =$this->payment_details;

        $total_price = $this->payment_details['total_price'];

        $is_success = true;

        $is_success_payment = $this->credit_deduct($payment_details);
       
        $errors = collect();

        $products = $payment_details['products'];

        if ($is_success_payment)
        {
            //check if avaliable and if not return erro
            foreach($products as $product)
            {
                if($product->pivot->quantity > $product->instock)
                {
                    
                    $is_success = false;

                    $error_message = 'Item: '.$product->name.' is not avaliable.'. 'instock number:'.$product->instock.' you oder quantity: '. $product->pivot->quantity;

                    $errors->push($error_message);

                }

            }
            //TODO 
            //1.add order 
           //2.add order product
           // 3.change the quantity of product.

        }
        else
        {
            $error_message = 'Transaction faild. please verify your credit card info.';

            $errors->push($error_message);

            $is_success = false;

        }

        $keep_minutes = 10;

        Cache::put($payment_details['key_is_success'],$is_success,$keep_minutes);

        Cache::put($payment_details['key_errors'],$errors,$keep_minutes);

    }

     /**
     *  persudo function for  communiting card organization and process the transaction. 
     *
     * @return true or false 
     */
    public function credit_deduct(array $payment_info)
    {
        $card_name = $payment_info['card_name'];

        $card_number = $payment_info['card_number'];

        $card_expiry_date = $payment_info['card_expiry_date'];

        $card_cvc = $payment_info['card_cvc'];

        $total_price = $payment_info['total_price'];

        // comminutes and get the result returned

        return true;
    }

}