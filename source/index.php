<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPomdoro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="index.css">
</head>

<body style="overflow:hidden">
    <div class="container">
        <div style="position:absolute;">
            <div id="pomodoroState">IDLE</div>
            <div id="timerState">IDLE</div>
        </div>
        <div class="column mx-auto vh-100">
            <div class="row m-0 h-100 align-items-center justify-content-center">
                <div class="col-auto">
                    <div class="border rounded-4 shadow my-5 mx-auto core">
                        <div class="pt-4 pe-4">
                            <div class="d-flex justify-content-end">
                                <!-- <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-arrow-counterclockwise"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                    </svg>
                                    Reset
                                </button> -->
                            </div>
                        </div>
                        <div class="pt-0 p-5">
                            <div class="d-flex justify-content-center mt-3 mb-4">
                                <div id="timer" style="font-size: 64px; font-weight:bold;">25:00</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button id="timer_action" type="button" class="btn btn-primary w-100" data-bs-toggle="button"
                                    aria-pressed="false" autocomplete="off" onClick="app.toggle();">Start</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>