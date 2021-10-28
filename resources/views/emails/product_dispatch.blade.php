@component('mail::message')
# Hola {{ $order->customer->name }}
<br>
Hemos despachado tu producto {{ $order->product->name }} por un valor de {{ $order->product->price }} de nuestra tiena {{ config('app.name') }}
<br>
Gracias por preferinos
@component('mail::button',['url' => env('APP_URL')])
Visitanos
@endcomponent
Atentamente,<br>
{{ config('app.name') }}
@endcomponent

