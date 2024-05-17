<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8f4f3]">
            <div>
                <a href="/">
                    <h2 class="font-bold text-3xl">MY <span class="bg-[#fa8231] text-white px-2 rounded-md">ISSAT</span>
                    </h2>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="connect.php">

                    <div class="py-8">
                        <center>
                            <span class="text-2xl font-semibold">S’inscrire
                            </span>
                        </center>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="id" value="id" />
                        <input type='number' name='id' placeholder='Votre Identifiant'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="nom" value="nom" />
                        <input type='text' name='nom' placeholder='Votre Nom et Prénom'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="email" value="email" />
                        <input type='email' name='email' placeholder='Votre Adresse Email'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password" value="Password" />
                        <div class="relative">
                            <input id="password" type="password" name="mot_de_passe" placeholder="Mot de passe" required
                                autocomplete="current-password"
                                class='w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]'>
                        </div>
                    </div>


                    <div class="mt-4">
                        <select id="sexe" name="sexe"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" required>
                            <option value="" disabled selected hidden>Genre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <select id="role" name="role"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" required>
                            <option value="" disabled selected hidden>Role</option>
                            <option value="Enseignant">Enseignant</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <select id="grade" name="grade"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]" required>
                            <option value="" disabled selected hidden>Grade</option>
                            <option value="Professeur">Professeur</option>
                            <option value="Maître de Conférence">Maître de Conférence</option>
                            <option value="Maître Assistant">Maître Assistant</option>
                            <option value="Assistant">Assistant</option>
                            <option value="PTC">PTC</option>
                            <option value="Autre">Autre</option>

                        </select>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <a class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="./logintest.php">
                            Connexion
                        </a>

                        <button type="submit" name="registerbtn"
                            class='ms-4 inline-flex items-center px-4 py-2 bg-[#fa8231] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                            S’inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>