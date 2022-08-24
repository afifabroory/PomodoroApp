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
        <div class="grid grid-cols-3 mx-auto lg:w-6/12 md:w-9/12 border border-black rounded">
            <div class="col-span-2">
                <div class="w-full my-4">
                    <div class="text-xl mx-auto w-4/5">Sign In to MyPomdoro</div>
                </div>
                <form method="POST" class="grid grid-cols-1">
                    <label class="form__record">
                        <div class="form__record-label">Username or email</div>
                        <input class="form__record-input" type="text" id="usmail" name="usmail" placeholder="JohnDoes">
                        <div class="">Lorem ipsum dolor</div>
                        <!-- <div class="">MyPomdoro users can see your pomodoro history and your activities story using username (if you open your profile public manually). By default your account are private.</div> -->
                    </label>
                    <label class="form__record">
                        <div class="form__record-label">Password</div>
                        <input class="form__record-input" type="password" id="pass" name="pass" placeholder="Enter your password">
                        <div class="">Lorem ipsum dolor</div>
                    </label>
                    <div class="w-full mb-4">
                        <div class="mx-auto w-4/5">
                            <label>
                                <input type="checkbox" name="remember" id="remember">
                                Remember Me for 3 days
                            </label>
                            <input class="float-right right-0 rounded-md py-2 px-3 text-white bg-black" type="submit" id="create" name="submit" value="Create">
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-[url('https://images.unsplash.com/photo-1658279967815-388645755042?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=415&q=80')]"></div>
        </div>
    </div>
</body>
</html>