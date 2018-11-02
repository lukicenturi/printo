@extends('dashboard')
@section('css1')
    <link rel='stylesheet' type='text/css' href="{{asset('css/topup.css')}}">
@endsection
@section('js1')
    <script type="text/javascript" src="{{asset('js/topup.js')}}"></script>
@endsection
@section('content1')
    <div class='second-container'>
        <h3> TOP UP</h3>
        <div class="part-group">
            <form action="{{url('dashboard/withdraw')}}" method="POST">
                <div>
                    <section>
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="coin" id="coin" placeholder="Coin Amount">
                        </div>
                        <div class="form-group">
                            <select name="" id="">
                                <option value="">Choose Bank</option>
                                <option value="">Bank BCA</option>
                                <option value="">Bank BNI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text"placeholder="In the name of">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Bank Account Number">
                        </div>
                        <div class='button-buy'>
                            <button name='buy' class='right'>WITHDRAW</button>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
@endsection
