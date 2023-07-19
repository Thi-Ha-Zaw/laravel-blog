<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #particles-js {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(112.5deg, rgb(214, 214, 214) 0%, rgb(214, 214, 214) 10%, rgb(195, 195, 195) 10%, rgb(195, 195, 195) 53%, rgb(176, 176, 176) 53%, rgb(176, 176, 176) 55%, rgb(157, 157, 157) 55%, rgb(157, 157, 157) 60%, rgb(137, 137, 137) 60%, rgb(137, 137, 137) 88%, rgb(118, 118, 118) 88%, rgb(118, 118, 118) 91%, rgb(99, 99, 99) 91%, rgb(99, 99, 99) 100%), linear-gradient(157.5deg, rgb(214, 214, 214) 0%, rgb(214, 214, 214) 10%, rgb(195, 195, 195) 10%, rgb(195, 195, 195) 53%, rgb(176, 176, 176) 53%, rgb(176, 176, 176) 55%, rgb(157, 157, 157) 55%, rgb(157, 157, 157) 60%, rgb(137, 137, 137) 60%, rgb(137, 137, 137) 88%, rgb(118, 118, 118) 88%, rgb(118, 118, 118) 91%, rgb(99, 99, 99) 91%, rgb(99, 99, 99) 100%), linear-gradient(135deg, rgb(214, 214, 214) 0%, rgb(214, 214, 214) 10%, rgb(195, 195, 195) 10%, rgb(195, 195, 195) 53%, rgb(176, 176, 176) 53%, rgb(176, 176, 176) 55%, rgb(157, 157, 157) 55%, rgb(157, 157, 157) 60%, rgb(137, 137, 137) 60%, rgb(137, 137, 137) 88%, rgb(118, 118, 118) 88%, rgb(118, 118, 118) 91%, rgb(99, 99, 99) 91%, rgb(99, 99, 99) 100%), linear-gradient(90deg, rgb(195, 195, 195), rgb(228, 228, 228));
            background-blend-mode: overlay, overlay, overlay, normal;
            /* background-image: radial-gradient(circle at 13% 47%, rgba(140, 140, 140,0.03) 0%, rgba(140, 140, 140,0.03) 25%,transparent 25%, transparent 100%),radial-gradient(circle at 28% 63%, rgba(143, 143, 143,0.03) 0%, rgba(143, 143, 143,0.03) 16%,transparent 16%, transparent 100%),radial-gradient(circle at 81% 56%, rgba(65, 65, 65,0.03) 0%, rgba(65, 65, 65,0.03) 12%,transparent 12%, transparent 100%),radial-gradient(circle at 26% 48%, rgba(60, 60, 60,0.03) 0%, rgba(60, 60, 60,0.03) 6%,transparent 6%, transparent 100%),radial-gradient(circle at 97% 17%, rgba(150, 150, 150,0.03) 0%, rgba(150, 150, 150,0.03) 56%,transparent 56%, transparent 100%),radial-gradient(circle at 50% 100%, rgba(25, 25, 25,0.03) 0%, rgba(25, 25, 25,0.03) 36%,transparent 36%, transparent 100%),radial-gradient(circle at 55% 52%, rgba(69, 69, 69,0.03) 0%, rgba(69, 69, 69,0.03) 6%,transparent 6%, transparent 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255)); */
            /* background-image: radial-gradient(circle at 69% 86%, rgba(165, 165, 165,0.06) 0%, rgba(165, 165, 165,0.06) 25%,rgba(193, 193, 193,0.06) 25%, rgba(193, 193, 193,0.06) 50%,rgba(221, 221, 221,0.06) 50%, rgba(221, 221, 221,0.06) 75%,rgba(249, 249, 249,0.06) 75%, rgba(249, 249, 249,0.06) 100%),radial-gradient(circle at 49% 76%, rgba(129, 129, 129,0.06) 0%, rgba(129, 129, 129,0.06) 25%,rgba(164, 164, 164,0.06) 25%, rgba(164, 164, 164,0.06) 50%,rgba(200, 200, 200,0.06) 50%, rgba(200, 200, 200,0.06) 75%,rgba(235, 235, 235,0.06) 75%, rgba(235, 235, 235,0.06) 100%),radial-gradient(circle at 22% 64%, rgba(173, 173, 173,0.06) 0%, rgba(173, 173, 173,0.06) 25%,rgba(119, 119, 119,0.06) 25%, rgba(119, 119, 119,0.06) 50%,rgba(64, 64, 64,0.06) 50%, rgba(64, 64, 64,0.06) 75%,rgba(10, 10, 10,0.06) 75%, rgba(10, 10, 10,0.06) 100%),linear-gradient(307deg, rgb(255,255,255),rgb(255,255,255)); */

            /* background-image: radial-gradient(circle at 85% 1%, hsla(190,0%,93%,0.05) 0%, hsla(190,0%,93%,0.05) 96%,transparent 96%, transparent 100%),radial-gradient(circle at 14% 15%, hsla(190,0%,93%,0.05) 0%, hsla(190,0%,93%,0.05) 1%,transparent 1%, transparent 100%),radial-gradient(circle at 60% 90%, hsla(190,0%,93%,0.05) 0%, hsla(190,0%,93%,0.05) 20%,transparent 20%, transparent 100%),radial-gradient(circle at 79% 7%, hsla(190,0%,93%,0.05) 0%, hsla(190,0%,93%,0.05) 78%,transparent 78%, transparent 100%),radial-gradient(circle at 55% 65%, hsla(190,0%,93%,0.05) 0%, hsla(190,0%,93%,0.05) 52%,transparent 52%, transparent 100%),linear-gradient(135deg, rgb(37, 56, 222),rgb(96, 189, 244)); */
            /* background-image: linear-gradient(55deg, rgba(208, 208, 208, 0.03) 0%, rgba(208, 208, 208, 0.03) 20%,rgba(55, 55, 55, 0.03) 20%, rgba(55, 55, 55, 0.03) 40%,rgba(81, 81, 81, 0.03) 40%, rgba(81, 81, 81, 0.03) 60%,rgba(208, 208, 208, 0.03) 60%, rgba(208, 208, 208, 0.03) 80%,rgba(191, 191, 191, 0.03) 80%, rgba(191, 191, 191, 0.03) 100%),linear-gradient(291deg, rgba(190, 190, 190, 0.02) 0%, rgba(190, 190, 190, 0.02) 14.286%,rgba(105, 105, 105, 0.02) 14.286%, rgba(105, 105, 105, 0.02) 28.572%,rgba(230, 230, 230, 0.02) 28.572%, rgba(230, 230, 230, 0.02) 42.858%,rgba(216, 216, 216, 0.02) 42.858%, rgba(216, 216, 216, 0.02) 57.144%,rgba(181, 181, 181, 0.02) 57.144%, rgba(181, 181, 181, 0.02) 71.42999999999999%,rgba(129, 129, 129, 0.02) 71.43%, rgba(129, 129, 129, 0.02) 85.71600000000001%,rgba(75, 75, 75, 0.02) 85.716%, rgba(75, 75, 75, 0.02) 100.002%),linear-gradient(32deg, rgba(212, 212, 212, 0.03) 0%, rgba(212, 212, 212, 0.03) 12.5%,rgba(223, 223, 223, 0.03) 12.5%, rgba(223, 223, 223, 0.03) 25%,rgba(11, 11, 11, 0.03) 25%, rgba(11, 11, 11, 0.03) 37.5%,rgba(86, 86, 86, 0.03) 37.5%, rgba(86, 86, 86, 0.03) 50%,rgba(106, 106, 106, 0.03) 50%, rgba(106, 106, 106, 0.03) 62.5%,rgba(220, 220, 220, 0.03) 62.5%, rgba(220, 220, 220, 0.03) 75%,rgba(91, 91, 91, 0.03) 75%, rgba(91, 91, 91, 0.03) 87.5%,rgba(216, 216, 216, 0.03) 87.5%, rgba(216, 216, 216, 0.03) 100%),linear-gradient(312deg, rgba(113, 113, 113, 0.01) 0%, rgba(113, 113, 113, 0.01) 14.286%,rgba(54, 54, 54, 0.01) 14.286%, rgba(54, 54, 54, 0.01) 28.572%,rgba(166, 166, 166, 0.01) 28.572%, rgba(166, 166, 166, 0.01) 42.858%,rgba(226, 226, 226, 0.01) 42.858%, rgba(226, 226, 226, 0.01) 57.144%,rgba(109, 109, 109, 0.01) 57.144%, rgba(109, 109, 109, 0.01) 71.42999999999999%,rgba(239, 239, 239, 0.01) 71.43%, rgba(239, 239, 239, 0.01) 85.71600000000001%,rgba(54, 54, 54, 0.01) 85.716%, rgba(54, 54, 54, 0.01) 100.002%),linear-gradient(22deg, rgba(77, 77, 77, 0.03) 0%, rgba(77, 77, 77, 0.03) 20%,rgba(235, 235, 235, 0.03) 20%, rgba(235, 235, 235, 0.03) 40%,rgba(215, 215, 215, 0.03) 40%, rgba(215, 215, 215, 0.03) 60%,rgba(181, 181, 181, 0.03) 60%, rgba(181, 181, 181, 0.03) 80%,rgba(193, 193, 193, 0.03) 80%, rgba(193, 193, 193, 0.03) 100%),linear-gradient(80deg, rgba(139, 139, 139, 0.02) 0%, rgba(139, 139, 139, 0.02) 14.286%,rgba(114, 114, 114, 0.02) 14.286%, rgba(114, 114, 114, 0.02) 28.572%,rgba(240, 240, 240, 0.02) 28.572%, rgba(240, 240, 240, 0.02) 42.858%,rgba(221, 221, 221, 0.02) 42.858%, rgba(221, 221, 221, 0.02) 57.144%,rgba(74, 74, 74, 0.02) 57.144%, rgba(74, 74, 74, 0.02) 71.42999999999999%,rgba(201, 201, 201, 0.02) 71.43%, rgba(201, 201, 201, 0.02) 85.71600000000001%,rgba(187, 187, 187, 0.02) 85.716%, rgba(187, 187, 187, 0.02) 100.002%),linear-gradient(257deg, rgba(72, 72, 72, 0.03) 0%, rgba(72, 72, 72, 0.03) 16.667%,rgba(138, 138, 138, 0.03) 16.667%, rgba(138, 138, 138, 0.03) 33.334%,rgba(54, 54, 54, 0.03) 33.334%, rgba(54, 54, 54, 0.03) 50.001000000000005%,rgba(161, 161, 161, 0.03) 50.001%, rgba(161, 161, 161, 0.03) 66.668%,rgba(17, 17, 17, 0.03) 66.668%, rgba(17, 17, 17, 0.03) 83.33500000000001%,rgba(230, 230, 230, 0.03) 83.335%, rgba(230, 230, 230, 0.03) 100.002%),linear-gradient(47deg, rgba(191, 191, 191, 0.01) 0%, rgba(191, 191, 191, 0.01) 16.667%,rgba(27, 27, 27, 0.01) 16.667%, rgba(27, 27, 27, 0.01) 33.334%,rgba(66, 66, 66, 0.01) 33.334%, rgba(66, 66, 66, 0.01) 50.001000000000005%,rgba(36, 36, 36, 0.01) 50.001%, rgba(36, 36, 36, 0.01) 66.668%,rgba(230, 230, 230, 0.01) 66.668%, rgba(230, 230, 230, 0.01) 83.33500000000001%,rgba(93, 93, 93, 0.01) 83.335%, rgba(93, 93, 93, 0.01) 100.002%),linear-gradient(90deg, #ffffff,#ffffff); */
            /* background-image: repeating-linear-gradient(135deg, rgb(0,0,0) 0px, rgb(0,0,0) 10px,transparent 10px, transparent 11px),repeating-linear-gradient(22.5deg, rgb(0,0,0) 0px, rgb(0,0,0) 10px,transparent 10px, transparent 11px),linear-gradient(90deg, hsl(194,74%,56%),hsl(266,74%,56%),hsl(338,74%,56%),hsl(50,74%,56%),hsl(122,74%,56%)); */
            /* background-image: radial-gradient(circle at top right, rgb(36, 9, 119) 0%, rgb(36, 9, 119) 48%,rgb(72, 7, 149) 48%, rgb(72, 7, 149) 53%,rgb(109, 5, 178) 53%, rgb(109, 5, 178) 56%,rgb(145, 2, 208) 56%, rgb(145, 2, 208) 69%,rgb(181, 0, 237) 69%, rgb(181, 0, 237) 100%); */
        }

        .welcome-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        #app {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            touch-action: pan-up;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            /* text-shadow: 0 0 5px #ffffff, 0 0 20px #000, 0 0 30px #000; */
        }

        .hero{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        /* #app h1 {
            --fontSize: 60px;
            --lineHeight: 80px;
            width: auto;
            height: calc(2 * var(--lineHeight));
            line-height: var(--lineHeight);
            margin: calc(50vh - var(--lineHeight)) auto 0;
            font-size: var(--fontSize);
        } */

        /* #app a {
            margin-top: 10px;
            display: inline-block;
            text-decoration: none;
            color: #fff;
        } */

        #app canvas {
            display: block;
            position: fixed;
            z-index: -1;
            top: 0;
        }
    </style>
