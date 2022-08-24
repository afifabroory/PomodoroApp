
<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPomdoro</title>

    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="../index-2.css">
</head>
<body>
    <div class="grid place-items-center h-screen">
        <div class="grid grid-cols-1 mx-auto w-9/12 sm:w-5/12  border border-black rounded">
            <div class="w-full mt-4 mb-8">
                <div class="text-3xl mx-auto w-4/5 text-center font-bold mb-5">OTP Verification</div>
                <div class="text-lg mx-auto w-4/5 text-center">We sent your OTP Code to <span class="inline font-bold"><?= $_SESSION['email'] != '' ? $_SESSION['email'] : '' ?></span></div>
                <div class="text-md mx-auto w-4/5 text-center">Still not recieve the email? <a href="#">Resend to <?= $_SESSION['email'] != '' ? $_SESSION['email'] : '' ?></a></div>
            </div>
            <form method="POST" class="grid grid-cols-1">
                <label class="form__record">
                    <input class="form__record-input text-center p-3 font-bold text-xl" type="text" id="otp" name="otp" autocomplete="off" autofocus>
                    <div class=""></div>
                </label>
                <div class="w-full mb-4">
                    <div class="mx-auto w-4/5">
                        <input class="rounded-md py-2 px-3 w-full text-white bg-black" type="submit" id="verify" name="submit" value="Verify">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>