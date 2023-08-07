<x-app-layout>
    @push('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
    <div class="container lst">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> something went wrong <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="well">aa</h3>

        <form method="post" action="{{url('multiphoto')}}" enctype="multipart/form-data">
            @csrf
            <div class="input-group demo control-group lst increment" >
                <input type="file" name="filenames[]" class="myfrm form-control">
                <div class="input-group-btn">
                    <button class="btn btn-success submit_btn" type="button">Add</button>
                 </div>
            </div>
            <div class="clone hide">
                <div class="demo control-group lst input-group" style="margin-top:10px">
                    <input type="file" name="filenames[]" class="myfrm form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger remove_btn" type="button">Remove</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success submit_btn" style="margin-top:10px">Submit</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".submit_btn").click(function(){
        var lsthtml = $(".clone").html(); // Corrected variable name from lsthmtl to lsthtml
        $(".increment").after(lsthtml);
    });
          $("body").on("click",".remove_btn",function(){
              $(this).parents(".demo").remove();
          });
        });
    </script>

<div>
    <h1>All Photos</h1>

    @if(count($photos) > 0)
        <div>
            @foreach($photos as $photo)
                @php
                    $filenames = json_decode($photo->filenames);
                @endphp

                @if(is_array($filenames))
                    @foreach($filenames as $filename)
                        <img src="{{ asset('files/' . $filename) }}" alt="Photo">
                    @endforeach
                @endif
            @endforeach
        </div>
    @else
        <p>No photos found.</p>
    @endif
</div>

</body>

</x-app-layout>
