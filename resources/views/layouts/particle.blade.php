<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>



    </style>
</head>

<body>

    <div id="appAnimate">
        <div class=" hero col-12 col-md-10 col-lg-6">
            <div class=" px-3 px-md-0 text-center">
                <h1 class=" display-3">Welcome To UCSM News</h1>
                <p class=" text-white-50  mt-3 text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    In
                    neque excepturi
                    architecto enim. Ipsum quod corrupti adipisci, culpa doloribus omnis perspiciatis consectetur
                    delectus provident maxime soluta, commodi ad nulla rerum! Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. In neque excepturi
                    architecto enim. Ipsum quod corrupti adipisci, culpa doloribus omnis perspiciatis consectetur
                    delectus provident maxime soluta, commodi ad nulla rerum!</p>
                <div class=" d-flex justify-content-center flex-column gap-3 flex-md-row">
                    <a href="{{ route('article.create') }}" class=" px-4 me-3 btn btn-outline-light btn-lg">Create
                        Article</a>
                    <a href="{{ route('index') }}" class=" btn px-5 py-2 btn-light btn-lg">Browse News</a>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="{{ mix('resources/js/script.js') }}"></script>


</body>

</html>
