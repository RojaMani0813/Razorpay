@extends('layouts.main')

@section('head-data')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @if(count($course) > 0)        
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($course as $courses)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $courses->name }}</td>
                        <td>{{ $courses->description }}</td>
                        <td>Rs {{ $courses->amount }}</td>
                        @if($courses->image !== null && $courses->image !== '')
                            <td><img src="{{ $courses->image }}"></td>
                        @else
                            <td>No image</td>
                        @endif
                        <td>
                            <button class="btn btn-success rzp_click" id="" data-id="{{ $courses->id }}">Purchase</button>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>No courses in database</h3>
    @endif
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
        // This is used to authendication csrf-token in ajax call
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        var base_url = '{!!url("/")!!}/';
        $(".rzp_click").click(function () {
            var id=$(this).attr('data-id');
            $.ajax({
                url:base_url+'paywithrazorpay',
                type: 'post',
                data:{id:id,_token:$('meta[name="csrf-token"]').attr('content')},
                dataType:'json',
                success: function(res){
                    var options = {
                        'key':res.key,
                        'amount': res.amount,
                        'name': res.name,
                        'description':res.description,
                        'image':res.image,
                        'order_id':res.order_id,
                        'handler': function(){
                            alert('Success');
                        },
                        'prefill':{
                            'name':'Optisol',
                            'email':'demo@optisol.com'
                        },
                        'notes':{
                            'address':'Madurai'
                        },
                        'theme':{
                            'color':'Red'
                        }
                    };
                    var rzp = new Razorpay(options);
                    rzp.open();
                    e.preventDefault();
                }
            })
        })
    </script>
@endsection