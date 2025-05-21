<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', "PlantPots") }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" h-[100vh] relative bg-linear-to-b/increasing from-lime-300 to-teal-400">
    <div id="login-container" class="block absolute inset-x-0 mt-5 mx-[4vw]">
        <h1 class="text-4xl text-green-400 font-bold text-center mb-2">Plantpots Management</h1>
        <div id="login-block" class=" bg-white rounded-md px-5 pt-5 pb-6 shadow-lg">
            <form action="#" method="POST" class="mt-4">
                <!-- Tên đăng nhập -->
                <div>
                    <label for="username" class="block text-sm font-medium text-green-600">Tên đăng nhập</label>
                    <input type="text" id="username" name="username" required
                        class="w-full px-4 py-2 mt-1 border border-green-600 rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Mật khẩu -->
                <div class="mt-3">
                    <label for="password" class="block text-sm font-medium text-green-600">Mật khẩu</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 mt-1 border border-green-600 rounded-lg focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <!-- Nút đăng nhập -->
                    <button type="submit"
                        class="w-[200px] mt-4 px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600">
                        Đăng nhập
                    </button>

                    <!-- Link quên mật khẩu -->
                    <div class=" inline-block mt-3 text-left ml-[10px]">
                        <a href="#" class="text-blue-500 hover:underline text-sm">Quên mật khẩu?</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>

</html>