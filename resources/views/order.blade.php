<x-layout>
@include('header')
    
<span>Ваш заказ</span>

<div class="divOrder">

@foreach ( $order as $book )
<div>
<img src="../{{$book->picture}}" class="booksPic"><br>
    
<a href="/book/order/delete/{{$book->id}}">Удалить</a>
</div>
@endforeach


</div>

</x-layout>