</head>

<body>

    <div id="app">
        <div class=" hero">
            <h1 class=" display-3">Welcome To UCSM News</h1>
            <p class=" text-white-50 mt-3 text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                neque excepturi
                architecto enim. Ipsum quod corrupti adipisci, culpa doloribus omnis perspiciatis consectetur
                delectus provident maxime soluta, commodi ad nulla rerum! Lorem ipsum dolor sit amet consectetur
                adipisicing elit. In neque excepturi
                architecto enim. Ipsum quod corrupti adipisci, culpa doloribus omnis perspiciatis consectetur
                delectus provident maxime soluta, commodi ad nulla rerum!</p>
            <div class=" text-center">
                <a href="{{ route('article.create') }}" class=" px-4 me-3 btn btn-outline-light btn-lg">Create
                    Article</a>
                <a href="{{ route('index') }}" class=" btn px-5 py-2 btn-light btn-lg">Browse News</a>
            </div>
        </div>
    </div>

    <script type="module" src="{{mix('resources/js/script.js')}}"></script>

    {{-- <script src="{{ mix('node_modules/particles.js/particles.js') }}"></script> --}}
    {{-- <script>
        /* -----------------------------------------------
                /* How to use? : Check the GitHub README
                /* ----------------------------------------------- */

        /* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
        /*
        particlesJS.load('particles-js', 'particles.json', function() {
          console.log('particles.js loaded - callback');
        });
        */

        /* Otherwise just put the config content (json): */

        particlesJS('particles-js',

            {
                "particles": {
                    "number": {
                        "value": 200,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value":"#4b4b4b"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#4b4b4b"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 5,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color":"#4b4b4b",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true,
                "config_demo": {
                    "hide_card": false,
                    "background_color": "#b61924",
                    "background_image": "",
                    "background_position": "50% 50%",
                    "background_repeat": "no-repeat",
                    "background_size": "cover"
                }
            }

        );
    </script> --}}
</body>

</html>
