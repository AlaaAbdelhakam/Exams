<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Exam</title>

    <link href="images/exam.png" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .float-right {
            float: right;
        }




















        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #333;
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px;
        }

        .container>p {
            font-size: 32px;
        }

        .question {
            width: 75%;
        }

        .options {
            position: relative;
            padding-left: 40px;
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .options input {
            opacity: 0;
        }

        .checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #555;
            border: 1px solid #ddd;
            border-radius: 50%;
        }

        .options input:checked~.checkmark:after {
            display: block;
        }

        .options .checkmark:after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            background: white;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark {
            background: #21bf73;
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn-primary {
            background-color: #555;
            color: #ddd;
            border: 1px solid #ddd;
        }

        .btn-primary:hover {
            background-color: #21bf73;
            border: 1px solid #21bf73;
        }

        .btn-success {
            padding: 5px 25px;
            background-color: #21bf73;
        }

        @media(max-width:576px) {
            .question {
                width: 100%;
                word-spacing: 2px;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>

<body>
    @if ($posts->count() === 1)
        <form method="POST" action="{{ route('posts.finish', $post->id) }}">
            @method('patch')
            @csrf
        @else
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @method('patch')
                @csrf
    @endif



    <div class="container mt-sm-5 my-1">
        <div class="question ml-sm-5 pl-sm-5 pt-2 flex justify-content-center">
            <div class="py-2 h5"><b>{{ $post->questions->question }}</b></div>
            @if ($post->questions->image)
                <div class="text-center m-3">
                    <img src="/storage/{{ $post->questions->image }}" alt="" width="350px" height="300px">
                </div>
            @endif
            @if ($post->questions->isComplete())
                <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                <div class="form-outline  mb-4">
                    <textarea class="form-control" name="candidate_answer" id="form4Example6" rows="4"></textarea>
                    <label class="form-label" for="form4Example6">Your answer</label>
                </div>
            @elseif ($post->questions->isTrueorFalse())
                <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3 d-block " id="options">
                    <label class="options">false
                        <input class="form-check-input" type="radio" value="false" name="candidate_answer"
                            id="radioExample1" />

                        <span class="checkmark"></span>
                    </label>


                    <label class="options">true
                        <input class="form-check-input" type="radio" value="true" name="candidate_answer"
                            id="radioExample2" />


                        <span class="checkmark"></span>
                    </label>
                @elseif ($post->questions->isMultipleChoice())
                    <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                    @foreach ($answers as $answer)
                        <label class="options d-block"> {{ $answer->possible_answer }}
                            <input class="form-check-input" type="radio" name="candidate_answer" id="radioExample1"
                                value="{{ $answer->possible_answer }}" />

                            <span class="checkmark"></span>
                        </label>
                    @endforeach

            @endif


        </div>

        @if ($posts->count() === 1)
            <div class="d-flex align-items-center pt-3">

                <div class="ml-auto mr-sm-5">
                    <button type="submit" class="btn btn-success">Finish</button>

                </div>
            </div>
        @else
            {!! Form::hidden('redirects_to', URL::current()) !!}


            <div class="d-flex align-items-center pt-3">
                <div id="prev">
                    {{-- <button class="btn btn-primary">Previous</button> --}}
                </div>
                <div class="ml-auto mr-sm-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>


    </div>
    </div>
    @endif

    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script>
        var ajxForm = document.getElementById("theform");
        //  var data = new FormData(ajxForm);
        var xhr = new XMLHttpRequest();
        //  xhr.open("POST", "");
        //  xhr.send(data);
        location.onload = function() {
            alert("Submitted and Exit");
        };
    </script>

    @section('scripts')

    @show
</body>

</html>
